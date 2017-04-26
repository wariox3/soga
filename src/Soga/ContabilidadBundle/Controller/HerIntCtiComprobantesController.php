<?php

namespace Soga\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiComprobantesController extends Controller {
    var $strListaDql = "";
    public function listaAction() {
        set_time_limit(0);
        $em = $this->get('doctrine.orm.entity_manager');
        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();
        $strDesde = "";
        $strHasta = "";
        $arrControles = null;
        $form = $this->formularioFiltro();
        $form->handleRequest($request);
        $this->listar();
        if($form->isValid()) {
            $arrSelecionados = $request->request->get('ChkSeleccionar');
            if($form->get('BtnFiltrar')->isClicked()) {
                $this->filtrar($form);
                $this->listar();
            }
            if($form->get('BtnExportarSeleccionados')->isClicked()) {
                $arConConfiguracion = new \Soga\ContabilidadBundle\Entity\ConConfiguracion();
                $arConConfiguracion = $em->getRepository('SogaContabilidadBundle:ConConfiguracion')->find(1);
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                foreach ($arrSeleccionados AS $strNumero) {
                    $arMaestroComprobante = new \Soga\ContabilidadBundle\Entity\MaestroComprobantes();
                    $arMaestroComprobante = $em->getRepository('SogaContabilidadBundle:MaestroComprobantes')->find($strNumero);
                    $arTipoComprobante = new \Soga\ContabilidadBundle\Entity\TipoComprobante();
                    $arTipoComprobante = $em->getRepository('SogaContabilidadBundle:TipoComprobante')->find($arMaestroComprobante->getId());
                    $arComprobante = new \Soga\ContabilidadBundle\Entity\Comprobantes();
                    $objQuery = $em->getRepository('SogaContabilidadBundle:Comprobantes')->DevDqlComprobanteDetalle($strNumero);
                    $arComprobante = $objQuery->getResult();
                    foreach ($arComprobante as $arComprobante) {                       
                        if($arMaestroComprobante->getId() == 4 || $arMaestroComprobante->getId() == 1) {
                            $arZona = new \Soga\NominaBundle\Entity\Zona();
                            $arZona = $em->getRepository('SogaNominaBundle:Zona')->findOneByNitzona($arComprobante->getNitzona());
                            $arBanco = new \Soga\ContabilidadBundle\Entity\Bancos();
                            $arBanco = $em->getRepository('SogaContabilidadBundle:Bancos')->find($arComprobante->getCodbanco());
                            $arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
                            $arEmpleado = $em->getRepository('SogaNominaBundle:Empleado')->findOneBy(array('cedemple' => $arComprobante->getNitprove()));                                                      
                            $strNumeroDocumento = $this->RellenarNr((int)$strNumero, "0", 9);
                            if(count($arZona) == 1) {
                                //Registro pago de la nomina
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($strNumero);
                                $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteComprobantes());
                                $arNomRegistroExportacion->setFecha($arComprobante->getFecha());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                $arNomRegistroExportacion->setNit($arComprobante->getNitprove());
                                $arNomRegistroExportacion->setDetalle('PAGO DE NOMINA/PRESTACIONES ');
                                $arNomRegistroExportacion->setTipo(1);
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);
                                if($arZona->getTipoempresa() == "NO") {
                                    if($arMaestroComprobante->getId() == 4) {
                                        $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaPrimaTrabajadoresMision());
                                    }else {
                                        $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaTrabajadoresMision());
                                    }

                                } else {
                                    if($arMaestroComprobante->getId() == 4) {
                                        $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaPrimaTrabajadoresPlanta());
                                    }else {
                                        $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaTrabajadoresPlanta());
                                    }
                                }
                                $arNomRegistroExportacion->setValor($arComprobante->getValor());
                                $em->persist($arNomRegistroExportacion);

                                //Registro cuenta del banco
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($strNumero);
                                $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteComprobantes());
                                $arNomRegistroExportacion->setFecha($arComprobante->getFecha());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                $arNomRegistroExportacion->setTipo(2);
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);
                                if($arComprobante->getCuenta() == 'AHORRO') {
                                    $arNomRegistroExportacion->setCuenta($arBanco->getCuentaAhorro());
                                    //$arNomRegistroExportacion->setDetalle('AHORROS ' . $arBanco->getBancos());
                                }
                                if($arComprobante->getCuenta() == 'CORRIENTE') {
                                    $arNomRegistroExportacion->setCuenta($arBanco->getCuentaCorriente());
                                    //$arNomRegistroExportacion->setDetalle('CORRIENTE ' . $arBanco->getBancos());
                                }
                                if($arComprobante->getCuenta() == 'OFICINA') {
                                    $arNomRegistroExportacion->setCuenta($arBanco->getCuentaOficina());
                                    //$arNomRegistroExportacion->setDetalle('OFICINA ' . $arBanco->getBancos());
                                }
                                $strNombre = $arEmpleado->getNomemple() . " " . $arEmpleado->getNomemple1() . " " . $arEmpleado->getApemple() . " " . $arEmpleado->getApemple1();
                                $arNomRegistroExportacion->setDetalle($strNombre);                                                                
                                $arNomRegistroExportacion->setValor($arComprobante->getValor());
                                $em->persist($arNomRegistroExportacion);
                            }
                        }
                        if($arMaestroComprobante->getId() == 3 || $arMaestroComprobante->getId() == 5) {
                            $arZona = new \Soga\NominaBundle\Entity\Zona();
                            $arZona = $em->getRepository('SogaNominaBundle:Zona')->findOneByNitzona($arComprobante->getNitzona());
                            $arBanco = new \Soga\ContabilidadBundle\Entity\Bancos();
                            $arBanco = $em->getRepository('SogaContabilidadBundle:Bancos')->find($arComprobante->getCodbanco());
                            $arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
                            $arEmpleado = $em->getRepository('SogaNominaBundle:Empleado')->findOneBy(array('cedemple' => $arComprobante->getNitprove()));                            
                            $strNumeroDocumento = $this->RellenarNr((int)$strNumero, "0", 9);
                            if(count($arZona) == 1) {
                                //Registro pago de la nomina
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($strNumero);
                                $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteComprobantes());
                                $arNomRegistroExportacion->setFecha($arComprobante->getFecha());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                $arNomRegistroExportacion->setNit($arComprobante->getNitprove());
                                $arNomRegistroExportacion->setDetalle($arTipoComprobante->getDescripcion());
                                $arNomRegistroExportacion->setTipo(1);
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);
                                // Prestacion
                                if($arMaestroComprobante->getId() == 3 ) {
                                    if($arZona->getTipoempresa() == "NO") {
                                        $arNomRegistroExportacion->setCuenta('281510'); //Mision
                                    } else {
                                        $arNomRegistroExportacion->setCuenta('250505'); //Planta
                                    }                                    
                                }                                
                                
                                // Vacacion
                                if($arMaestroComprobante->getId() == 5 ) {
                                    if($arZona->getTipoempresa() == "NO") {
                                        $arNomRegistroExportacion->setCuenta('281515'); //Mision
                                    } else {
                                        $arNomRegistroExportacion->setCuenta('250510'); //Planta
                                    }                                    
                                }
                                
                                $arNomRegistroExportacion->setValor($arComprobante->getValor());
                                $em->persist($arNomRegistroExportacion);

                                //Registro cuenta del banco
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($strNumero);
                                $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteComprobantes());
                                $arNomRegistroExportacion->setFecha($arComprobante->getFecha());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                $arNomRegistroExportacion->setTipo(2);
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);
                                if($arComprobante->getCuenta() == 'AHORRO') {
                                    $arNomRegistroExportacion->setCuenta($arBanco->getCuentaAhorro());
                                    //$arNomRegistroExportacion->setDetalle('AHORROS ' . $arBanco->getBancos());
                                }
                                if($arComprobante->getCuenta() == 'CORRIENTE') {
                                    $arNomRegistroExportacion->setCuenta($arBanco->getCuentaCorriente());
                                    //$arNomRegistroExportacion->setDetalle('CORRIENTE ' . $arBanco->getBancos());
                                }
                                if($arComprobante->getCuenta() == 'OFICINA') {
                                    $arNomRegistroExportacion->setCuenta($arBanco->getCuentaOficina());
                                    //$arNomRegistroExportacion->setDetalle('OFICINA ' . $arBanco->getBancos());
                                }
                                $strNombre = $arEmpleado->getNomemple() . " " . $arEmpleado->getNomemple1() . " " . $arEmpleado->getApemple() . " " . $arEmpleado->getApemple1();
                                $arNomRegistroExportacion->setDetalle($strNombre);                                
                                $arNomRegistroExportacion->setValor($arComprobante->getValor());
                                $em->persist($arNomRegistroExportacion);
                            }
                        }
                        if($arMaestroComprobante->getId() == 13) {                            
                            $arZona = new \Soga\NominaBundle\Entity\Zona();
                            $arZona = $em->getRepository('SogaNominaBundle:Zona')->findOneByNitzona($arComprobante->getNitzona());
                            $arBanco = new \Soga\ContabilidadBundle\Entity\Bancos();
                            $arBanco = $em->getRepository('SogaContabilidadBundle:Bancos')->find($arComprobante->getCodbanco());
                            $strNumeroDocumento = $this->RellenarNr((int)$strNumero, "0", 9);
                            if(count($arZona) == 1) {
                                //Registro pago de la nomina
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($strNumero);
                                $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteComprobantes());
                                $arNomRegistroExportacion->setFecha($arMaestroComprobante->getFechapago());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                $arNomRegistroExportacion->setNit($arComprobante->getNitprove());
                                $arNomRegistroExportacion->setDetalle('DESCUENTO EMPRESA USUARIA');
                                $arNomRegistroExportacion->setTipo(1);
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);                                
                                $arNomRegistroExportacion->setCuenta('23709513');                               
                                $arNomRegistroExportacion->setValor($arComprobante->getValor());
                                $em->persist($arNomRegistroExportacion);
                                
                                //Registro cuenta del banco
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($strNumero);
                                $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteComprobantes());
                                $arNomRegistroExportacion->setFecha($arMaestroComprobante->getFechapago());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                $arNomRegistroExportacion->setTipo(2);
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);
                                if($arComprobante->getCuenta() == 'AHORRO') {
                                    $arNomRegistroExportacion->setCuenta($arBanco->getCuentaAhorro());
                                    $arNomRegistroExportacion->setDetalle('AHORROS ' . $arBanco->getBancos());
                                }
                                if($arComprobante->getCuenta() == 'CORRIENTE') {
                                    $arNomRegistroExportacion->setCuenta($arBanco->getCuentaCorriente());
                                    $arNomRegistroExportacion->setDetalle('CORRIENTE ' . $arBanco->getBancos());
                                }
                                if($arComprobante->getCuenta() == 'OFICINA') {
                                    $arNomRegistroExportacion->setCuenta($arBanco->getCuentaOficina());
                                    $arNomRegistroExportacion->setDetalle('OFICINA ' . $arBanco->getBancos());
                                }
                                $arNomRegistroExportacion->setValor($arComprobante->getValor());
                                $em->persist($arNomRegistroExportacion);
                            }
                            
                        }
                        if($arMaestroComprobante->getId() == 2) {
                            $arBanco = new \Soga\ContabilidadBundle\Entity\Bancos();
                            $arBanco = $em->getRepository('SogaContabilidadBundle:Bancos')->find($arComprobante->getCodbanco());
                            $arProveedor = new \Soga\ContabilidadBundle\Entity\Proveedor();
                            $arProveedor = $em->getRepository('SogaContabilidadBundle:Proveedor')->find($arComprobante->getNitprove());
                            $strNumeroDocumento = $this->RellenarNr((int)$strNumero, "0", 9);
                            $strNumeroDocumentoReferencia = $this->RellenarNr($arComprobante->getNrofactura(), "0", 9);
                            //Registro pago de la nomina
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($strNumero);
                            $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteComprobantes());
                            $arNomRegistroExportacion->setFecha($arComprobante->getFecha());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumentoReferencia);
                            $arNomRegistroExportacion->setNit($arComprobante->getNitprove());
                            $arNomRegistroExportacion->setDetalle('PAGO FRA ' . $arComprobante->getNrofactura());
                            $arNomRegistroExportacion->setTipo(1);
                            $arNomRegistroExportacion->setBase(0);
                            $arNomRegistroExportacion->setPlazo(0);
                            $arNomRegistroExportacion->setCuenta($arTipoComprobante->getCuenta());
                            $arNomRegistroExportacion->setValor($arComprobante->getValor());
                            $em->persist($arNomRegistroExportacion);

                            //Registro cuenta del banco
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($strNumero);
                            $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteComprobantes());
                            $arNomRegistroExportacion->setFecha($arComprobante->getFecha());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                            $arNomRegistroExportacion->setTipo(2);
                            $arNomRegistroExportacion->setBase(0);
                            $arNomRegistroExportacion->setPlazo(0);
                            if($arComprobante->getCuenta() == 'AHORRO') {
                                $arNomRegistroExportacion->setCuenta($arBanco->getCuentaAhorro());                                
                            }
                            if($arComprobante->getCuenta() == 'CORRIENTE') {
                                $arNomRegistroExportacion->setCuenta($arBanco->getCuentaCorriente());                                
                            }
                            if($arComprobante->getCuenta() == 'OFICINA') {
                                $arNomRegistroExportacion->setCuenta($arBanco->getCuentaOficina());                                
                            }
                            $arNomRegistroExportacion->setDetalle($arProveedor->getNomprove());
                            $arNomRegistroExportacion->setValor($arComprobante->getValor());
                            $em->persist($arNomRegistroExportacion);
                        }
                    }
                    $arMaestroComprobante->setExportadoContabilidad(1);
                    $em->persist($arMaestroComprobante);                    
                }
                $em->flush();
                return $this->redirect($this->generateUrl('soga_contabilidad_herramientas_intercambio_contai_comprobantes'));                                    
            }
            if($form->get('BtnGenerarPlano')->isClicked()) {
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
            }
            if($form->get('BtnCargar')->isClicked()) {
                if($form->get('TxtNumeroDesde')->getData() != "" && $form->get('TxtNumeroHasta')->getData() != "") {
                    $intNumeroDesde = $form->get('TxtNumeroDesde')->getData();
                    $intNumeroHasta = $form->get('TxtNumeroHasta')->getData();
                    if($intNumeroDesde <= $intNumeroHasta) {
                        if(($intNumeroHasta - $intNumeroDesde) < 1000) {
                            for ($i = $intNumeroDesde; $i <= $intNumeroHasta; $i++) {
                                $strNumero = $this->RellenarNr($i, "0", 6);
                                $arMaestroComprobante = new \Soga\ContabilidadBundle\Entity\MaestroComprobantes();
                                $arMaestroComprobante = $em->getRepository('SogaContabilidadBundle:MaestroComprobantes')->find($strNumero);
                                if(count($arMaestroComprobante) > 0) {
                                    $arMaestroComprobante->setExportadoContabilidad(0);
                                    $em->persist($arMaestroComprobante);
                                }
                            }
                            $em->flush();                            
                        }
                    }                   
                }
            }                        
            
        }

        $arMaestroComprobantes = $paginator->paginate($em->createQuery($this->strListaDql), $this->getRequest()->query->get('page', 1), 200);
        return $this->render('SogaContabilidadBundle:Herramientas/Intercambio/Comprobantes:lista.html.twig', array(
                    'arMaestroComprobantes' => $arMaestroComprobantes,
                    'form' => $form->createView(),
                    'arrControles' => $arrControles
        ));
        set_time_limit(60);
    }

    private function listar() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $this->strListaDql = $em->getRepository('SogaContabilidadBundle:MaestroComprobantes')->DevDqlComprobantesSinExportar(
                $session->get('filtroFechaDesde'),
                $session->get('filtroFechaHasta'),
                $session->get('filtroTipoComprobante')
                );
    }

    private function formularioFiltro() {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $form = $this->createFormBuilder()
            ->add('tipoComprobante', 'choice', array('choices' => array(
                '' => 'SELECCIONE',
                '1' => '1* PAGO NOMINA',
                '2' => '2* PAGO COMPRAS',
                '3' => '3* PAGO PRESTACIONES',
                '4' => '4* PAGO PRIMAS',
                '5' => '5* PAGO VACACIONES',
                '6' => '6 PAGO CREDITO EMPLEADO',
                '7' => '7 PAGO CREDITO BANCO',
                '8' => '8 PAGO CUOTA LEASING',
                '9' => '9 DESEMBOLSO DE CAJA MENOR',
                '10' => '10 DEVOLUCION CREDITO EMPLEADO ALIANZA',
                '11' => '11 TRASLADO DE FONDOS',
                '12' => '12 DEVOLUCION CHEQUE',
                '13' => '13* DEVOLUCION CREDITO EMPLEADO (USUARIA)',
                '15' => '15 PAGO DE INDEMNIZACION',
                '16' => '16 DESEMBOLSO DE VIATICOS',
                '17' => '17 BONO REGALO NAVIDEÑO',
                '18' => '18 GASTOS POR TRAMITES DE INCAPACIDAD',
                '19' => '19 PAGO DE INCAPACIDAD',
                '20' => '20 PAGO POLIZA FUNERARIA',
                '21' => '21 DOCUMENTO ANULADO',
                '22' => '22 PAGO ALIANZA TERCERO',
                '23' => '23 PAGO DE UTILIDAD NO GRABABLE',
                '24' => '24 PAGO DE IMPUESTOS DIAN',
                '25' => '25 GASTOS POR HOSPEDAJE HOTELERO ',
                '26' => '26 DEVOLUCION POLIZA VIDA TERCERO',
                '27' => '27 GASTOS POR SERVICIO MENSAJERIA',
                '28' => '28 PAGO EMBARGO JUZGADOS',
                '29' => '29 PAGO SEGURIDAD SOCIAL',
                '30' => '30 PAGO SERVICIOS PUBLICOS',
                '31' => '31 GASTOS REPRESENTACION LEGAL',
                '32' => '32 PRESTAMO JG EMPLEADO EN MISION',
                '33' => '33 DEDUCCION EMPRESA USUARIA',
                '34' => '34 PAGO CREDITO BANCO ROTATIVO',
                '35' => '35 ABONO A PRESTAMO TERCERO',
                '36' => '36 PAGO PRESTAMO TERCERO',
                '37' => '37 PAGO LINEA CELULAR',
                '48' => '48* PAGO CESANTIAS',
                    ), 'data' => $session->get('filtroTipoComprobante')))
            ->add('TxtFechaDesde', 'text', array('label'  => 'Desde','data' => $session->get('filtroFechaDesde')))
            ->add('TxtFechaHasta', 'text', array('label'  => 'Hasta','data' => $session->get('filtroFechaHasta')))
            ->add('TxtNumeroDesde', 'text', array('label'  => 'Desde'))
            ->add('TxtNumeroHasta', 'text', array('label'  => 'Hasta'))                
            ->add('BtnExportarSeleccionados', 'submit', array('label'  => 'Exportar seleccionados'))
            ->add('BtnGenerarPlano', 'submit', array('label'  => 'Generar plano',))
            ->add('BtnCargar', 'submit', array('label'  => 'Cargar',))
            ->add('BtnFiltrar', 'submit', array('label'  => 'Filtrar',))
            ->getForm();
        return $form;
    }

    private function filtrar ($form) {
        $session = $this->getRequest()->getSession();
        $session->set('filtroFechaDesde', $form->get('TxtFechaDesde')->getData());
        $session->set('filtroFechaHasta', $form->get('TxtFechaHasta')->getData());
        $session->set('filtroTipoComprobante', $form->get('tipoComprobante')->getData());
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
