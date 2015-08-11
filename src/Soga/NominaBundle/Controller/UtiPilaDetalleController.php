<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityRepository;
use Soga\NominaBundle\Form\Type\SsoPeriodoDetalleType;

class UtiPilaDetalleController extends Controller {
    var $strDetalleEmpleadosDql = "";
    public function listaAction($codigoPeriodo) {
        set_time_limit(0);        
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();
        $arPeriodo = new \Soga\NominaBundle\Entity\SsoPeriodo();
        $arPeriodo = $em->getRepository('SogaNominaBundle:SsoPeriodo')->find($codigoPeriodo);                                                            
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
                    fputs($ar, $this->RellenarNr($arSsoPila->getAportesFondoSolidaridadPensionalSolidaridad(), "0", 9, "I"));
                    fputs($ar, $this->RellenarNr($arSsoPila->getAportesFondoSolidaridadPensionalSubsistencia(), "0", 9, "I"));
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
                if($arPeriodoDetalle->getEstadoGenerado() == 0) {
                    $em->getRepository('SogaNominaBundle:SsoPila')->crearRegistro($codigoPeriodoDetalle);                                                    
                    $arPeriodoDetalle->setEstadoGenerado(1);
                    $em->persist($arPeriodoDetalle);
                    $em->flush();
                }                                                     
                return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila_detalle_lista', array('codigoPeriodo' => $codigoPeriodo)));
            }   
            
