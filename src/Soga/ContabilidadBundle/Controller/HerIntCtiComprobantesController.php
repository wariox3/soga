<?php

namespace Soga\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiComprobantesController extends Controller {

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
                    $arConConfiguracion = new \Soga\ContabilidadBundle\Entity\ConConfiguracion();
                    $arConConfiguracion = $em->getRepository('SogaContabilidadBundle:ConConfiguracion')->find(1);  
                    foreach ($arrSeleccionados AS $strNumero) {                        
                        $arMaestroComprobante = new \Soga\ContabilidadBundle\Entity\MaestroComprobantes();
                        $arMaestroComprobante = $em->getRepository('SogaContabilidadBundle:MaestroComprobantes')->find($strNumero);
                        $arComprobante = new \Soga\ContabilidadBundle\Entity\Comprobantes();
                        $objQuery = $em->getRepository('SogaContabilidadBundle:Comprobantes')->DevDqlComprobanteDetalle($strNumero);
                        $arComprobante = $objQuery->getResult();  
                        foreach ($arComprobante as $arComprobante) {   
                            if($arMaestroComprobante->getTipop() == 'PRIMAS' || $arMaestroComprobante->getTipop() == 'NOMINA') {
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
                                    $arNomRegistroExportacion->setFecha($arComprobante->getFecha());
                                    $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                    $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                    $arNomRegistroExportacion->setNit($arComprobante->getNitprove());                            
                                    $arNomRegistroExportacion->setDetalle('PAGO DE ' . $arMaestroComprobante->getTipop());
                                    $arNomRegistroExportacion->setTipo(1);                                
                                    $arNomRegistroExportacion->setBase(0);
                                    $arNomRegistroExportacion->setPlazo(0);  
                                    if($arZona->getTipoempresa() == "NO") {
                                        if($arMaestroComprobante->getTipop() == 'PRIMAS') {
                                            $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaPrimaTrabajadoresMision());
                                        }else {
                                            $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaTrabajadoresMision());
                                        }

                                    } else {
                                        if($arMaestroComprobante->getTipop() == 'PRIMAS') {
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
                            if($arMaestroComprobante->getTipop() == 'PRESTACIONES' || $arMaestroComprobante->getTipop() == 'PRESTACION') {                                
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
                                    $arNomRegistroExportacion->setFecha($arComprobante->getFecha());
                                    $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                    $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                    $arNomRegistroExportacion->setNit($arComprobante->getNitprove());                            
                                    $arNomRegistroExportacion->setDetalle('PAGO DE ' . $arMaestroComprobante->getTipop());
                                    $arNomRegistroExportacion->setTipo(1);                                
                                    $arNomRegistroExportacion->setBase(0);
                                    $arNomRegistroExportacion->setPlazo(0);  
                                    if($arZona->getTipoempresa() == "NO") {                            
                                        $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaPrestacionTrabajadoresMision());                             
                                    } else {
                                        $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaPrestacionTrabajadoresPlanta());                                                                      
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
                        }    
                        $arMaestroComprobante->setExportadoContabilidad(1);
                        $em->persist($arMaestroComprobante);
                        $em->flush();                         
                    }
                    break;

                case "OpExportarTodos";
                    
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
                    
                case "OpCargarComprobante";       
                    if($arrControles['TxtNumeroConsecutivoDesde'] && $arrControles['TxtNumeroConsecutivoHasta']){
                        $intNumeroDesde = $arrControles['TxtNumeroConsecutivoDesde'];
                        $intNumeroHasta = $arrControles['TxtNumeroConsecutivoHasta'];
                        if($intNumeroDesde <= $intNumeroHasta) {
                            if(($intNumeroHasta - $intNumeroDesde) < 1000) {                                
                                for ($i = $intNumeroDesde; $i <= $intNumeroHasta; $i++) {
                                    $strNumero = $this->RellenarNr($i, "0", 6);
                                    $arMaestroComprobante = new \Soga\ContabilidadBundle\Entity\MaestroComprobantes();
                                    $arMaestroComprobante = $em->getRepository('SogaContabilidadBundle:MaestroComprobantes')->find($strNumero);
                                    if(count($arMaestroComprobante) > 0) {
                                        $arMaestroComprobante->setExportadoContabilidad(0);
                                        $em->persist($arMaestroComprobante);
                                        $em->flush();
                                    }
                                } 
                            }
                        }

                    }
                    break;                                        
            }
        }

        $objQueryComprobantes = $em->getRepository('SogaContabilidadBundle:MaestroComprobantes')->DevDqlComprobantesSinExportar($strDesde, $strHasta);
        $arMaestroComprobantes = $paginator->paginate($objQueryComprobantes, $this->getRequest()->query->get('page', 1), 200);

        return $this->render('SogaContabilidadBundle:Herramientas/Intercambio/Comprobantes:lista.html.twig', array(
                    'arMaestroComprobantes' => $arMaestroComprobantes,
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
