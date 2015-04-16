<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;

class UtiGenerarPagoController extends Controller {

    public function listaAction() {
        set_time_limit(0);
        $em = $this->get('doctrine.orm.entity_manager');
        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();
        $arNomConfiguracion = new \Soga\NominaBundle\Entity\NomConfiguracion();
        $arNomConfiguracion = $em->getRepository('SogaNominaBundle:NomConfiguracion')->find(1);                                              
             
        $frmExportacion = $this->createFormBuilder()
            ->add('TxtFechaDesde', 'text', array('label'  => 'Desde', 'data' => $arNomConfiguracion->getFechaDesdeExportarNomina()))
            ->add('TxtFechaHasta', 'text', array('label'  => 'Hasta', 'data' => $arNomConfiguracion->getFechaHastaExportarNomina()))
            ->add('TxtFechaPago', 'text', array('label'  => 'Hasta', 'data' => $arNomConfiguracion->getFechaPago()))                
            ->add('TxtFechaAplicacion', 'text', array('label'  => 'Hasta', 'data' => $arNomConfiguracion->getFechaAplicacionPago()))                                
            ->add('TxtCuenta', 'text', array('label'  => 'Hasta', 'data' => $arNomConfiguracion->getCuentaDebitar()))                                                
            ->add('Actualizar', 'submit')
            ->getForm();   
        $frmExportacion->handleRequest($request);                     
        if($frmExportacion->isValid()) {
            $arNomConfiguracion->setFechaDesdeExportarNomina($frmExportacion->get('TxtFechaDesde')->getData());
            $arNomConfiguracion->setFechaHastaExportarNomina($frmExportacion->get('TxtFechaHasta')->getData());
            $arNomConfiguracion->setFechaPago($frmExportacion->get('TxtFechaPago')->getData());            
            $arNomConfiguracion->setFechaAplicacionPago($frmExportacion->get('TxtFechaAplicacion')->getData());                        
            $arNomConfiguracion->setCuentaDebitar($frmExportacion->get('TxtCuenta')->getData());                        
            $em->persist($arNomConfiguracion);
            $em->flush();            
        }

        $ar = new ResultSetMapping;
        $ar->addEntityResult('SogaNominaBundle:Zona', 'z');
        $ar->addFieldResult('z', 'codzona', 'codzona'); // ($alias, $columnName, $fieldName)
        $ar->addFieldResult('z', 'zona', 'zona'); // ($alias, $columnName, $fieldName)

        $strSql = "SELECT zona.codzona, zona.zona "
                . "FROM zona LEFT JOIN periodo ON zona.codzona = periodo.codzona "
                . "WHERE periodo.desde='" . $frmExportacion->get('TxtFechaDesde')->getData() . "' "
                . "AND periodo.hasta='" . $frmExportacion->get('TxtFechaHasta')->getData() . "' "
                . "AND periodo.pagado = ''";
        $query = $em->createNativeQuery($strSql, $ar);
        $arZona = $query->getResult();
        $arZona = $paginator->paginate($arZona, $this->getRequest()->query->get('page', 1), 50);                        

        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $arrSeleccionados = $request->request->get('ChkSeleccionar');             
            switch ($request->request->get('OpSubmit')) {    
                case "OpExportar";
                    foreach ($arrSeleccionados AS $codzona) {
                        $ar = new ResultSetMapping;
                        $ar->addEntityResult('SogaNominaBundle:Empleado', 'emp');
                        $ar->addFieldResult('emp', 'codemple', 'codemple'); // ($alias, $columnName, $fieldName)
                        $ar->addFieldResult('emp', 'cedemple', 'cedemple'); 
                        $ar->addFieldResult('emp', 'nomemple', 'nomemple'); 
                        $ar->addFieldResult('emp', 'cuenta', 'cuenta');
                        $ar->addFieldResult('emp', 'nivel', 'nivel');
                        
                        $strSql = "SELECT empleado.codemple, empleado.cedemple, LEFT(CONCAT(empleado.nomemple, ' ', empleado.nomemple1, ' ', empleado.apemple, ' ', empleado.apemple1), 18) as nomemple,
                                          empleado.cuenta, nomina.neto as nivel
                                    FROM empleado,banco,periodo,zona,nomina 
                                    WHERE
                                    zona.codzona=periodo.codzona AND
                                    zona.codzona=empleado.codzona AND
                                    empleado.codbanco=banco.codbanco AND
                                    banco.codbanco='07' AND
                                    nomina.neto > 0 AND
                                    empleado.cedemple=nomina.cedemple AND
                                    periodo.codigo=nomina.codigo AND
                                    periodo.desde='2015-04-01' AND periodo.hasta='2015-04-15' AND
                                    zona.codzona='081'ORDER BY empleado.nomemple,empleado.nomemple1,empleado.apemple,empleado.apemple1";
                        $query = $em->createNativeQuery($strSql, $ar);
                        //$query->setParameter(1, 'romanb');                        
                        $arEmpleados = new \Soga\NominaBundle\Entity\Empleado();
                        $arEmpleados = $query->getResult();
                        $strRutaArchivo = "/var/www/temporalplanos/";
                        $strNombreArchivo = date('YmdHis') . ".txt";
                        $ar = fopen($strRutaArchivo . $strNombreArchivo, "a") or
                                die("Problemas en la creacion del archivo plano");               
                        // Encabezado
                        $strNitEmpresa = $this->RellenarNr("900456778", "0", 10);
                        $strNombreEmpresa = "JGEFECTIVOS S.A.";
                        $strTipoPagoSecuencia = "225PAGO NOMI ";
                        $strFechaCreacion = $arNomConfiguracion->getFechaPago();
                        $strFechaAplicacion = "A" . $arNomConfiguracion->getFechaAplicacionPago();
                        $strNoIdentificado = "000018";                        
                        $douTotal = 0;
                        foreach ($arEmpleados AS $arEmpleado) {
                            $douTotal = $douTotal + $arEmpleado->getNivel();
                        }                        
                        $strValorTotal = $this->RellenarNr($douTotal, "0", 24);
                        $strCuenta = $arNomConfiguracion->getCuentaDebitar();
                        fputs($ar, "1" . $strNitEmpresa . $strNombreEmpresa . $strTipoPagoSecuencia . $strFechaCreacion . $strFechaAplicacion . $strNoIdentificado . $strValorTotal . $strCuenta . "\n");
                        foreach ($arEmpleados AS $arEmpleado) {                            
                            fputs($ar, "6" . $this->RellenarNr($arEmpleado->getCedemple(), "0", 15));
                            fputs($ar, $this->RellenarNr($arEmpleado->getNomemple(),"0", 18));
                            fputs($ar, "005600078");                            
                            fputs($ar, $this->RellenarNr($arEmpleado->getCuenta(), "0", 17));                            
                            fputs($ar, "S37");                            
                            fputs($ar, $this->RellenarNr($arEmpleado->getNivel(), "0", 10));                                                        
                            fputs($ar, "\n");                            
                        }
                        fclose($ar);
                        
                    }                                       
                    /*
                    header ("Content-Type: application/octet-stream");            
                    header ("Content-Disposition: attachment; filename=" . $strNombreArchivo); 
                    header ("Content-Length: ".filesize($strRutaArchivo.$strNombreArchivo));
                    readfile($strRutaArchivo.$strNombreArchivo);
                     * 
                     */
                    break;                                                                            
            }
        }
        
        return $this->render('SogaNominaBundle:Utilidades/Generar:listaPendientesPago.html.twig', array(
                    'arZona' => $arZona,                    
                    'frmExportar' => $frmExportacion->createView()
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
