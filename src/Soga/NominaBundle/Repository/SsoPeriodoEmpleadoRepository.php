<?php

namespace Soga\NominaBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * NominaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SsoPeriodoEmpleadoRepository extends EntityRepository
{
    public function generarEmpleados($codigoPeriodo) {
        set_time_limit(0);
        $em = $this->getEntityManager();
        $arPeriodo = new \Soga\NominaBundle\Entity\SsoPeriodo();
        $arPeriodo = $em->getRepository('SogaNominaBundle:SsoPeriodo')->find($codigoPeriodo);
        $arContratos = new \Soga\NominaBundle\Entity\Contrato();
        $arContratos = $em->getRepository('SogaNominaBundle:Contrato')->devDqlContratosPeriodo($arPeriodo->getFechaDesde()->format('Y-m-d'), $arPeriodo->getFechaHasta()->format('Y-m-d'));
        foreach ($arContratos AS $arContrato) {
            $arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
            $arEmpleado = $em->getRepository('SogaNominaBundle:Empleado')->find($arContrato[0]->getCodemple());
            $arZona = new \Soga\NominaBundle\Entity\Zona();            
            $arZona = $em->getRepository('SogaNominaBundle:Zona')->find($arEmpleado->getCodzona());            
            $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
            $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->findOneBy(array('codigoPeriodoFk' => $codigoPeriodo, 'codigoSucursalFk' => $arZona->getCodigoSsoSucursalFk()));                        
            $arPeriodoEmpleado = new \Soga\NominaBundle\Entity\SsoPeriodoEmpleado();
            $arPeriodoEmpleado->setCodigoPeriodoFk($codigoPeriodo);
            $arPeriodoEmpleado->setCodigoEmpleadoFk($arContrato[0]->getCodemple());
            if(count($arPeriodoDetalle) > 0) {
                $arPeriodoEmpleado->setCodigoPeriodoDetalleFk($arPeriodoDetalle->getCodigoPeriodoDetallePk());
            }            
            $arPeriodoEmpleado->setCodigoSucursalFk($arEmpleado->getCodigoSucursalFk());
            $arPeriodoEmpleado->setNumeroIdentificacion($arEmpleado->getCedemple());
            $arPeriodoEmpleado->setNombre($arEmpleado->getNomemple() . " " . $arEmpleado->getNomemple1() . " " . $arEmpleado->getApemple() . " " . $arEmpleado->getApemple1());
            $arPeriodoEmpleado->setAnio($arPeriodo->getAnio());
            $arPeriodoEmpleado->setMes($arPeriodo->getMes());
            $arPeriodoEmpleado->setCodigoZonaFk($arZona->getCodzona());
            $arPeriodoEmpleado->setNombreZona($arZona->getZona());
            $arPeriodoEmpleado->setNumeroContratos($arContrato['1']);            
            $em->persist($arPeriodoEmpleado);
        }
        $em->flush();
        set_time_limit(60);
        return true;
    }                
    