            if($request->request->get('OpDesgenerar')) {
                $codigoPeriodoDetalle = $request->request->get('OpDesgenerar');
                $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
                $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);                           
                if($arPeriodoDetalle->getEstadoGenerado() == 1) {
                    $strSql = "DELETE FROM sso_pila WHERE codigo_periodo_detalle_fk = " . $arPeriodoDetalle->getCodigoPeriodoDetallePk();           
                    $objCon = $em->getConnection()->executeQuery($strSql);                                                                                                
                    $arPeriodoDetalle->setEstadoGenerado(0);
                    $arPeriodoDetalle->setNumeroEmpleados(0);
                    $em->persist($arPeriodoDetalle);
                    $em->flush();
                }                                         
                return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila_detalle_lista', array('codigoPeriodo' => $codigoPeriodo)));
            }  

            if($request->request->get('OpCerrar')) {
                $codigoPeriodoDetalle = $request->request->get('OpCerrar');
                $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
                $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);                           
                if($arPeriodoDetalle->getEstadoGenerado() == 1) {
                    $arPeriodoDetalle->setEstadoCerrado(1);
                    $em->persist($arPeriodoDetalle);
                    $em->flush();
                }                                         
                return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila_detalle_lista', array('codigoPeriodo' => $codigoPeriodo)));
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
                            ->setCellValue('B1', 'CEDULA')
                            ->setCellValue('C1', 'NOMBRE')
                            ->setCellValue('D1', 'D.P')
                            ->setCellValue('E1', 'D.S')
                            ->setCellValue('F1', 'D.R')
                            ->setCellValue('G1', 'D.C')                            
                            ->setCellValue('H1', 'SALARIO')
                            ->setCellValue('I1', 'SUPLE')
                            ->setCellValue('J1', 'IBC PENSION')
                            ->setCellValue('K1', 'IBC SALUD')
                            ->setCellValue('L1', 'IBC RIESGOS')
                            ->setCellValue('M1', 'IBC CAJA')
                            ->setCellValue('N1', 'C. PENSION')
                            ->setCellValue('O1', 'C. SALUD')
                            ->setCellValue('P1', 'C. RIESGOS')                        
                            ->setCellValue('Q1', 'C. CAJA')
                            ->setCellValue('R1', 'FSP')
                            ->setCellValue('S1', 'FSS')                        
                            ->setCellValue('T1', 'TOTAL')
                            ->setCellValue('U1', 'ING')
                            ->setCellValue('V1', 'RET')
                            ->setCellValue('W1', 'SLN')
                            ->setCellValue('X1', 'LMA')
                            ->setCellValue('Y1', 'VAC')
                            ->setCellValue('Z1', 'IGE')
                            ->setCellValue('AA1', 'IRP')
                            ->setCellValue('AB1', 'D. SLN')
                            ->setCellValue('AC1', 'P.P')
                            ->setCellValue('AD1', 'P.S')
                            ->setCellValue('AE1', 'P.R')
                            ->setCellValue('AF1', 'P.C')
                            ->setCellValue('AG1', 'TIPO')
                            ->setCellValue('AH1', 'SUBTIPO');

                $i = 2;
                $arPilaRegistros = new \Soga\NominaBundle\Entity\SsoPila();
                $arPilaRegistros = $em->getRepository('SogaNominaBundle:SsoPila')->findBy(array('codigoPeriodoDetalleFk' => $codigoPeriodoDetalle));
                foreach ($arPilaRegistros as $arPila) {                     
                    $strIncapacidadGeneral = '';
                    $arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
                    $arEmpleado = $em->getRepository('SogaNominaBundle:Empleado')->find($arPila->getCodigoEmpleadoFk());
                    if($arPila->getIncapacidadGeneral() != ' ') {
                        $strIncapacidadGeneral = $arPila->getIncapacidadGeneral() . $arPila->getDiasIncapacidad();
                    }
                    $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A' . $i, $arPila->getCodigoPilaPk())
                            ->setCellValue('B' . $i, $arPila->getNumeroIdentificacion())
                            ->setCellValue('C' . $i, $arEmpleado->getNomemple() . " " . $arEmpleado->getNomemple1() . " " . $arEmpleado->getApemple() . " " . $arEmpleado->getApemple1())
                            ->setCellValue('D' . $i, $arPila->getDiasCotizadosPension())                            
                            ->setCellValue('E' . $i, $arPila->getDiasCotizadosSalud())
                            ->setCellValue('F' . $i, $arPila->getDiasCotizadosRiesgosProfesionales())
                            ->setCellValue('G' . $i, $arPila->getDiasCotizadosCajaCompensacion())
                            ->setCellValue('H' . $i, $arPila->getSalarioBasico())
                            ->setCellValue('I' . $i, $arPila->getTiempoSuplementario())
                            ->setCellValue('J' . $i, $arPila->getIbcPension())
                            ->setCellValue('K' . $i, $arPila->getIbcSalud())
                            ->setCellValue('L' . $i, $arPila->getIbcRiesgosProfesionales())
                            ->setCellValue('M' . $i, $arPila->getIbcCaja())
                            ->setCellValue('N' . $i, $arPila->getCotizacionObligatoria())
                            ->setCellValue('O' . $i, $arPila->getCotizacionObligatoriaSalud())
                            ->setCellValue('P' . $i, $arPila->getCotizacionObligatoriaRiesgos())
                            ->setCellValue('Q' . $i, $arPila->getValorAporteCCF())
                            ->setCellValue('R' . $i, $arPila->getAportesFondoSolidaridadPensionalSolidaridad())
                            ->setCellValue('S' . $i, $arPila->getAportesFondoSolidaridadPensionalSubsistencia())                            
                            ->setCellValue('T' . $i, $arPila->getValorTotalCotizacion())
                            ->setCellValue('U' . $i, $arPila->getIngreso())
                            ->setCellValue('V' . $i, $arPila->getRetiro())
                            ->setCellValue('W' . $i, $arPila->getSuspensionTemporalContratoLicenciaServicios())
                            ->setCellValue('X' . $i, $arPila->getLicenciaMaternidad())
                            ->setCellValue('Y' . $i, $arPila->getVacaciones())
                            ->setCellValue('Z' . $i, $strIncapacidadGeneral)
                            ->setCellValue('AA' . $i, $arPila->getIncapacidadAccidenteTrabajoEnfermedadProfesional())
                            ->setCellValue('AB' . $i, $arPila->getDiasLicenciaNoRemunerada())
                            ->setCellValue('AC' . $i, $arPila->getTarifaAportesPensiones())
                            ->setCellValue('AD' . $i, $arPila->getTarifaAportesSalud())
                            ->setCellValue('AE' . $i, $arPila->getTarifaAportesRiesgosProfesionales())
                            ->setCellValue('AF' . $i, $arPila->getTarifaAportesCCF())
                            ->setCellValue('AG' . $i, $arPila->getTipo())
                            ->setCellValue('AH' . $i, $arPila->getSubtipo());
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
        
        $objQueryPeriodosDetalles = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->DevDqlPeriodos();
        $arPeriodoDetalles = $paginator->paginate($objQueryPeriodosDetalles, $this->getRequest()->query->get('page', 1), 200);        
        
        return $this->render('SogaNominaBundle:Utilidades/Pila:listaDetalle.html.twig', array(
            'arPeriodoDetalles' => $arPeriodoDetalles,
            'arPeriodo' => $arPeriodo            
                ));
        set_time_limit(60);
    }
    
    public function nuevoAction($codigoPeriodo, $codigoPeriodoDetalle) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $arPeriodo = new \Soga\NominaBundle\Entity\SsoPeriodo();
        $arPeriodo = $em->getRepository('SogaNominaBundle:SsoPeriodo')->find($codigoPeriodo);                                                                    
        $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
        if($codigoPeriodoDetalle != 0) {
            $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);                                                                    
        }
        $form = $this->createForm(new SsoPeriodoDetalleType, $arPeriodoDetalle);
        $form->handleRequest($request);
        if ($form->isValid()) {            
            $arPeriodoDetalle = $form->getData(); 
            $arPeriodoDetalle->setCodigoPeriodoFk($codigoPeriodo);
            $arPeriodoDetalle->setFechaDesde($arPeriodo->getFechaDesde());
            $arPeriodoDetalle->setFechaHasta($arPeriodo->getFechaHasta());
            $arPeriodoDetalle->setAnio($arPeriodo->getAnio());
            $arPeriodoDetalle->setMes($arPeriodo->getMes());
            $arPeriodoDetalle->setMesSalud($arPeriodo->getMesSalud());
            //$arPeriodoDetalle->setFechaPago();
            $em->persist($arPeriodoDetalle);
            $em->flush();
            return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila_detalle_lista', array('codigoPeriodo' => $codigoPeriodo)));
        }

        return $this->render('SogaNominaBundle:Utilidades/Pila:nuevo.html.twig', array(
            'arPeriodo' => $arPeriodo,
            'form' => $form->createView()));
    }    
    
    public function detalleAction($codigoPeriodoDetalle) {
        set_time_limit(0);        
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();        
        $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
        $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);                                                    
        $arPeriodo = new \Soga\NominaBundle\Entity\SsoPeriodo();
        $arPeriodo = $em->getRepository('SogaNominaBundle:SsoPeriodo')->find($arPeriodoDetalle->getCodigoPeriodoFk());                                                            
        
        $objQueryPila = $em->getRepository('SogaNominaBundle:SsoPila')->dqlDetalle($codigoPeriodoDetalle);
        $arPila = $paginator->paginate($objQueryPila, $this->getRequest()->query->get('page', 1), 1000);        
        
        return $this->render('SogaNominaBundle:Utilidades/Pila:detalle.html.twig', array(
            'arPila' => $arPila,
            'arPeriodoDetalle' => $arPeriodoDetalle,
            'arPeriodo' => $arPeriodo
                ));
        set_time_limit(60);
    }

    public function empleadosAction($codigoPeriodoDetalle) {
        set_time_limit(0);        
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();        
        $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
        $arPeriodoDetalle = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalle);                                                    
        $form = $this->formularioEmpleados($arPeriodoDetalle->getCodigoPeriodoFk());
        $form->handleRequest($request);
        $this->listarEmpleados($codigoPeriodoDetalle);
        if($form->isValid()) {
            $arrSelecionados = $request->request->get('ChkSeleccionar');
            if($form->get('BtnFiltrar')->isClicked()) {
                $this->filtrarEmpleados($form);
                $this->listarEmpleados($codigoPeriodoDetalle);
            }
            if($form->get('BtnTrasladar')->isClicked()) {
                $controles = $request->request->get('form');
                $codigoPeriodoDetalleTrasladar = $controles['detalleRel'];
                $arPeriodoDetalleTrasladar = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
                $arPeriodoDetalleTrasladar = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalleTrasladar);                
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                foreach ($arrSeleccionados AS $codigoPeriodoEmpleado) {                    
                    $arPeriodoEmpleado = new \Soga\NominaBundle\Entity\SsoPeriodoEmpleado();
                    $arPeriodoEmpleado = $em->getRepository('SogaNominaBundle:SsoPeriodoEmpleado')->find($codigoPeriodoEmpleado);                    
                    $arPeriodoEmpleado->setCodigoPeriodoDetalleFk($codigoPeriodoDetalleTrasladar);
                    $arPeriodoEmpleado->setCodigoSucursalFk($arPeriodoDetalleTrasladar->getCodigoSucursalFk());                    
                    $em->persist($arPeriodoEmpleado);                    
                }
                $em->flush();
                return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila_empleados', array('codigoPeriodoDetalle' => $codigoPeriodoDetalle)));                                    
            }            
            if($form->get('BtnCopiar')->isClicked()) {
                $controles = $request->request->get('form');
                $codigoPeriodoDetalleTrasladar = $controles['detalleRel'];
                $arPeriodoDetalleTrasladar = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
                $arPeriodoDetalleTrasladar = $em->getRepository('SogaNominaBundle:SsoPeriodoDetalle')->find($codigoPeriodoDetalleTrasladar);                
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                foreach ($arrSeleccionados AS $codigoPeriodoEmpleado) {                    
                    $arPeriodoEmpleado = new \Soga\NominaBundle\Entity\SsoPeriodoEmpleado();
                    $arPeriodoEmpleado = $em->getRepository('SogaNominaBundle:SsoPeriodoEmpleado')->find($codigoPeriodoEmpleado);                    
                    $arPeriodoEmpleadoNuevo = new \Soga\NominaBundle\Entity\SsoPeriodoEmpleado();
                    $arPeriodoEmpleadoNuevo->setCodigoPeriodoFk($arPeriodoEmpleado->getCodigoPeriodoFk());
                    $arPeriodoEmpleadoNuevo->setCodigoEmpleadoFk($arPeriodoEmpleado->getCodigoEmpleadoFk());
                    $arPeriodoEmpleadoNuevo->setNumeroIdentificacion($arPeriodoEmpleado->getNumeroIdentificacion());
                    $arPeriodoEmpleadoNuevo->setNombre($arPeriodoEmpleado->getNombre());
                    $arPeriodoEmpleadoNuevo->setAnio($arPeriodoEmpleado->getAnio());
                    $arPeriodoEmpleadoNuevo->setMes($arPeriodoEmpleado->getMes());
                    $arPeriodoEmpleadoNuevo->setCodigoZonaFk($arPeriodoEmpleado->getCodigoZonaFk());
                    $arPeriodoEmpleadoNuevo->setNombreZona($arPeriodoEmpleado->getNombreZona());
                    $arPeriodoEmpleadoNuevo->setCodigoPeriodoDetalleFk($codigoPeriodoDetalleTrasladar);
                    $arPeriodoEmpleadoNuevo->setCodigoSucursalFk($arPeriodoDetalleTrasladar->getCodigoSucursalFk());                    
                    $em->persist($arPeriodoEmpleadoNuevo);                    
                }
                $em->flush();
                return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila_empleados', array('codigoPeriodoDetalle' => $codigoPeriodoDetalle)));                                    
            }                        
            if($form->get('BtnEliminar')->isClicked()) {
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                foreach ($arrSeleccionados AS $codigoPeriodoEmpleado) {                    
                    $arPeriodoEmpleado = new \Soga\NominaBundle\Entity\SsoPeriodoEmpleado();
                    $arPeriodoEmpleado = $em->getRepository('SogaNominaBundle:SsoPeriodoEmpleado')->find($codigoPeriodoEmpleado);                                        
                    $em->remove($arPeriodoEmpleado);
                }
                $em->flush();
                return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila_empleados', array('codigoPeriodoDetalle' => $codigoPeriodoDetalle)));                                    
            }                        
            if($form->get('BtnExcel')->isClicked()) {
                $this->exportarEmpleadosExcel($codigoPeriodoDetalle);                
            }            
        }
                
        $arPeriodoEmpleados = $paginator->paginate($em->createQuery($this->strDetalleEmpleadosDql), $this->getRequest()->query->get('page', 1), 1000);
        return $this->render('SogaNominaBundle:Utilidades/Pila:empleados.html.twig', array(
            'arPeriodoEmpleados' => $arPeriodoEmpleados,
            'arPeriodoDetalle' => $arPeriodoDetalle,
            'form' => $form->createView()
                ));
        set_time_limit(60);
    }    

    private function formularioEmpleados($codigoPeriodo) {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $arrayPropiedadesZona = array(
                'class' => 'SogaNominaBundle:Zona',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('zona')                                        
                    ->orderBy('zona.zona', 'ASC');},
                'property' => 'zona',
                'required' => false,  
                'empty_data' => "",
                'empty_value' => "TODOS",    
                'data' => ""
            );  
        if($session->get('filtroCodigoZona')) {
            $arrayPropiedadesZona['data'] = $em->getReference("SogaNominaBundle:Zona", $session->get('filtroCodigoZona'));                                    
        }        
        $form = $this->createFormBuilder()  
            ->add('zonaRel', 'entity', $arrayPropiedadesZona)
            ->add('detalleRel', 'entity', array(
                'class' => 'SogaNominaBundle:SsoPeriodoDetalle',
                'query_builder' => function (EntityRepository $er) use ($codigoPeriodo) {
                    return $er->createQueryBuilder('pe')
                    ->where('pe.codigoPeriodoFk = :codigoPeriodo')
                    ->setParameter('codigoPeriodo', $codigoPeriodo)
                    ->orderBy('pe.nombre', 'ASC');},
                'property' => 'nombre',
                'required' => true))                  
            ->add('numeroIdentificacion', 'text', array('label'  => 'Identificacion','data' => $session->get('filtroIdentificacion')))                            
            ->add('BtnFiltrar', 'submit', array('label'  => 'Filtrar',))
            ->add('BtnEliminar', 'submit', array('label'  => 'Eliminar',))                            
            ->add('BtnExcel', 'submit', array('label'  => 'Excel',))                            
            ->add('BtnTrasladar', 'submit', array('label'  => 'Trasladar',))                            
            ->add('BtnCopiar', 'submit', array('label'  => 'Copiar',))
            ->getForm();
        return $form;
    }
    private function listarEmpleados($codigoPeriodoDetalle) {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $this->strDetalleEmpleadosDql = $em->getRepository('SogaNominaBundle:SsoPeriodoEmpleado')->dqlEmpleados(
                $codigoPeriodoDetalle,
                $session->get('filtroIdentificacion'),
                $session->get('filtroCodigoZona')
                );
    }
    private function filtrarEmpleados($form) {
        $session = $this->getRequest()->getSession();
        $request = $this->getRequest();
        $controles = $request->request->get('form');
        $session->set('filtroCodigoZona', $controles['zonaRel']);                
        $session->set('filtroIdentificacion', $form->get('numeroIdentificacion')->getData());
    }            
    private function exportarEmpleadosExcel($codigoPeriodoDetalle) {
         $em = $this->getDoctrine()->getManager();
         $objPHPExcel = new \PHPExcel();
                // Set document properties
                $objPHPExcel->getProperties()->setCreator("EMPRESA")
                    ->setLastModifiedBy("EMPRESA")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'Codigo')
                            ->setCellValue('B1', 'Cedula')
                            ->setCellValue('C1', 'Nombre')
                            ->setCellValue('D1', 'Zona');
                $i = 2;
                $dql = $em->getRepository('SogaNominaBundle:SsoPeriodoEmpleado')->dqlEmpleados($codigoPeriodoDetalle, "", "");
                $objQuery = $em->createQuery($dql);  
                $arPeriodoEmpleados = $objQuery->getResult();                                
                foreach ($arPeriodoEmpleados as $arPeriodoEmpleado) {
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A' . $i, $arPeriodoEmpleado->getCodigoPeriodoEmpleadoPk())
                            ->setCellValue('B' . $i, $arPeriodoEmpleado->getNumeroIdentificacion())
                            ->setCellValue('C' . $i, $arPeriodoEmpleado->getNombre())
                            ->setCellValue('D' . $i, $arPeriodoEmpleado->getNombreZona());
                    $i++;
                }

                $objPHPExcel->getActiveSheet()->setTitle('emple_periodo');
                $objPHPExcel->setActiveSheetIndex(0);

                // Redirect output to a client’s web browser (Excel2007)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="EmpleadosPeriodo.xlsx"');
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
