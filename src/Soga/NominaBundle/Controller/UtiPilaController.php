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
    public static function RellenarNr($Nro, $Str, $NroCr) {
        $Longitud = strlen($Nro);

        $Nc = $NroCr - $Longitud;
        for ($i = 0; $i < $Nc; $i++)
            $Nro = $Str . $Nro;

        return (string) $Nro;
    }

}
