<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiRecibosController extends Controller {

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
                    $strComprobante = $arNomConfiguracion->getComprobanteRecibos();
                    foreach ($arrSeleccionados AS $consecutivo) {
                        $arMaestroRecibo = new \Soga\NominaBundle\Entity\MaestroRecibo();
                        $arMaestroRecibo = $em->getRepository('SogaNominaBundle:MaestroRecibo')->find($consecutivo);
                        $arTipoRecibo = new \Soga\NominaBundle\Entity\TipoRecibo();
                        $arTipoRecibo = $em->getRepository('SogaNominaBundle:TipoRecibo')->find($arMaestroRecibo->getIdrecibo());
                        $strCliente = "";
                        $arDetalleRecibo = new \Soga\NominaBundle\Entity\Recibo();
                        $objQuery = $em->getRepository('SogaNominaBundle:Recibo')->DevDqlDetalleRecibo($consecutivo);
                        $arDetalleRecibo = $objQuery->getResult();
                        foreach ($arDetalleRecibo as $arDetalleRecibo) {
                            $arBanco = new \Soga\ContabilidadBundle\Entity\Bancos();
                            $arBanco = $em->getRepository('SogaContabilidadBundle:Bancos')->find($arDetalleRecibo->getCodbanco());
                            $strCliente = $arDetalleRecibo->getZona();
                            $strNumeroDocumento = $this->RellenarNr((int)$consecutivo, "0", 9);
                            if($arMaestroRecibo->getIdrecibo() == 1 || $arMaestroRecibo->getIdrecibo() == 2) {
                                $strNumeroDocumentoReferencia = $arDetalleRecibo->getNroFactura();
                            } else {
                                $strNumeroDocumentoReferencia = $consecutivo;
                            }
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($consecutivo);
                            $arNomRegistroExportacion->setComprobante($strComprobante);
                            $arNomRegistroExportacion->setFecha($arMaestroRecibo->getFechaRa());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumentoReferencia);
                            $arNomRegistroExportacion->setNit($arDetalleRecibo->getNit());
                            $arNomRegistroExportacion->setDetalle($arTipoRecibo->getDescripcion());
                            $arNomRegistroExportacion->setTipo(2);
                            $arNomRegistroExportacion->setBase(0);
                            $arNomRegistroExportacion->setPlazo(0);
                            $arNomRegistroExportacion->setCuenta($arTipoRecibo->getCuenta());
                            $arNomRegistroExportacion->setValor($arDetalleRecibo->getAbono());
                            $em->persist($arNomRegistroExportacion);

                            if($arDetalleRecibo->getDescuento() > 0) {
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($consecutivo);
                                $arNomRegistroExportacion->setComprobante($strComprobante);
                                $arNomRegistroExportacion->setFecha($arMaestroRecibo->getFechaRa());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumentoReferencia);
                                $arNomRegistroExportacion->setNit($arDetalleRecibo->getNit());

                                $arNomRegistroExportacion->setDetalle("DCTO P. PAGO FRA" . $arDetalleRecibo->getNroFactura());
                                $arNomRegistroExportacion->setTipo(1);
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);
                                $arNomRegistroExportacion->setCuenta("530535");
                                $arNomRegistroExportacion->setValor($arDetalleRecibo->getDescuento());
                                $em->persist($arNomRegistroExportacion);
                            }

                            if($arDetalleRecibo->getCree() > 0) {
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($consecutivo);
                                $arNomRegistroExportacion->setComprobante($strComprobante);
                                $arNomRegistroExportacion->setFecha($arMaestroRecibo->getFechaRa());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumentoReferencia);
                                $arNomRegistroExportacion->setNit($arDetalleRecibo->getNit());

                                $arNomRegistroExportacion->setDetalle('PAGO INCAPACIDAD');
                                $arNomRegistroExportacion->setTipo(1);
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);
                                $arNomRegistroExportacion->setCuenta("135595");
                                $arNomRegistroExportacion->setValor($arDetalleRecibo->getCree());
                                $em->persist($arNomRegistroExportacion);
                                
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($consecutivo);
                                $arNomRegistroExportacion->setComprobante($strComprobante);
                                $arNomRegistroExportacion->setFecha($arMaestroRecibo->getFechaRa());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumentoReferencia);
                                $arNomRegistroExportacion->setNit($arDetalleRecibo->getNit());

                                $arNomRegistroExportacion->setDetalle('PAGO INCAPACIDAD');
                                $arNomRegistroExportacion->setTipo(2);
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);
                                $arNomRegistroExportacion->setCuenta("236575");
                                $arNomRegistroExportacion->setValor($arDetalleRecibo->getCree());
                                $em->persist($arNomRegistroExportacion);                                
                            }

                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($consecutivo);
                            $arNomRegistroExportacion->setComprobante($strComprobante);
                            $arNomRegistroExportacion->setFecha($arMaestroRecibo->getFechaRa());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumentoReferencia);
                            $arNomRegistroExportacion->setTipo(1);
                            $arNomRegistroExportacion->setBase(0);
                            $arNomRegistroExportacion->setPlazo(0);
                            if($arDetalleRecibo->getCuenta() == 'AHORRO') {
                                $arNomRegistroExportacion->setCuenta($arBanco->getCuentaAhorro());
                            }
                            if($arDetalleRecibo->getCuenta() == 'CORRIENTE') {
                                $arNomRegistroExportacion->setCuenta($arBanco->getCuentaCorriente());
                            }
                            if($arDetalleRecibo->getCuenta() == 'OFICINA') {
                                $arNomRegistroExportacion->setCuenta($arBanco->getCuentaOficina());
                            }
                            $arNomRegistroExportacion->setDetalle($arDetalleRecibo->getZona());
                            $arNomRegistroExportacion->setValor($arDetalleRecibo->getValor());
                            $em->persist($arNomRegistroExportacion);

                        }                        
                        $arMaestroRecibo->setExportadoContabilidad(1);
                        $em->persist($arMaestroRecibo);
                    }
                    $em->flush();
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

                case "OpCargarRecibo";
                    if($arrControles['TxtNumeroConsecutivoDesde'] && $arrControles['TxtNumeroConsecutivoHasta']){
                        $intNumeroDesde = $arrControles['TxtNumeroConsecutivoDesde'];
                        $intNumeroHasta = $arrControles['TxtNumeroConsecutivoHasta'];
                        if($intNumeroDesde <= $intNumeroHasta) {
                            if(($intNumeroHasta - $intNumeroDesde) < 1000) {
                                for ($i = $intNumeroDesde; $i <= $intNumeroHasta; $i++) {
                                    $strNumero = $this->RellenarNr($i, "0", 6);
                                    $arMaestroRecibo = new \Soga\NominaBundle\Entity\MaestroRecibo();
                                    $arMaestroRecibo = $em->getRepository('SogaNominaBundle:MaestroRecibo')->find($strNumero);
                                    if(count($arMaestroRecibo) > 0) {
                                        $arMaestroRecibo->setExportadoContabilidad(0);
                                        $em->persist($arMaestroRecibo);
                                        $em->flush();
                                    }
                                }
                            }
                        }

                    }
                    break;
            }
        }

        $objQueryRecibos = $em->getRepository('SogaNominaBundle:MaestroRecibo')->DevDqlMaestrosRecibosSinExportar($strDesde, $strHasta);
        $arMaestroRecibo = $paginator->paginate($objQueryRecibos, $this->getRequest()->query->get('page', 1), 100);

        return $this->render('SogaNominaBundle:Herramientas/Intercambio:listaRecibos.html.twig', array(
                    'arMaestroRecibo' => $arMaestroRecibo,
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
