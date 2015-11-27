<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiVacacionesController extends Controller {

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
            if($arrControles['TxtFechaDesde'] != "") {
                $strDesde = $arrControles['TxtFechaDesde'];
            }
            if($arrControles['TxtFechaHasta'] != "") {
                $strHasta = $arrControles['TxtFechaHasta'];
            }
            switch ($request->request->get('OpSubmit')) {
                case "OpExportar";
                    $arNomConfiguracion = new \Soga\NominaBundle\Entity\NomConfiguracion();
                    $arNomConfiguracion = $em->getRepository('SogaNominaBundle:NomConfiguracion')->find(1);
                    $strComprobante = $arNomConfiguracion->getComprobanteVacaciones();
                    foreach ($arrSeleccionados AS $consecutivo) {
                        $arVacacion = new \Soga\NominaBundle\Entity\Vacacion();
                        $arVacacion = $em->getRepository('SogaNominaBundle:Vacacion')->find($consecutivo);
                        $arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
                        $arEmpleado = $em->getRepository('SogaNominaBundle:Empleado')->findOneByCedemple($arVacacion->getCedemple());
                        $arZona = new \Soga\NominaBundle\Entity\Zona();
                        $arZona = $em->getRepository('SogaNominaBundle:Zona')->find($arEmpleado->getCodzona());
                        $arDetalleVacacion = new \Soga\NominaBundle\Entity\DetalleVacacion();
                        $objQuery = $em->getRepository('SogaNominaBundle:DetalleVacacion')->DevDqlDetalleVacacion($consecutivo);
                        $arDetalleVacacion = $objQuery->getResult();
                        foreach ($arDetalleVacacion as $arDetalleVacacion) {
                            $arSalario = new \Soga\NominaBundle\Entity\Salario();
                            $arSalario = $em->getRepository('SogaNominaBundle:Salario')->find($arDetalleVacacion->getCodsala());
                            $strNumeroDocumento = $this->RellenarNr((int)$consecutivo, "0", 9);
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($consecutivo);
                            $arNomRegistroExportacion->setComprobante($strComprobante);
                            $arNomRegistroExportacion->setFecha($arVacacion->getFechap());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);                                                        
                            if($arSalario->getNitFijo() == 1) {
                                $arNomRegistroExportacion->setNit($arSalario->getNit());
                            } else {
                                $arNomRegistroExportacion->setNit($this->DevNit($arEmpleado, $arDetalleVacacion->getCodsala()));
                            }
                            if($arSalario->getNitEmpleado() == 1) {
                                $arNomRegistroExportacion->setNit($arVacacion->getCedemple());
                            }                                
                            if($arSalario->getNitEmpresaUsuaria() == 1) {
                                $arNomRegistroExportacion->setNit($arZona->getNitzona());
                            }                             
                            $arNomRegistroExportacion->setDetalle($arDetalleVacacion->getConcepto());
                            $arNomRegistroExportacion->setTipo(2);
                            $arNomRegistroExportacion->setBase(0);
                            $arNomRegistroExportacion->setPlazo(0);                            
                            $arNomRegistroExportacion->setCuenta($arSalario->getCuenta());                            
                            $arNomRegistroExportacion->setValor($arDetalleVacacion->getValorPago());
                            $em->persist($arNomRegistroExportacion);
                            $em->flush();
                        }

                        $this->CuentasPrincipales($arZona, $arVacacion, $strComprobante);

                        $arVacacion->setExportadoContabilidad(1);
                        $em->persist($arVacacion);
                        $em->flush();
                    }
                    break;

                case "OpGenerarPlano";
                    $arRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                    $arRegistroExportacion = $em->getRepository('SogaNominaBundle:NomRegistroExportacion')->findAll();
                    $arNomConfiguracion = new \Soga\NominaBundle\Entity\NomConfiguracion();
                    $arNomConfiguracion = $em->getRepository('SogaNominaBundle:NomConfiguracion')->find(1);
                    $strRutaArchivo = $arNomConfiguracion->getRutaExportacion();
                    $strNombreArchivo = date('YmdHis') . ".txt";
                    $ar = fopen($strRutaArchivo . $strNombreArchivo, "a") or
                            die("Problemas en la creacion del archivo plano");
                    //fputs($ar, "Cuenta\tComprobante\tFecha\tDocumento\tDocumento Ref.\tNit\tDetalle\tTipo\tValor\tBase\tCentro de Costo\tTrans. Ext\tPlazo" . "\n");
                    foreach ($arRegistroExportacion as $arRegistroExportacion) {
                        fputs($ar, $arRegistroExportacion->getCuenta() . "\t");
                        fputs($ar, $arRegistroExportacion->getComprobante() . "\t");
                        fputs($ar, $arRegistroExportacion->getFecha()->format('m/d/Y') . "\t");
                        fputs($ar, $arRegistroExportacion->getDocumento() . "\t");
                        fputs($ar, $arRegistroExportacion->getDocumentoReferencia() . "\t");
                        fputs($ar, $arRegistroExportacion->getNit() . "\t");
                        fputs($ar, $arRegistroExportacion->getDetalle() . "\t");
                        fputs($ar, $arRegistroExportacion->getTipo() . "\t");
                        fputs($ar, $arRegistroExportacion->getValor() . "\t");
                        fputs($ar, $arRegistroExportacion->getBase() . "\t");
                        fputs($ar, $arRegistroExportacion->getCentroCostos() . "\t");
                        fputs($ar, $arRegistroExportacion->getTransaccionExt() . "\t");
                        fputs($ar, $arRegistroExportacion->getPlazo() . "\t");
                        fputs($ar, "\n");
                    }
                    fclose($ar);

                    $strSql = "TRUNCATE TABLE nom_registro_exportacion";
                    $objCon = $em->getConnection()->executeQuery($strSql);

                    $strArchivo = $strRutaArchivo.$strNombreArchivo;
                    header('Content-Description: File Transfer');
                    header('Content-Type: text/csv; charset=ISO-8859-15');
                    header('Content-Disposition: attachment; filename='.basename($strArchivo));
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($strArchivo));
                    readfile($strArchivo);                 
                    exit;
                    break;                    
                    
                case "OpCargarVacacion";       
                    if($arrControles['TxtNumeroConsecutivoDesde'] && $arrControles['TxtNumeroConsecutivoHasta']){
                        $intNumeroDesde = $arrControles['TxtNumeroConsecutivoDesde'];
                        $intNumeroHasta = $arrControles['TxtNumeroConsecutivoHasta'];
                        if($intNumeroDesde <= $intNumeroHasta) {
                            if(($intNumeroHasta - $intNumeroDesde) < 1000) {                                
                                for ($i = $intNumeroDesde; $i <= $intNumeroHasta; $i++) {
                                    $strNumero = $this->RellenarNr($i, "0", 5);
                                    $arVacacion = new \Soga\NominaBundle\Entity\Vacacion();                        
                                    $arVacacion = $em->getRepository('SogaNominaBundle:Vacacion')->find($strNumero);                        
                                    if(count($arVacacion) > 0) {
                                        $arVacacion->setExportadoContabilidad(0);
                                        $em->persist($arVacacion);
                                        $em->flush();
                                    }
                                } 
                            }
                        }

                    }
                    break; 
                    
            }
        }

        $objQueryVacacion = $em->getRepository('SogaNominaBundle:Vacacion')->DevDqlVacacionSinExportar($strDesde, $strHasta);
        $arVacacion = $paginator->paginate($objQueryVacacion, $this->getRequest()->query->get('page', 1), 200);

        return $this->render('SogaNominaBundle:Herramientas/Intercambio:listaVacacion.html.twig', array(
                    'arVacacion' => $arVacacion,
                    'arrControles' => $arrControles
        ));
        set_time_limit(60);
    }

    /**
     * Inserta la cuenta principal del conjunto de resgistros
     *
     * @param clase $arNomina
     * @param double $douDebitos
     * @param double $douCreditos
     */
    private function CuentasPrincipales ($arZona, $arVacacion, $strComprobante) {
        $em = $this->get('doctrine.orm.entity_manager');
        $strNumeroDocumento = $this->RellenarNr((int)$arVacacion->getCodvaca(), "0", 9);

        //Cuenta vacaciones
        $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
        $arNomRegistroExportacion->setConsecutivo($arVacacion->getCodvaca());
        $arNomRegistroExportacion->setComprobante($strComprobante);
        $arNomRegistroExportacion->setFecha($arVacacion->getFechap());
        $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
        $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
        $arNomRegistroExportacion->setNit($arVacacion->getCedemple());
        $arNomRegistroExportacion->setDetalle("VACACIONES");
        $arNomRegistroExportacion->setTipo(1);
        $arNomRegistroExportacion->setBase(0);
        $arNomRegistroExportacion->setPlazo(0);
        $arNomRegistroExportacion->setCuenta("261015");
        $arNomRegistroExportacion->setValor($arVacacion->getValor());
        $em->persist($arNomRegistroExportacion);
        $em->flush();        

        //Cuenta vacaciones
        $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
        $arNomRegistroExportacion->setConsecutivo($arVacacion->getCodvaca());
        $arNomRegistroExportacion->setComprobante($strComprobante);
        $arNomRegistroExportacion->setFecha($arVacacion->getFechap());
        $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
        $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
        $arNomRegistroExportacion->setNit($arVacacion->getCedemple());        
        $arNomRegistroExportacion->setDetalle("VACACIONES POR PAGAR");
        $arNomRegistroExportacion->setTipo(2);
        $arNomRegistroExportacion->setBase(0);
        $arNomRegistroExportacion->setPlazo(0);
        if($arZona->getTipoempresa() == "NO") {
            $arNomRegistroExportacion->setCuenta("281515"); //Mision
        } else {
            $arNomRegistroExportacion->setCuenta("250510"); //Planta
        }        
        $arNomRegistroExportacion->setValor($arVacacion->getValor());
        $em->persist($arNomRegistroExportacion);
        $em->flush();        
        
    }

    /**
     * Devuelve el nit para el caso de pension y salud que son especificos
     *
     * @param clase $arEmpleado
     * @param string $strCodSala
     * @return string Nit de la empresa prestadora del servicio salud o pension
     */
    private function DevNit($arEmpleado, $strCodSala) {
        $em = $this->get('doctrine.orm.entity_manager');
        //$arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
        $strNit = "";
        switch ($strCodSala) {
            case "50";
                $arPension = new \Soga\NominaBundle\Entity\Pension();
                $arPension = $em->getRepository('SogaNominaBundle:Pension')->find($arEmpleado->getCodpension());
                $strNit = $arPension->getNit();
                break;

            case "51";
                $arEps = new \Soga\NominaBundle\Entity\Eps();
                $arEps = $em->getRepository('SogaNominaBundle:Eps')->find($arEmpleado->getCodeps());
                $strNit = $arEps->getNit();
                break;
        }
        return $strNit;
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
