<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiTercerosController extends Controller {

    public function listaAction() {
        set_time_limit(0);
        $em = $this->get('doctrine.orm.entity_manager');
        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();
        $strDesde = "";
        $strHasta = "";
        $arrControles = null;
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            switch ($request->request->get('OpSubmit')) {
                case "OpExportar";
                    $arNomConfiguracion = new \Soga\NominaBundle\Entity\NomConfiguracion();
                    $arNomConfiguracion = $em->getRepository('SogaNominaBundle:NomConfiguracion')->find(1);                    
                    if(count($arrSeleccionados) > 0) {
                        $strRutaArchivo = $arNomConfiguracion->getRutaExportacion();
                        $strNombreArchivo = "terceros" . date('YmdHis') . ".txt";                        
                        $ar = fopen($strRutaArchivo . $strNombreArchivo, "a") or
                            die("Problemas en la creacion del archivo plano");
                        
                        foreach ($arrSeleccionados AS $codigo) {                        
                            $arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
                            $arEmpleado = $em->getRepository('SogaNominaBundle:Empleado')->find($codigo);
                            fputs($ar, $arEmpleado->getCedemple() . "\t");
                            fputs($ar, $arEmpleado->getTipod() . "\t");
                            fputs($ar, $arEmpleado->getNomemple() . "\t");
                            fputs($ar, $arEmpleado->getDiremple() . "\t");
                            fputs($ar, $arEmpleado->getCodmuni() . "\t");
                            fputs($ar, $arEmpleado->getTelemple() . "\t");
                            fputs($ar, $arEmpleado->getMunicipio() . "\t");
                            fputs($ar, "S" . "\t");
                            fputs($ar, "S" . "\t");
                            fputs($ar, "169" . "\t");
                            fputs($ar, $arEmpleado->getNomemple() . "\t");
                            fputs($ar, $arEmpleado->getNomemple1() . "\t");
                            fputs($ar, $arEmpleado->getApemple() . "\t");
                            fputs($ar, $arEmpleado->getApemple1() . "\t");
                            fputs($ar, $arEmpleado->getEmail() . "\t");
                            fputs($ar, $arEmpleado->getCelular() . "\t");
                            fputs($ar, "\n");                                                                                   

                            //$arEmpleado->setExportadoContabilidad(1);
                            //$em->persist($arEmpleado);
                        }  
                        fclose($ar);
                        //header ("Content-Type: application/octet-stream");
                        //header ("Content-Disposition: attachment; filename=" . $strNombreArchivo);
                        //header ("Content-Length: ".filesize($strRutaArchivo.$strNombreArchivo));
                        //readfile($strRutaArchivo.$strNombreArchivo);                        
                        $strArchivo = $strRutaArchivo.$strNombreArchivo;
                        header('Content-Description: File Transfer');
                        header('Content-Type: text/csv; charset=ISO-8859-15');
                        header('Content-Disposition: attachment; filename='.basename($strArchivo));
                        header('Expires: 0');
                        header('Cache-Control: must-revalidate');
                        header('Pragma: public');
                        header('Content-Length: ' . filesize($strArchivo));
                        readfile($strArchivo);                                            
                    }
                    
                    $em->flush();
                    exit;
                    break;
            }
        }

        $objQueryEmpleados = $em->getRepository('SogaNominaBundle:Empleado')->DevDqlEmpleadosSinExportar();
        $arEmpleados = $paginator->paginate($objQueryEmpleados, $this->getRequest()->query->get('page', 1), 100);

        return $this->render('SogaNominaBundle:Herramientas/Intercambio:listaTerceros.html.twig', array(
                    'arEmpleados' => $arEmpleados,
                    'arrControles' => $arrControles
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
