<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiPrimasController extends Controller {

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
                    $strComprobante = $arNomConfiguracion->getComprobantePrestaciones();
                    foreach ($arrSeleccionados AS $consecutivo) {
                        $arPrestacion = new \Soga\NominaBundle\Entity\Prestacion();
                        $arPrestacion = $em->getRepository('SogaNominaBundle:Prestacion')->find($consecutivo);
                        $arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
                        $arEmpleado = $em->getRepository('SogaNominaBundle:Empleado')->findOneByCedemple($arPrestacion->getCedulaEmpleado());
                        $arZona = new \Soga\NominaBundle\Entity\Zona();
                        $arZona = $em->getRepository('SogaNominaBundle:Zona')->find($arEmpleado->getCodzona());
                        $arDetallePrestacion = new \Soga\NominaBundle\Entity\DetallePrestacion();
                        $objQuery = $em->getRepository('SogaNominaBundle:DetallePrestacion')->DevDqlDetallePrestacion($consecutivo);
                        $arDetallePrestacion = $objQuery->getResult();
                        foreach ($arDetallePrestacion as $arDetallePrestacion) {
                            $arSalario = new \Soga\NominaBundle\Entity\Salario();
                            $arSalario = $em->getRepository('SogaNominaBundle:Salario')->find($arDetallePrestacion->getCodsala());
                            $strNumeroDocumento = $this->RellenarNr((int)$consecutivo, "0", 9);
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($consecutivo);
                            $arNomRegistroExportacion->setComprobante($strComprobante);
                            $arNomRegistroExportacion->setFecha($arPrestacion->getFechaPro());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);                                                        
                            if($arSalario->getNitFijo() == 1) {
                                $arNomRegistroExportacion->setNit($arSalario->getNit());
                            } else {
                                $arNomRegistroExportacion->setNit($this->DevNit($arEmpleado, $arDetallePrestacion->getCodsala()));
                            }
                            if($arSalario->getNitEmpleado() == 1) {
                                $arNomRegistroExportacion->setNit($arPrestacion->getCedulaEmpleado());
                            }                                
                            if($arSalario->getNitEmpresaUsuaria() == 1) {
                                $arNomRegistroExportacion->setNit($arZona->getNitzona());
                            }                             
                            $arNomRegistroExportacion->setDetalle($arDetallePrestacion->getConcepto());
                            $arNomRegistroExportacion->setTipo(2);
                            $arNomRegistroExportacion->setBase(0);
                            $arNomRegistroExportacion->setPlazo(0);                            
                            $arNomRegistroExportacion->setCuenta($arSalario->getCuenta());                            
                            $arNomRegistroExportacion->setValor($arDetallePrestacion->getValorPago());
                            $em->persist($arNomRegistroExportacion);
                            $em->flush();
                        }

                        $this->CuentasPrincipales($arPrestacion, $strComprobante);

                        $arPrestacion->setExportadoContabilidad(1);
                        $em->persist($arPrestacion);
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

                    header ("Content-Type: application/octet-stream");
                    header ("Content-Disposition: attachment; filename=" . $strNombreArchivo);
                    header ("Content-Length: ".filesize($strRutaArchivo.$strNombreArchivo));
                    readfile($strRutaArchivo.$strNombreArchivo);
                    break;
                    
                case "OpCargarPrestacion";       
                    if($arrControles['TxtNumeroPrestacion']){
                        $arPrestacion = new \Soga\NominaBundle\Entity\Prestacion();
                        $arPrestacion = $em->getRepository('SogaNominaBundle:Prestacion')->find($arrControles['TxtNumeroPrestacion']);                        
                        if(count($arPrestacion) > 0) {
                            $arPrestacion->setExportadoContabilidad(0);
                            $em->persist($arPrestacion);
                            $em->flush();
                        }
                    }
                    break;
            }
        }

        $objQueryPrestacion = $em->getRepository('SogaNominaBundle:Prima')->DevDqlPrimasSinExportar($strDesde, $strHasta);
        $arPrima = $paginator->paginate($objQueryPrestacion, $this->getRequest()->query->get('page', 1), 200);

        return $this->render('SogaNominaBundle:Herramientas/Intercambio:listaPrimas.html.twig', array(
                    'arPrima' => $arPrima,
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
    private function CuentasPrincipales ($arPrestacion, $strComprobante) {
        $em = $this->get('doctrine.orm.entity_manager');
        $strNumeroDocumento = $this->RellenarNr((int)$arPrestacion->getNroPresta(), "0", 9);
        //Cuenta cesantias
        $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
        $arNomRegistroExportacion->setConsecutivo($arPrestacion->getNroPresta());
        $arNomRegistroExportacion->setComprobante($strComprobante);
        $arNomRegistroExportacion->setFecha($arPrestacion->getFechaPro());
        $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
        $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
        $arNomRegistroExportacion->setNit($arPrestacion->getCedulaEmpleado());
        $arNomRegistroExportacion->setDetalle("CESANTIAS PRESTACIONES SOCIALES");
        $arNomRegistroExportacion->setTipo(1);
        $arNomRegistroExportacion->setBase(0);
        $arNomRegistroExportacion->setPlazo(0);
        $arNomRegistroExportacion->setCuenta("261005");
        $arNomRegistroExportacion->setValor($arPrestacion->getCesantia());
        $em->persist($arNomRegistroExportacion);
        $em->flush();

        //Cuenta intereses cesantias
        $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
        $arNomRegistroExportacion->setConsecutivo($arPrestacion->getNroPresta());
        $arNomRegistroExportacion->setComprobante($strComprobante);
        $arNomRegistroExportacion->setFecha($arPrestacion->getFechaPro());
        $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
        $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
        $arNomRegistroExportacion->setNit($arPrestacion->getCedulaEmpleado());
        $arNomRegistroExportacion->setDetalle("INTERESES CESANTIAS PRESTACIONES");
        $arNomRegistroExportacion->setTipo(1);
        $arNomRegistroExportacion->setBase(0);
        $arNomRegistroExportacion->setPlazo(0);
        $arNomRegistroExportacion->setCuenta("261010");
        $arNomRegistroExportacion->setValor($arPrestacion->getInteres());
        $em->persist($arNomRegistroExportacion);
        $em->flush();

        //Cuenta prima
        $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
        $arNomRegistroExportacion->setConsecutivo($arPrestacion->getNroPresta());
        $arNomRegistroExportacion->setComprobante($strComprobante);
        $arNomRegistroExportacion->setFecha($arPrestacion->getFechaPro());
        $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
        $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
        $arNomRegistroExportacion->setNit($arPrestacion->getCedulaEmpleado());
        $arNomRegistroExportacion->setDetalle("PRIMA SEMESTRAL PRESTACIONES");
        $arNomRegistroExportacion->setTipo(1);
        $arNomRegistroExportacion->setBase(0);
        $arNomRegistroExportacion->setPlazo(0);
        $arNomRegistroExportacion->setCuenta("261020");
        $arNomRegistroExportacion->setValor($arPrestacion->getPrima());
        $em->persist($arNomRegistroExportacion);
        $em->flush();        

        //Cuenta vacaciones
        $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
        $arNomRegistroExportacion->setConsecutivo($arPrestacion->getNroPresta());
        $arNomRegistroExportacion->setComprobante($strComprobante);
        $arNomRegistroExportacion->setFecha($arPrestacion->getFechaPro());
        $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
        $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
        $arNomRegistroExportacion->setNit($arPrestacion->getCedulaEmpleado());
        $arNomRegistroExportacion->setDetalle("VACACIONES PRESTACIONES SOCIALES");
        $arNomRegistroExportacion->setTipo(1);
        $arNomRegistroExportacion->setBase(0);
        $arNomRegistroExportacion->setPlazo(0);
        $arNomRegistroExportacion->setCuenta("261015");
        $arNomRegistroExportacion->setValor($arPrestacion->getVacacion());
        $em->persist($arNomRegistroExportacion);
        $em->flush();        

        //Cuenta vacaciones
        $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
        $arNomRegistroExportacion->setConsecutivo($arPrestacion->getNroPresta());
        $arNomRegistroExportacion->setComprobante($strComprobante);
        $arNomRegistroExportacion->setFecha($arPrestacion->getFechaPro());
        $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
        $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
        $arNomRegistroExportacion->setNit($arPrestacion->getCedulaEmpleado());        
        $arNomRegistroExportacion->setDetalle("PRESTACIONES POR PAGAR");
        $arNomRegistroExportacion->setTipo(2);
        $arNomRegistroExportacion->setBase(0);
        $arNomRegistroExportacion->setPlazo(0);
        $arNomRegistroExportacion->setCuenta("281505");
        $arNomRegistroExportacion->setValor($arPrestacion->getTotalp());
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
