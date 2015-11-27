<?php

namespace Soga\FacturacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiFacturacionController extends Controller {

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
                    $arConConfiguracion = new \Soga\FacturacionBundle\Entity\FacConfiguracion();
                    $arConConfiguracion = $em->getRepository('SogaFacturacionBundle:FacConfiguracion')->find(1);  
                    foreach ($arrSeleccionados AS $strNumero) {                          
                        $arFactura = new \Soga\FacturacionBundle\Entity\Facturas();
                        $arFactura = $em->getRepository('SogaFacturacionBundle:Facturas')->find($strNumero);
                        $arZona = new \Soga\NominaBundle\Entity\Zona();
                        $arZona = $em->getRepository('SogaNominaBundle:Zona')->find($arFactura->getCodzona());                         
                        $arDeFactura = new \Soga\FacturacionBundle\Entity\DeFacturas();
                        $objQuery = $em->getRepository('SogaFacturacionBundle:DeFacturas')->DevDqlFacturaDetalle($strNumero);
                        $arDeFactura = $objQuery->getResult();  
                        $douBase = 0;
                        $strNumeroDocumento = $this->RellenarNr((int)$strNumero, "0", 9);
                        foreach ($arDeFactura as $arDeFactura) {      
                            $arItem = new \Soga\FacturacionBundle\Entity\Item();
                            $arItem = $em->getRepository('SogaFacturacionBundle:Item')->find($arDeFactura->getCodcom());
                            if($arItem->getSumar()=='SI') {                                
                                //Registros detalles
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($strNumero);                                                        
                                $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteFacturas());
                                $arNomRegistroExportacion->setFecha($arFactura->getFechaini());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                $arNomRegistroExportacion->setNit($arZona->getNitzona());                            
                                $arNomRegistroExportacion->setDetalle($arItem->getConcepto());
                                $arNomRegistroExportacion->setTipo(2);                                
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);  
                                $arNomRegistroExportacion->setCuenta($arItem->getCuentaInterface());                                                                                   
                                $arNomRegistroExportacion->setValor($arDeFactura->getTotal());
                                $em->persist($arNomRegistroExportacion);
                                $em->flush();                                     
                            }                            
                        }
                        if($arFactura->getNroservicio()==1) {                            
                            $douBaseIva = ($arFactura->getSubtotal() * 10) /100;                        
                        } else {
                            $douBaseIva = $arFactura->getSubtotal();                        
                        }
                        
                        
                        //IVA
                        if($arFactura->getIva() > 0) {
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($strNumero);                                                        
                            $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteFacturas());
                            $arNomRegistroExportacion->setFecha($arFactura->getFechaini());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                            $arNomRegistroExportacion->setNit($arZona->getNitzona());                            
                            $arNomRegistroExportacion->setDetalle('IVA 16%');
                            $arNomRegistroExportacion->setTipo(2);                                
                            $arNomRegistroExportacion->setBase($douBaseIva);
                            $arNomRegistroExportacion->setPlazo(0);  
                            $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaIva());                                                                                   
                            $arNomRegistroExportacion->setValor($arFactura->getIva());
                            $em->persist($arNomRegistroExportacion);
                            $em->flush();                                                     
                        }


                        //Retencion en la fuente
                        if($arFactura->getRfte() > 0) {
                           $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($strNumero);                                                        
                            $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteFacturas());
                            $arNomRegistroExportacion->setFecha($arFactura->getFechaini());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                            $arNomRegistroExportacion->setNit($arZona->getNitzona());                            
                            $arNomRegistroExportacion->setDetalle('RETENCION EN LA FUENTE DEL 1%');
                            $arNomRegistroExportacion->setTipo(1);                                
                            $arNomRegistroExportacion->setBase(0);
                            $arNomRegistroExportacion->setPlazo(0);  
                            $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaRteFte());                                                                                   
                            $arNomRegistroExportacion->setValor($arFactura->getRfte());
                            $em->persist($arNomRegistroExportacion);
                            $em->flush();                            
                        }                           
                        
                        //Retencion de iva
                        if($arFactura->getRteiva() > 0) {
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($strNumero);                                                        
                            $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteFacturas());
                            $arNomRegistroExportacion->setFecha($arFactura->getFechaini());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                            $arNomRegistroExportacion->setNit($arZona->getNitzona());                            
                            $arNomRegistroExportacion->setDetalle('RETENCION POR IVA DEL 15%');
                            $arNomRegistroExportacion->setTipo(1);                                
                            $arNomRegistroExportacion->setBase(0);
                            $arNomRegistroExportacion->setPlazo(0);  
                            $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaRteIva());                                                                                   
                            $arNomRegistroExportacion->setValor($arFactura->getRteiva());
                            $em->persist($arNomRegistroExportacion);
                            $em->flush();                             
                        }                       

                        //Retencion de cree
                        if($arFactura->getVlrcre() > 0) {
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($strNumero);                                                        
                            $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteFacturas());
                            $arNomRegistroExportacion->setFecha($arFactura->getFechaini());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                            $arNomRegistroExportacion->setNit($arZona->getNitzona());                            
                            $arNomRegistroExportacion->setDetalle('AUTORETENCION CREE  0.80');
                            $arNomRegistroExportacion->setTipo(1);                                
                            $arNomRegistroExportacion->setBase($douBaseIva);
                            $arNomRegistroExportacion->setPlazo(0);  
                            $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaCREECartera());                                                                                   
                            $arNomRegistroExportacion->setValor($arFactura->getVlrcre());
                            $em->persist($arNomRegistroExportacion);
                            $em->flush();                             
                            
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($strNumero);                                                        
                            $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteFacturas());
                            $arNomRegistroExportacion->setFecha($arFactura->getFechaini());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                            $arNomRegistroExportacion->setNit($arZona->getNitzona());                            
                            $arNomRegistroExportacion->setDetalle('AUTORETENCION CREE  0.80');
                            $arNomRegistroExportacion->setTipo(2);                                
                            $arNomRegistroExportacion->setBase($douBaseIva);
                            $arNomRegistroExportacion->setPlazo(0);  
                            $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaCREE());                                                                                   
                            $arNomRegistroExportacion->setValor($arFactura->getVlrcre());
                            $em->persist($arNomRegistroExportacion);
                            $em->flush();                            
                            
                        }                         
                        
                        //Cuenta por cobrar                        
                        $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                        $arNomRegistroExportacion->setConsecutivo($strNumero);                                                        
                        $arNomRegistroExportacion->setComprobante($arConConfiguracion->getComprobanteFacturas());
                        $arNomRegistroExportacion->setFecha($arFactura->getFechaini());
                        $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                        $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                        $arNomRegistroExportacion->setNit($arZona->getNitzona());                            
                        $arNomRegistroExportacion->setDetalle('CUENTA POR COBRAR CLIENTES');
                        $arNomRegistroExportacion->setTipo(1);                                
                        $arNomRegistroExportacion->setBase(0);
                        $arNomRegistroExportacion->setPlazo(0);  
                        $arNomRegistroExportacion->setCuenta($arConConfiguracion->getCuentaCartera());                                                                                   
                        $arNomRegistroExportacion->setValor($arFactura->getGrantotal());
                        $em->persist($arNomRegistroExportacion);
                        $em->flush();                          
                        
                        $arFactura->setExportadoContabilidad(1);
                        $em->persist($arFactura);
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
                    
                case "OpCargarFactura";
                    if($arrControles['TxtNumeroConsecutivoDesde'] && $arrControles['TxtNumeroConsecutivoHasta']){
                        $intNumeroDesde = $arrControles['TxtNumeroConsecutivoDesde'];
                        $intNumeroHasta = $arrControles['TxtNumeroConsecutivoHasta'];
                        if($intNumeroDesde <= $intNumeroHasta) {
                            if(($intNumeroHasta - $intNumeroDesde) < 1000) {
                                for ($i = $intNumeroDesde; $i <= $intNumeroHasta; $i++) {
                                    $strNumero = $this->RellenarNr($i, "0", 4);
                                    $arFactura = new \Soga\FacturacionBundle\Entity\Facturas();
                                    $arFactura = $em->getRepository('SogaFacturacionBundle:Facturas')->find($strNumero);
                                    if(count($arFactura) > 0) {
                                        $arFactura->setExportadoContabilidad(0);
                                        $em->persist($arFactura);
                                        $em->flush();
                                    }
                                }
                            }
                        }

                    }
                    break;                    
            }
        }

        $objQueryFacturas = $em->getRepository('SogaFacturacionBundle:Facturas')->DevDqlFacturasSinExportar($strDesde, $strHasta);
        $arFacturas = $paginator->paginate($objQueryFacturas, $this->getRequest()->query->get('page', 1), 200);

        return $this->render('SogaFacturacionBundle:Herramientas/Intercambio/Facturas:lista.html.twig', array(
                    'arFacturas' => $arFacturas,
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