    public function actualizar($codigoPeriodoDetalle) {
        set_time_limit(0);
        $em = $this->getEntityManager();
        $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
        $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);    
        $arPeriodoEmpleados = new \Soga\NominaBundle\Entity\SsoPeriodoEmpleado();
        $arPeriodoEmpleados = $em->getRepository('SogaNominaBundle:SsoPeriodoEmpleado')->findBy(array('codigoPeriodoDetalleFk' => $codigoPeriodoDetalle));
        foreach ($arPeriodoEmpleados AS $arPeriodoEmpleado) {
            $arPeriodoEmpleadoActualizar = new \Soga\NominaBundle\Entity\SsoPeriodoEmpleado();
            $arPeriodoEmpleadoActualizar = $em->getRepository('SogaNominaBundle:SsoPeriodoEmpleado')->find($arPeriodoEmpleado->getCodigoPeriodoEmpleadoPk());    
            $dql   = "SELECT SUM(nomina.ibcTiempoSuple) FROM SogaNominaBundle:Nomina nomina "
                    . "WHERE nomina.fechaDesde >= '" . $arPeriodoDetalle->getFechaDesde()->format('Y-m-d') . "' "
                    . "AND nomina.fechaDesde <= '" . $arPeriodoDetalle->getFechaHasta()->format('Y-m-d') .  "' "
                    . "AND nomina.cedulaEmpleado = '" . $arPeriodoEmpleado->getNumeroIdentificacion() . "'";
            $query = $em->createQuery($dql);
            $douIbcTiempoSuplementario = $query->getSingleScalarResult();
            $arPeriodoEmpleadoActualizar->setVrTiempoSuplementario($douIbcTiempoSuplementario);
            $intTotalDiasCotizar = 0;
            $arContratos = new \Soga\NominaBundle\Entity\Contrato();
            $arContratos = $em->getRepository('SogaNominaBundle:Contrato')->devDqlContratosPeriodoEmpleado($arPeriodoDetalle->getFechaDesde()->format('Y-m-d'), $arPeriodoDetalle->getFechaHasta()->format('Y-m-d'), $arPeriodoEmpleado->getCodigoEmpleadoFk());                
            foreach ($arContratos as $arContrato) {
                $intDiasCotizar = 0;
                $fechaTerminaCotrato = $arContrato->getFechater()->format('Y-m-d');
                if($fechaTerminaCotrato == '-0001-11-30') {
                    $dateFechaHasta = $arPeriodoDetalle->getFechaHasta();
                } else {
                    if($arContrato->getFechater() > $arPeriodoDetalle->getFechaHasta()) {
                        $dateFechaHasta = $arPeriodoDetalle->getFechaHasta();
                    } else {
                        $dateFechaHasta = $arContrato->getFechater();
                    }
                }

                if($arContrato->getFechainic() <  $arPeriodoDetalle->getFechaDesde() == true) {
                    $dateFechaDesde = $arPeriodoDetalle->getFechaDesde();
                } else {
                    $dateFechaDesde = $arContrato->getFechainic();
                }

                if($dateFechaDesde != "" && $dateFechaHasta != "") {
                    $intDias = $dateFechaDesde->diff($dateFechaHasta);
                    $intDias = $intDias->format('%a');                        
                    $intDiasCotizar = $intDias + 1;
                    if($intDiasCotizar == 31) {
                        $intDiasCotizar = $intDiasCotizar - 1;
                    } else {
                        if($arPeriodoDetalle->getFechaHasta()->format('d') == 28) {
                            if($arContrato->getFechater() >= $arPeriodoDetalle->getFechaHasta() || $fechaTerminaCotrato == '-0001-11-30') {
                                $intDiasCotizar = $intDiasCotizar + 2;
                            }
                        }
                        if($arPeriodoDetalle->getFechaHasta()->format('d') == 29) {
                            if($arContrato->getFechater() >= $arPeriodoDetalle->getFechaHasta() || $fechaTerminaCotrato == '-0001-11-30') {
                                $intDiasCotizar = $intDiasCotizar + 1;
                            }
                        }                    
                        if($arPeriodoDetalle->getFechaHasta()->format('d') == 31) {
                            if($arContrato->getFechater() >= $arPeriodoDetalle->getFechaHasta() || $fechaTerminaCotrato == '-0001-11-30') {
                                if($arContrato->getFechainic()->format('d') != 31) {
                                    $intDiasCotizar = $intDiasCotizar - 1;
                                }                                    
                            }
                        }                            
                    }
                }  
                
                $intTotalDiasCotizar += $intDiasCotizar;
            }            
            $arPeriodoEmpleadoActualizar->setDiasTotales($intTotalDiasCotizar);
            $em->persist($arPeriodoEmpleadoActualizar);
        }        
        $em->flush();
        set_time_limit(60);
        return true;
    }                        
    
    public function analizar($codigoPeriodoDetalle) {
        set_time_limit(0);
        $em = $this->getEntityManager();
        $strSql = "DELETE FROM sso_periodo_empleado_contrato WHERE codigo_periodo_detalle_fk = " . $codigoPeriodoDetalle;
        $objCon = $em->getConnection()->executeQuery($strSql);        
        $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
        $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);    
        $arPeriodoEmpleados = new \Soga\NominaBundle\Entity\SsoPeriodoEmpleado();
        $arPeriodoEmpleados = $em->getRepository('SogaNominaBundle:SsoPeriodoEmpleado')->findBy(array('codigoPeriodoDetalleFk' => $codigoPeriodoDetalle));
        foreach ($arPeriodoEmpleados AS $arPeriodoEmpleado) {
            $arContratos = new \Soga\NominaBundle\Entity\Contrato();
            $arContratos = $em->getRepository('SogaNominaBundle:Contrato')->devDqlContratosPeriodoEmpleado($arPeriodoDetalle->getFechaDesde()->format('Y-m-d'), $arPeriodoDetalle->getFechaHasta()->format('Y-m-d'), $arPeriodoEmpleado->getCodigoEmpleadoFk());                
            foreach ($arContratos as $arContrato) {
                $arPeriodoEmpleadoContrato = new \Soga\NominaBundle\Entity\SsoPeriodoEmpleadoContrato();
                $arPeriodoEmpleadoContrato->setCodigoContratoFk($arContrato->getContrato());
                $arPeriodoEmpleadoContrato->setCodigoEmpleadoFk($arPeriodoEmpleado->getCodigoEmpleadoFk());
                $arPeriodoEmpleadoContrato->setNumeroIdentificacion($arPeriodoEmpleado->getNumeroIdentificacion());
                $arPeriodoEmpleadoContrato->setCodigoPeriodoDetalleFk($arPeriodoEmpleado->getCodigoPeriodoDetalleFk());
                
                $dateFechaDesde =  "";
                $dateFechaHasta =  "";
                $strNovedadIngreso = " ";
                $strNovedadRetiro = " ";
                $intDiasCotizar = 0;
                $fechaTerminaCotrato = $arContrato->getFechater()->format('Y-m-d');
                if($fechaTerminaCotrato == '-0001-11-30') {
                    $dateFechaHasta = $arPeriodoDetalle->getFechaHasta();
                } else {
                    if($arContrato->getFechater() > $arPeriodoDetalle->getFechaHasta()) {
                        $dateFechaHasta = $arPeriodoDetalle->getFechaHasta();
                    } else {
                        $dateFechaHasta = $arContrato->getFechater();
                    }
                }

                if($arContrato->getFechainic() <  $arPeriodoDetalle->getFechaDesde() == true) {
                    $dateFechaDesde = $arPeriodoDetalle->getFechaDesde();
                } else {
                    $dateFechaDesde = $arContrato->getFechainic();
                }

                if($dateFechaDesde != "" && $dateFechaHasta != "") {
                    $intDias = $dateFechaDesde->diff($dateFechaHasta);
                    $intDias = $intDias->format('%a');                        
                    $intDiasCotizar = $intDias + 1;
                    if($intDiasCotizar == 31) {
                        $intDiasCotizar = $intDiasCotizar - 1;
                    } else {
                        if($arPeriodoDetalle->getFechaHasta()->format('d') == 28) {
                            if($arContrato->getFechater() >= $arPeriodoDetalle->getFechaHasta() || $fechaTerminaCotrato == '-0001-11-30') {
                                $intDiasCotizar = $intDiasCotizar + 2;
                            }
                        }
                        if($arPeriodoDetalle->getFechaHasta()->format('d') == 29) {
                            if($arContrato->getFechater() >= $arPeriodoDetalle->getFechaHasta() || $fechaTerminaCotrato == '-0001-11-30') {
                                $intDiasCotizar = $intDiasCotizar + 1;
                            }
                        }                    
                        if($arPeriodoDetalle->getFechaHasta()->format('d') == 31) {
                            if($arContrato->getFechater() >= $arPeriodoDetalle->getFechaHasta() || $fechaTerminaCotrato == '-0001-11-30') {
                                if($arContrato->getFechainic()->format('d') != 31) {
                                    $intDiasCotizar = $intDiasCotizar - 1;
                                }                                    
                            }
                        }                            
                    }
                }

                if($arContrato->getFechainic() >= $arPeriodoDetalle->getFechaDesde()) {
                    $strNovedadIngreso = "X";
                }

                if($fechaTerminaCotrato != '-0001-11-30') {
                    if($arContrato->getFechater() <= $arPeriodoDetalle->getFechaHasta()) {
                        $strNovedadRetiro = "X";
                    }
                }

                if($arPeriodoDetalle->getFechaHasta() <= $arContrato->getSalarioFechaDesde()) {
                    $floSalario = $arContrato->getSalarioAnterior();
                } else {
                    $floSalario = $arContrato->getSalarioIbc();
                }     
                if($arPeriodoDetalle->getFechaHasta()->format('Y-m') == $arContrato->getSalarioFechaDesde()->format('Y-m')) {
                    $arPeriodoEmpleadoContrato->setVariacionPermanenteSalario('X');
                }                
                $arPeriodoEmpleadoContrato->setVrSalario($floSalario);
                $arPeriodoEmpleadoContrato->setFechaDesde($dateFechaDesde);
                $arPeriodoEmpleadoContrato->setFechaHasta($dateFechaHasta);                
                $intDiasIncapacidadGeneral = $this->diasIncapacidadGeneral($dateFechaDesde, $dateFechaHasta, $arPeriodoEmpleado->getNumeroIdentificacion());
                $arPeriodoEmpleadoContrato->setDiasIncapacidadGeneral($intDiasIncapacidadGeneral);      
                $intDiasIncapacidadLaboral = $this->diasIncapacidadLaboral($dateFechaDesde, $dateFechaHasta, $arPeriodoEmpleado->getNumeroIdentificacion());
                $arPeriodoEmpleadoContrato->setDiasIncapacidadLaboral($intDiasIncapacidadLaboral);
                $arPeriodoEmpleadoContrato->setDias($intDiasCotizar);
                if($arPeriodoEmpleado->getDiasTotales() > 0) {
                    if($arPeriodoEmpleado->getVrTiempoSuplementario() > 0) {
                        $floTiempoSuplementario = ($arPeriodoEmpleado->getVrTiempoSuplementario() / $arPeriodoEmpleado->getDiasTotales()) * $intDiasCotizar;
                        $arPeriodoEmpleadoContrato->setVrTiempoSuplementario($floTiempoSuplementario);
                    }                       
                }
                $arPeriodoEmpleadoContrato->setIngreso($strNovedadIngreso);
                $arPeriodoEmpleadoContrato->setRetiro($strNovedadRetiro);
                $arPeriodoEmpleadoContrato->setCodigoCajaFk($arContrato->getCodigoCajaPk());
                $arTipoCotizante = $em->getRepository('SogaNominaBundle:SsoTipoCotizante')->find($arContrato->getCodigoTipoCotizanteFk());
                $arSubtipoCotizante = $em->getRepository('SogaNominaBundle:SsoSubtipoCotizante')->find($arContrato->getCodigoSubtipoCotizanteFk());                                                                                                                                                            
                $arPeriodoEmpleadoContrato->setTipo($arTipoCotizante->getCodigoPila());
                $arPeriodoEmpleadoContrato->setSubtipo($arSubtipoCotizante->getCodigoPila());
                $em->persist($arPeriodoEmpleadoContrato);                    
            }                            
        }        
        $em->flush();
        set_time_limit(60);
        return true;
    }                    
    
    public function diasIncapacidadGeneral($fechaDesde, $fechaHasta, $strNumeroIdentificacion) {
        $em = $this->getEntityManager();
        $intDiasIncapacidad = 0;
        $arIncapacidades = new \Soga\NominaBundle\Entity\Incapacidad();
        $arIncapacidades = $em->getRepository('SogaNominaBundle:Incapacidad')->devDqlIncapacidadesGeneralesPeriodoEmpleado($fechaDesde->format('Y-m-d'), $fechaHasta->format('Y-m-d'), $strNumeroIdentificacion);        
        foreach ($arIncapacidades as $arIncapacidad) {
            $dateFechaDesde =  "";
            $dateFechaHasta =  "";               
            if($arIncapacidad->getFechater() > $fechaHasta == true) {
                $dateFechaHasta = $fechaHasta;
            } else {
                $dateFechaHasta = $arIncapacidad->getFechater();
            }

            if($arIncapacidad->getFechaini() <  $fechaDesde == true) {
                $dateFechaDesde = $fechaDesde;
            } else {
                $dateFechaDesde = $arIncapacidad->getFechaini();
            }

            if($dateFechaDesde != "" && $dateFechaHasta != "") {
                $intDias = $dateFechaDesde->diff($dateFechaHasta);
                $intDias = $intDias->format('%a');
                $intDiasIncapacidad += $intDias + 1;
            }  
        }
        if($intDiasIncapacidad > 30) {
            $intDiasIncapacidad = 30;
        }
        return $intDiasIncapacidad;
    }            
    
    public function diasIncapacidadLaboral($fechaDesde, $fechaHasta, $strNumeroIdentificacion) {
        $em = $this->getEntityManager();
        $intDiasIncapacidad = 0;
        $arIncapacidades = new \Soga\NominaBundle\Entity\Incapacidad();
        $arIncapacidades = $em->getRepository('SogaNominaBundle:Incapacidad')->devDqlIncapacidadesLaboralesPeriodoEmpleado($fechaDesde->format('Y-m-d'), $fechaHasta->format('Y-m-d'), $strNumeroIdentificacion);        
        foreach ($arIncapacidades as $arIncapacidad) {
            $dateFechaDesde =  "";
            $dateFechaHasta =  "";               
            if($arIncapacidad->getFechater() > $fechaHasta == true) {
                $dateFechaHasta = $fechaHasta;
            } else {
                $dateFechaHasta = $arIncapacidad->getFechater();
            }

            if($arIncapacidad->getFechaini() <  $fechaDesde == true) {
                $dateFechaDesde = $fechaDesde;
            } else {
                $dateFechaDesde = $arIncapacidad->getFechaini();
            }

            if($dateFechaDesde != "" && $dateFechaHasta != "") {
                $intDias = $dateFechaDesde->diff($dateFechaHasta);
                $intDias = $intDias->format('%a');
                $intDiasIncapacidad += $intDias + 1;
            }  
        }
        if($intDiasIncapacidad > 30 ) {
            $intDiasIncapacidad = 30;
        }
        return $intDiasIncapacidad;
    }                
    
    public function dqlEmpleados($codigoPeriodoDetalle, $numeroIdentificacion, $codigoZona) {
        $em = $this->getEntityManager();         
        $dql = "SELECT pe FROM SogaNominaBundle:SsoPeriodoEmpleado pe WHERE pe.codigoPeriodoDetalleFk = " . $codigoPeriodoDetalle . " ";
        if($numeroIdentificacion != "") {
           $dql = $dql . " AND pe.numeroIdentificacion ='". $numeroIdentificacion ."'" ;
        }
        if($codigoZona != "") {
           $dql = $dql . " AND pe.codigoZonaFk ='". $codigoZona ."'" ;
        }        
        
        $dql .= " ORDER BY pe.codigoZonaFk";
        return $dql;                
    }        
}