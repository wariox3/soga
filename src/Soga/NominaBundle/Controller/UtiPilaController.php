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

        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            switch ($request->request->get('OpSubmit')) {
                case "OpGenerar";
                    foreach ($arrSeleccionados as $codigoPeriodo) {
                        $em->getRepository('SogaNominaBundle:SsoPila')->crearRegistro($codigoPeriodo);                                                    
                    }
                    break;    
                    
                case "OpExportar";
                    $arNomConfiguracion = new \Soga\NominaBundle\Entity\NomConfiguracion();
                    $arNomConfiguracion = $em->getRepository('SogaNominaBundle:NomConfiguracion')->find(1);                    
                    if(count($arrSeleccionados) > 0) {
                        
                        $strRutaArchivo = $arNomConfiguracion->getRutaExportacion();
                        $strNombreArchivo = "pila" . date('YmdHis') . ".txt";                        
                        $ar = fopen($strRutaArchivo . $strNombreArchivo, "a") or
                            die("Problemas en la creacion del archivo plano");                        
                        foreach ($arrSeleccionados AS $codigoPeriodo) { 
                            $arPeriodo = new \Soga\NominaBundle\Entity\SsoPeriodo();
                            $arPeriodo = $em->getRepository('SogaNominaBundle:SsoPeriodo')->find($codigoPeriodo);                                                    
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
                            fputs($ar, $arPeriodo->getSucursalRel()->getCodigoPila());
                            fputs($ar, $this->RellenarNr($arPeriodo->getSucursalRel()->getNombre(), " ", 40, "D"));
                            //Arp del aportante
                            fputs($ar, '14-18 ');
                            //Periodo pago para los diferentes sistemas
                            fputs($ar, $arPeriodo->getAnio().'-'. $this->RellenarNr($arPeriodo->getMes(), "0", 2, "I"));
                            fputs($ar, $arPeriodo->getAnio().'-'. $this->RellenarNr($arPeriodo->getMesSalud(), "0", 2, "I"));
                            //Numero radicacion de la planilla
                            fputs($ar, '0000000000');  
                            //Fecha de pago
                            fputs($ar, $arPeriodo->getFechaPago()->format('Y-m-d'));
                            //Numero total de empleados
                            fputs($ar, $this->RellenarNr($arPeriodo->getNumeroEmpleados(), "0", 5, "I"));
                            //Valor total de la nomina
                            fputs($ar, $this->RellenarNr($arPeriodo->getVrNomina(), "0", 12, "I"));
                            fputs($ar, '1');
                            fputs($ar, '89');                            
                            fputs($ar, "\n");                            
                            $arSsoPila = new \Soga\NominaBundle\Entity\SsoPila();                                                                
                            $arSsoPila = $em->getRepository('SogaNominaBundle:SsoPila')->findBy(array('codigoPeriodoFk' => $codigoPeriodo));                                                    
                            foreach($arSsoPila as $arSsoPila) {
                                fputs($ar, $arSsoPila->getTipoRegistro());
                                fputs($ar, $arSsoPila->getSecuencia());
                                fputs($ar, $arSsoPila->getTipoDocumento());
                                fputs($ar, $arSsoPila->getNumeroIdentificacion());
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
                                fputs($ar, $arSsoPila->getIncapacidadAccidenteTrabajoEnfermedadProfesional());
                                fputs($ar, $arSsoPila->getCodigoEntidadPensionPertenece());
                                fputs($ar, $arSsoPila->getCodigoEntidadPensionTraslada());
                                fputs($ar, $arSsoPila->getCodigoEntidadSaludPertenece());
                                fputs($ar, $arSsoPila->getCodigoEntidadSaludTraslada());
                                fputs($ar, $arSsoPila->getCodigoEntidadCajaPertenece());
                                fputs($ar, $arSsoPila->getDiasCotizadosPension());
                                fputs($ar, $arSsoPila->getDiasCotizadosSalud());
                                fputs($ar, $arSsoPila->getDiasCotizadosRiesgosProfesionales());
                                fputs($ar, $arSsoPila->getDiasCotizadosCajaCompensacion());
                                fputs($ar, $arSsoPila->getSalarioBasico());
                                fputs($ar, $arSsoPila->getSalarioIntegral());
                                fputs($ar, $arSsoPila->getIbcPension());
                                fputs($ar, $arSsoPila->getIbcSalud());
                                fputs($ar, $arSsoPila->getIbcRiesgosProfesionales());
                                fputs($ar, $arSsoPila->getIbcCaja());
                                fputs($ar, $arSsoPila->getTarifaAportesPensiones());
                                fputs($ar, $arSsoPila->getCotizacionObligatoria());
                                fputs($ar, $arSsoPila->getAporteVoluntarioFondoPensionesObligatorias());
                                fputs($ar, $arSsoPila->getCotizacionVoluntarioFondoPensionesObligatorias());
                                fputs($ar, $arSsoPila->getTotalCotizacion());
                                fputs($ar, $arSsoPila->getAportesFondoSolidaridadPensionalSolidaridad());
                                fputs($ar, $arSsoPila->getAportesFondoSolidaridadPensionalSubsistencia());
                                fputs($ar, $arSsoPila->getValorNoRetenidoAportesVoluntarios());
                                fputs($ar, $arSsoPila->getTarifaAportesSalud());
                                fputs($ar, $arSsoPila->getCotizacionObligatoriaSalud());
                                fputs($ar, $arSsoPila->getValorUpcAdicional());
                                fputs($ar, $arSsoPila->getNumeroAutorizacionIncapacidadEnfermedadGeneral());
                                fputs($ar, $arSsoPila->getValorIncapacidadEnfermedadGeneral());
                                fputs($ar, $arSsoPila->getNumeroAutorizacionLicenciaMaternidadPaternidad());
                                fputs($ar, $arSsoPila->getValorLicenciaMaternidadPaternidad());
                                fputs($ar, $arSsoPila->getTarifaAportesRiesgosProfesionales());
                                fputs($ar, $arSsoPila->getCentroTrabajoCodigoCt());
                                fputs($ar, $arSsoPila->getCotizacionObligatoriaRiesgos());
                                fputs($ar, $arSsoPila->getTarifaAportesCCF());
                                fputs($ar, $arSsoPila->getValorAporteCCF());
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
                    

                    break;                    
            }
        }
        
        $objQueryPeriodos = $em->getRepository('SogaNominaBundle:SsoPeriodo')->DevDqlPeriodos();
        $arPeriodos = $paginator->paginate($objQueryPeriodos, $this->getRequest()->query->get('page', 1), 200);        
        
        return $this->render('SogaNominaBundle:Utilidades/Pila:lista.html.twig', array(
            'arPeriodos' => $arPeriodos
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
