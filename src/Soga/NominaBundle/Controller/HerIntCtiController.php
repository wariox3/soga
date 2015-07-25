<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiController extends Controller {

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
                    foreach ($arrSeleccionados AS $consecutivo) {                        
                        $arNomina = new \Soga\NominaBundle\Entity\Nomina();
                        $arNomina = $em->getRepository('SogaNominaBundle:Nomina')->find($consecutivo);                        
                        $arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
                        $arEmpleado = $em->getRepository('SogaNominaBundle:Empleado')->findOneByCedemple($arNomina->getCedulaEmpleado());
                        $arZona = new \Soga\NominaBundle\Entity\Zona();
                        $arZona = $em->getRepository('SogaNominaBundle:Zona')->find($arEmpleado->getCodzona()); 
                        $douDebitos = 0;
                        $douCreditos = 0;
                        $arDenomina = new \Soga\NominaBundle\Entity\Denomina();
                        $objQuery = $em->getRepository('SogaNominaBundle:Denomina')->DevDqlNominaDetalle($consecutivo);
                        $arDenomina = $objQuery->getResult();     
                        foreach ($arDenomina as $arDenomina) {   
                            $arSalario = new \Soga\NominaBundle\Entity\Salario();
                            $arSalario = $em->getRepository('SogaNominaBundle:Salario')->find($arDenomina->getCodsala());                             
                            $strNumeroDocumento = $this->RellenarNr((int)$consecutivo, "0", 9);
                            $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                            $arNomRegistroExportacion->setConsecutivo($consecutivo);                                                        
                            $arNomRegistroExportacion->setComprobante($arNomConfiguracion->getComprobanteInterface());
                            $arNomRegistroExportacion->setFecha($arNomina->getFechaDesde());
                            $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                            $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                            if($arSalario->getNitFijo() == 1) {
                                $arNomRegistroExportacion->setNit($arSalario->getNit());
                            } else {
                                $arNomRegistroExportacion->setNit($this->DevNit($arEmpleado, $arDenomina->getCodsala()));
                            }
                            if($arSalario->getNitEmpleado() == 1) {
                                $arNomRegistroExportacion->setNit($arNomina->getCedulaEmpleado());
                            }                                
                            if($arSalario->getNitEmpresaUsuaria() == 1) {
                                $arNomRegistroExportacion->setNit($arZona->getNitzona());
                            }                                
                            $arNomRegistroExportacion->setDetalle($arSalario->getDesala());
                            $arNomRegistroExportacion->setTipo($arSalario->getTipoAsiento());                                
                            $arNomRegistroExportacion->setBase(0);
                            $arNomRegistroExportacion->setPlazo(0);  
                            if($arZona->getTipoempresa() == "NO") {
                                $arNomRegistroExportacion->setCuenta($arSalario->getCuenta());
                            } else {
                                $arNomRegistroExportacion->setCuenta($arSalario->getCuenta2());
                            }
                            if($arEmpleado->getComercial() == "SI"){
                                $arNomRegistroExportacion->setCuenta($arSalario->getCuenta3());
                            }
                            

                            if($arSalario->getTipoAsiento() == 1) {
                                $arNomRegistroExportacion->setValor($arDenomina->getSalario());
                                $douDebitos = $douDebitos + $arDenomina->getSalario();
                            } else {
                                $arNomRegistroExportacion->setValor($arDenomina->getDeduccion() * -1);
                                $douCreditos = $douCreditos + ($arDenomina->getDeduccion()*-1);
                            }
                            $em->persist($arNomRegistroExportacion);                                                      
                        }
                        if($arZona->getTipoempresa() == "NO") {
                            $this->CuentasPrincipales($arNomina, $douDebitos, $douCreditos, $arNomConfiguracion->getComprobanteInterface(), $arNomConfiguracion->getCuentaTrabajadoresMision(), "NOMINA POR PAGAR");
                        } else {
                            $this->CuentasPrincipales($arNomina, $douDebitos, $douCreditos, $arNomConfiguracion->getComprobanteInterface(), $arNomConfiguracion->getCuentaTrabajadoresPlanta(), "NOMINA POR PAGAR");
                        }                             
                        $arNomina->setExportadoContabilidad(1);
                        $em->persist($arNomina);                        
                    }
                    $em->flush();
                    break;

                case "OpExportarTodos";
                    $arNomConfiguracion = new \Soga\NominaBundle\Entity\NomConfiguracion();
                    $arNomConfiguracion = $em->getRepository('SogaNominaBundle:NomConfiguracion')->find(1);                      
                    $arNominasExportar = new \Soga\NominaBundle\Entity\Nomina();
                    $query = $em->getRepository('SogaNominaBundle:Nomina')->DevDqlNominaSinExportar($arrControles['TxtFechaDesde'], $arrControles['TxtFechaHasta']);
                    $arNominasExportar = $query->getResult();                    
                    foreach ($arNominasExportar AS $arNominasExportar) {                        
                        $consecutivo = $arNominasExportar->getConsecutivo();
                        $arNomina = new \Soga\NominaBundle\Entity\Nomina();                        
                        $arNomina = $em->getRepository('SogaNominaBundle:Nomina')->find($consecutivo);                        
                        $arEmpleado = new \Soga\NominaBundle\Entity\Empleado();
                        $arEmpleado = $em->getRepository('SogaNominaBundle:Empleado')->findOneByCedemple($arNomina->getCedulaEmpleado());
                        $arZona = new \Soga\NominaBundle\Entity\Zona();
                        $arZona = $em->getRepository('SogaNominaBundle:Zona')->find($arEmpleado->getCodzona()); 
                        $douDebitos = 0;
                        $douCreditos = 0;
                        $arDenomina = new \Soga\NominaBundle\Entity\Denomina();
                        $objQuery = $em->getRepository('SogaNominaBundle:Denomina')->DevDqlNominaDetalle($consecutivo);
                        $arDenomina = $objQuery->getResult();     
                        foreach ($arDenomina as $arDenomina) {   
                            $arSalario = new \Soga\NominaBundle\Entity\Salario();
                            $arSalario = $em->getRepository('SogaNominaBundle:Salario')->find($arDenomina->getCodsala());                             
                            if($arSalario->getCuenta() != "") {
                                $strNumeroDocumento = $this->RellenarNr((int)$consecutivo, "0", 9);
                                $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
                                $arNomRegistroExportacion->setConsecutivo($consecutivo);                                                        
                                $arNomRegistroExportacion->setComprobante($arNomConfiguracion->getComprobanteInterface());
                                $arNomRegistroExportacion->setFecha($arNomina->getFechaDesde());
                                $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
                                $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
                                if($arSalario->getNitFijo() == 1) {
                                    $arNomRegistroExportacion->setNit($arSalario->getNit());
                                } else {
                                    $arNomRegistroExportacion->setNit($this->DevNit($arEmpleado, $arDenomina->getCodsala()));
                                }
                                if($arSalario->getNitEmpleado() == 1) {
                                    $arNomRegistroExportacion->setNit($arNomina->getCedulaEmpleado());
                                }                                
                                if($arSalario->getNitEmpresaUsuaria() == 1) {
                                    $arNomRegistroExportacion->setNit($arZona->getNitzona());
                                }                                
                                $arNomRegistroExportacion->setDetalle($arSalario->getDesala());
                                $arNomRegistroExportacion->setTipo($arSalario->getTipoAsiento());                                
                                $arNomRegistroExportacion->setBase(0);
                                $arNomRegistroExportacion->setPlazo(0);                            
                                if($arZona->getTipoempresa() == "NO") {
                                    $arNomRegistroExportacion->setCuenta($arSalario->getCuenta());
                                } else {
                                    $arNomRegistroExportacion->setCuenta($arSalario->getCuenta2());
                                }
                                if($arEmpleado->getComercial() == "SI"){
                                    $arNomRegistroExportacion->setCuenta($arSalario->getCuenta3());
                                }                                

                                
                                
                                if($arSalario->getTipoAsiento() == 1) {
                                    $arNomRegistroExportacion->setValor($arDenomina->getSalario());
                                    $douDebitos = $douDebitos + $arDenomina->getSalario();
                                } else {
                                    $arNomRegistroExportacion->setValor($arDenomina->getDeduccion() * -1);
                                    $douCreditos = $douCreditos + ($arDenomina->getDeduccion()*-1);
                                }
                                $em->persist($arNomRegistroExportacion);
                            }
                        }
                        if($arZona->getTipoempresa() == "NO") {
                            $this->CuentasPrincipales($arNomina, $douDebitos, $douCreditos, $arNomConfiguracion->getComprobanteInterface(), $arNomConfiguracion->getCuentaTrabajadoresMision(), "NOMINA POR PAGAR");
                        } else {
                            $this->CuentasPrincipales($arNomina, $douDebitos, $douCreditos, $arNomConfiguracion->getComprobanteInterface(), $arNomConfiguracion->getCuentaTrabajadoresPlanta(), "NOMINA POR PAGAR");
                        }                            
                        
                        $arNomina->setExportadoContabilidad(1);
                        $em->persist($arNomina);                        
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
                    
                case "OpCargarNomina";       
                    if($arrControles['TxtNumeroConsecutivoDesde'] && $arrControles['TxtNumeroConsecutivoHasta']){
                        $intNumeroDesde = $arrControles['TxtNumeroConsecutivoDesde'];
                        $intNumeroHasta = $arrControles['TxtNumeroConsecutivoHasta'];
                        if($intNumeroDesde <= $intNumeroHasta) {
                            if(($intNumeroHasta - $intNumeroDesde) < 1000) {                                
                                for ($i = $intNumeroDesde; $i <= $intNumeroHasta; $i++) {
                                    $strNumero = $this->RellenarNr($i, "0", 10);
                                    $arNomina = new \Soga\NominaBundle\Entity\Nomina();                        
                                    $arNomina = $em->getRepository('SogaNominaBundle:Nomina')->find($strNumero);                        
                                    if(count($arNomina) > 0) {
                                        $arNomina->setExportadoContabilidad(0);
                                        $em->persist($arNomina);
                                        $em->flush();
                                    }
                                } 
                            }
                        }

                    }
                    break;                    
            }
        }

        $objQueryNomina = $em->getRepository('SogaNominaBundle:Nomina')->DevDqlNominaSinExportar($strDesde, $strHasta);
        $arNomina = $paginator->paginate($objQueryNomina, $this->getRequest()->query->get('page', 1), 200);

        return $this->render('SogaNominaBundle:Herramientas/Intercambio:lista.html.twig', array(
                    'arNomina' => $arNomina,
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
    private function CuentasPrincipales ($arNomina, $douDebitos, $douCreditos, $strComprobante, $strCuenta, $strDescripcionCuenta) {
        $em = $this->get('doctrine.orm.entity_manager');        
        $strNumeroDocumento = $this->RellenarNr((int)$arNomina->getConsecutivo(), "0", 9);
        
        $arNomRegistroExportacion = new \Soga\NominaBundle\Entity\NomRegistroExportacion();
        $arNomRegistroExportacion->setConsecutivo($arNomina->getConsecutivo());                                                        
        $arNomRegistroExportacion->setComprobante($strComprobante);
        $arNomRegistroExportacion->setFecha($arNomina->getFechaDesde());
        $arNomRegistroExportacion->setDocumento($strNumeroDocumento);
        $arNomRegistroExportacion->setDocumentoReferencia($strNumeroDocumento);
        $arNomRegistroExportacion->setNit($arNomina->getCedulaEmpleado());
        $arNomRegistroExportacion->setDetalle($strDescripcionCuenta);
        $arNomRegistroExportacion->setTipo(2);                                
        $arNomRegistroExportacion->setBase(0);
        $arNomRegistroExportacion->setPlazo(0);                            
        $arNomRegistroExportacion->setCuenta($strCuenta);         
        $arNomRegistroExportacion->setValor($douDebitos - $douCreditos);
        $em->persist($arNomRegistroExportacion);         
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
