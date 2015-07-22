<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;

class UtiPilaController extends Controller {

    public function listaAction() {
        set_time_limit(0);        
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();
                    /*foreach ($arrSeleccionados as $codigoPeriodoDetalle) {
                        $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
                        $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);   
                        if($arPeriodoDetalle->getGenerarEmpleados() == 0) {
                            $em->getRepository('SogaNominaBundle:SsoPila')->generarEmpleados($codigoPeriodoDetalle);                                                    
                            $strSql = "UPDATE sso_periodo SET generar_empleados = 1 WHERE mes = " . $arPeriodoDetalle->getMes() . " AND anio = " . $arPeriodoDetalle->getAnio();           
                            $objCon = $em->getConnection()->executeQuery($strSql); 
                        }                        
                    }
                    return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila'));
                    
                     * 
                     */
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();            
            if($request->request->get('OpExportar')) {
                $codigoPeriodoDetalle = $request->request->get('OpExportar');
                $arNomConfiguracion = new \Soga\NominaBundle\Entity\NomConfiguracion();
                $arNomConfiguracion = $em->getRepository('SogaNominaBundle:NomConfiguracion')->find(1);                                            
                $strRutaArchivo = $arNomConfiguracion->getRutaExportacion();
                $strNombreArchivo = "pila" . date('YmdHis') . ".txt";                        
                $ar = fopen($strRutaArchivo . $strNombreArchivo, "a") or
                    die("Problemas en la creacion del archivo plano");                                        
                $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
                $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);                                                    
                fputs($ar, '01');
                fputs($ar, '1');
                fputs($ar, '0001');
                fputs($ar, $this->RellenarNr("JG EFECTIVOS SAS", " ", 200, "D"));
                fputs($ar, 'NI');
                fputs($ar, '900456778       ');
                fputs($ar, '3');
                fputs($ar, 'E');
                fputs($ar, '          ');
                fputs($ar, '          ');
                fputs($ar, 'S');
                fputs($ar, $arPeriodoDetalle->getSucursalRel()->getCodigoPila());
                fputs($ar, $this->RellenarNr($arPeriodoDetalle->getSucursalRel()->getNombre(), " ", 40, "D"));
                //Arp del aportante
                fputs($ar, '14-18 ');
                //Periodo pago para los diferentes sistemas
                fputs($ar, $arPeriodoDetalle->getAnio().'-'. $this->RellenarNr($arPeriodoDetalle->getMes(), "0", 2, "I"));
                fputs($ar, $arPeriodoDetalle->getAnio().'-'. $this->RellenarNr($arPeriodoDetalle->getMesSalud(), "0", 2, "I"));
                //Numero radicacion de la planilla
                fputs($ar, '0000000000');  
                //Fecha de pago
                fputs($ar, $arPeriodoDetalle->getFechaPago()->format('Y-m-d'));
                //Numero total de empleados
                fputs($ar, $this->RellenarNr($arPeriodoDetalle->getNumeroEmpleados(), "0", 5, "I"));
                //Valor total de la nomina
                fputs($ar, $this->RellenarNr($arPeriodoDetalle->getVrNomina(), "0", 12, "I"));
                fputs($ar, '1');
                fputs($ar, '89');                            
                fputs($ar, "\n");                            
                $arSsoPila = new \Soga\NominaBundle\Entity\SsoPila();                                                                
                $arSsoPila = $em->getRepository('SogaNominaBundle:SsoPila')->findBy(array('codigoPeriodoDetalleFk' => $codigoPeriodoDetalle));                                                    
                foreach($arSsoPila as $arSsoPila) {
                    fputs($ar, $arSsoPila->getTipoRegistro());
                    fputs($ar, $arSsoPila->getSecuencia());
                    fputs($ar, $arSsoPila->getTipoDocumento());
                    fputs($ar, $this->RellenarNr($arSsoPila->getNumeroIdentificacion(), " ", 16, "D"));
                    fputs($ar, $arSsoPila->getTipo());
                    fputs($ar, $arSsoPila->getSubtipo());
                    fputs($ar, $arSsoPila->getExtranjeroNoObligadoCotizarPensiones());
                    fputs($ar, $arSsoPila->getColombianoResidenteExterior());
                    fputs($ar, $arSsoPila->getCodigoDepartamento());
                    fputs($ar, $arSsoPila->getCodigoMunicipio());
                    fputs($ar, $arSsoPila->getPrimerApellido());
                    fputs($ar, $arSsoPila->getSegundoApellido());
                    fputs($ar, $arSsoPila->getPrimerNombre());
                    fputs($ar, $arSsoPila->getSegundoNombre());
                    fputs($ar, $arSsoPila->getIngreso());
                    fputs($ar, $arSsoPila->getRetiro());
                    fputs($ar, $arSsoPila->getTrasladoDesdeOtraEps());
                    fputs($ar, $arSsoPila->getTrasladoAOtraEps());
                    fputs($ar, $arSsoPila->getTrasladoDesdeOtraPension());
                    fputs($ar, $arSsoPila->getTrasladoAOtraPension());
                    fputs($ar, $arSsoPila->getVariacionPermanenteSalario());
                    fputs($ar, $arSsoPila->getCorrecciones());
                    fputs($ar, $arSsoPila->getVariacionTransitoriaSalario());
                    fputs($ar, $arSsoPila->getSuspensionTemporalContratoLicenciaServicios());
                    fputs($ar, $arSsoPila->getIncapacidadGeneral());
                    fputs($ar, $arSsoPila->getLicenciaMaternidad());
                    fputs($ar, $arSsoPila->getVacaciones());
                    fputs($ar, $arSsoPila->getAporteVoluntario());
                    fputs($ar, $arSsoPila->getVariacionCentrosTrabajo());
                    fputs($ar, $this->RellenarNr($arSsoPila->getIncapacidadAccidenteTrabajoEnfermedadProfesional(), "0", 2, "I"));
                    fputs($ar, $arSsoPila->getCodigoEntidadPensionPertenece());
                    fputs($ar, $arSsoPila->getCodigoEntidadPensionTraslada());
                    fputs($ar, $arSsoPila->getCodigoEntidadSaludPertenece());
                    fputs($ar, $arSsoPila->getCodigoEntidadSaludTraslada());
                    fputs($ar, $arSsoPila->getCodigoEntidadCajaPertenece());
                    fputs($ar, $this->RellenarNr($arSsoPila->getDiasCotizadosPension(), "0", 2, "I"));
                    fputs($ar, $this->RellenarNr($arSsoPila->getDiasCotizadosSalud(), "0", 2, "I"));
                    fputs($ar, $this->RellenarNr($arSsoPila->getDiasCotizadosRiesgosProfesionales(), "0", 2, "I"));
                    fputs($ar, $this->RellenarNr($arSsoPila->getDiasCotizadosCajaCompensacion(), "0", 2, "I"));                                                                
                    fputs($ar, $this->RellenarNr($arSsoPila->getSalarioBasico(), "0", 9, "I"));
                    fputs($ar, $arSsoPila->getSalarioIntegral());
                    fputs($ar, $this->RellenarNr($arSsoPila->getIbcPension(), "0", 9, "I"));
                    fputs($ar, $this->RellenarNr($arSsoPila->getIbcSalud(), "0", 9, "I"));
                    fputs($ar, $this->RellenarNr($arSsoPila->getIbcRiesgosProfesionales(), "0", 9, "I"));
                    fputs($ar, $this->RellenarNr($arSsoPila->getIbcCaja(), "0", 9, "I"));
                    fputs($ar, $arSsoPila->getTarifaAportesPensiones());
                    fputs($ar, $this->RellenarNr($arSsoPila->getCotizacionObligatoria(), "0", 9, "I"));                                
                    fputs($ar, $arSsoPila->getAporteVoluntarioFondoPensionesObligatorias());
                    fputs($ar, $arSsoPila->getCotizacionVoluntarioFondoPensionesObligatorias());
                    fputs($ar, $this->RellenarNr($arSsoPila->getTotalCotizacion(), "0", 9, "I"));                                
                    fputs($ar, $arSsoPila->getAportesFondoSolidaridadPensionalSolidaridad());
                    fputs($ar, $arSsoPila->getAportesFondoSolidaridadPensionalSubsistencia());
                    fputs($ar, $arSsoPila->getValorNoRetenidoAportesVoluntarios());
                    fputs($ar, $arSsoPila->getTarifaAportesSalud());                                
                    fputs($ar, $this->RellenarNr($arSsoPila->getCotizacionObligatoriaSalud(), "0", 9, "I"));
                    fputs($ar, $arSsoPila->getValorUpcAdicional());
                    fputs($ar, $arSsoPila->getNumeroAutorizacionIncapacidadEnfermedadGeneral());
                    fputs($ar, $arSsoPila->getValorIncapacidadEnfermedadGeneral());
                    fputs($ar, $arSsoPila->getNumeroAutorizacionLicenciaMaternidadPaternidad());
                    fputs($ar, $arSsoPila->getValorLicenciaMaternidadPaternidad());
                    fputs($ar, $arSsoPila->getTarifaAportesRiesgosProfesionales());
                    fputs($ar, $arSsoPila->getCentroTrabajoCodigoCt());
                    fputs($ar, $this->RellenarNr($arSsoPila->getCotizacionObligatoriaRiesgos(), "0", 9, "I"));
                    fputs($ar, $arSsoPila->getTarifaAportesCCF());                                
                    fputs($ar, $this->RellenarNr($arSsoPila->getValorAporteCCF(), "0", 9, "I"));
                    fputs($ar, $arSsoPila->getTarifaAportesSENA());
                    fputs($ar, $arSsoPila->getValorAportesSENA());
                    fputs($ar, $arSsoPila->getTarifaAportesICBF());
                    fputs($ar, $arSsoPila->getValorAporteICBF());
                    fputs($ar, $arSsoPila->getTarifaAportesESAP());
                    fputs($ar, $arSsoPila->getValorAporteESAP());
                    fputs($ar, $arSsoPila->getTarifaAportesMEN());
                    fputs($ar, $arSsoPila->getValorAporteMEN());
                    fputs($ar, $arSsoPila->getTipoDocumentoResponsableUPC());
                    fputs($ar, $arSsoPila->getNumeroIdentificacionResponsableUPCAdicional());
                    fputs($ar, $arSsoPila->getCotizanteExoneradoPagoAporteParafiscalesSalud());
                    fputs($ar, $arSsoPila->getCodigoAdministradoraRiesgosLaborales());
                    fputs($ar, $arSsoPila->getClaseRiesgoAfiliado());
                    fputs($ar, "\n");                                                                                                                                               
                }
                  
                fclose($ar);                        
                $strArchivo = $strRutaArchivo.$strNombreArchivo;
                header('Content-Description: File Transfer');
                header('Content-Type: text/csv; charset=ISO-8859-15');
                header('Content-Disposition: attachment; filename='.basename($strArchivo));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($strArchivo));
                readfile($strArchivo);                                            
                $em->flush();
                exit;
            }
            
            if($request->request->get('OpGenerar')) {
                $codigoPeriodoDetalle = $request->request->get('OpGenerar');
                $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
                $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);   
                if($arPeriodoDetalle->getGenerarEmpleados() == 1) {
                    if($arPeriodoDetalle->getEstadoGenerado() == 0) {
                        $em->getRepository('SogaNominaBundle:SsoPila')->crearRegistro($codigoPeriodoDetalle);                                                    
                        $arPeriodoDetalle->setEstadoGenerado(1);
                        $em->persist($arPeriodoDetalle);
                        $em->flush();
                    }                                                     
                }
                return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila'));
            }   
            
            if($request->request->get('OpDesgenerar')) {
                $codigoPeriodoDetalle = $request->request->get('OpDesgenerar');
                $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
                $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);                           
                if($arPeriodoDetalle->getEstadoGenerado() == 1) {
                    $strSql = "DELETE FROM sso_pila WHERE codigo_periodo_detalle_fk = " . $arPeriodoDetalle->getCodigoPeriodoDetallePk() . " AND codigo_sucursal_fk = " . $arPeriodoDetalle->getCodigoSucursalFk();           
                    $objCon = $em->getConnection()->executeQuery($strSql);                                                                                                
                    $arPeriodoDetalle->setEstadoGenerado(0);
                    $arPeriodoDetalle->setNumeroEmpleados(0);
                    $em->persist($arPeriodoDetalle);
                    $em->flush();
                }                                         
                return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila'));
            }  
            
            if($request->request->get('OpExportarExcel')) {
                $codigoPeriodoDetalle = $request->request->get('OpExportarExcel');
                $objPHPExcel = new \PHPExcel();
                // Set document properties
                $objPHPExcel->getProperties()->setCreator("JG Efectivos")
                    ->setLastModifiedBy("JG Efectivos")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'CODIGO')
                            ->setCellValue('B1', 'D. PENSION')
                            ->setCellValue('C1', 'D. SALUD')
                            ->setCellValue('D1', 'D. RIESGOS')
                            ->setCellValue('E1', 'D. CAJA')
                            ->setCellValue('F1', 'IBC PENSION')
                            ->setCellValue('G1', 'IBC SALUD')
                            ->setCellValue('H1', 'IBC RIESGOS')
                            ->setCellValue('I1', 'IBC CAJA')
                            ->setCellValue('J1', 'C. PENSION')
                            ->setCellValue('K1', 'C. SALUD')
                            ->setCellValue('L1', 'C. RIESGOS')
                            ->setCellValue('M1', 'C. CAJA');

                $i = 2;
                $arPilaRegistros = new \Soga\NominaBundle\Entity\SsoPila();
                $arPilaRegistros = $em->getRepository('SogaNominaBundle:SsoPila')->findBy(array('codigoPeriodoDetalleFk' => $codigoPeriodoDetalle));
                foreach ($arPilaRegistros as $arPila) {            
                    $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A' . $i, $arPila->getCodigoPilaPk())
                            ->setCellValue('B' . $i, $arPila->getDiasCotizadosPension())
                            ->setCellValue('C' . $i, $arPila->getDiasCotizadosSalud())
                            ->setCellValue('D' . $i, $arPila->getDiasCotizadosRiesgosProfesionales())
                            ->setCellValue('E' . $i, $arPila->getDiasCotizadosCajaCompensacion())
                            ->setCellValue('F' . $i, $arPila->getIbcPension())
                            ->setCellValue('G' . $i, $arPila->getIbcSalud())
                            ->setCellValue('H' . $i, $arPila->getIbcRiesgosProfesionales())
                            ->setCellValue('I' . $i, $arPila->getIbcCaja())
                            ->setCellValue('J' . $i, $arPila->getCotizacionObligatoria())
                            ->setCellValue('K' . $i, $arPila->getCotizacionObligatoriaSalud())
                            ->setCellValue('L' . $i, $arPila->getCotizacionObligatoriaRiesgos())
                            ->setCellValue('M' . $i, $arPila->getValorAporteCCF());
                    $i++;
                }

                $objPHPExcel->getActiveSheet()->setTitle('pagopila');
                $objPHPExcel->setActiveSheetIndex(0);

                // Redirect output to a client’s web browser (Excel2007)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Pagos.xlsx"');
                header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                header('Cache-Control: max-age=1');
                // If you're serving to IE over SSL, then the following may be needed
                header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header ('Pragma: public'); // HTTP/1.0
                $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
                $objWriter->save('php://output');
                exit;                
            }            
            
        }
        
        $objQueryPeriodos = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->DevDqlPeriodos();
        $arPeriodoDetalles = $paginator->paginate($objQueryPeriodos, $this->getRequest()->query->get('page', 1), 200);        
        
        return $this->render('SogaNominaBundle:Utilidades/Pila:lista.html.twig', array(
            'arPeriodoDetalles' => $arPeriodoDetalles
                ));
        set_time_limit(60);
    }


    /**
     * Adiciona ceros a la izquierda del numero tantos como haga falta para que la cadena a retornar
     * tenga 11 caracteres.
     * @param $NroCr => Numero de caracteres que debe tener la cadena a retornar.
     * @param $Str => El caracter que se utilizara para rellenar la cadena.
     * @param <Int> $Nro => Numero del documento o nit del tercero.
     * @return <String> $Nro => Numero del documento completado con ceros a su izquierda para
     * el formato de i limitada.
     * */
        public static function RellenarNr($Nro, $Str, $NroCr, $strPosicion) {
        $Longitud = strlen($Nro);
        $Nc = $NroCr - $Longitud;
        for ($i = 0; $i < $Nc; $i++) {
            if($strPosicion == "I") {
                $Nro = $Str . $Nro;
            } else {
                $Nro = $Nro . $Str;
            }
            
        }            

        return (string) $Nro;
    }    

}
