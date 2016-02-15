<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;

class UtiGenerarPagoController extends Controller {

    public function listaAction() {
        set_time_limit(0);
        $em = $this->get('doctrine.orm.entity_manager');
        $em2 = $this->getDoctrine()->getManager();
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
            ->add('CboTipoCuenta', 'choice', array('choices'   => array('S' => 'AHORROS', 'D' => 'CORRIENTE'), 'required'  => false,'empty_value' => false, 'data' => $arNomConfiguracion->getTipoCuenta()))
            ->add('TxtSecuencia', 'text', array('label'  => 'Hasta', 'data' => $arNomConfiguracion->getSecuencia()))
            ->add('Actualizar', 'submit')
            ->getForm();
        $frmExportacion->handleRequest($request);
        if($frmExportacion->isValid()) {
            $arNomConfiguracion->setFechaDesdeExportarNomina($frmExportacion->get('TxtFechaDesde')->getData());
            $arNomConfiguracion->setFechaHastaExportarNomina($frmExportacion->get('TxtFechaHasta')->getData());
            $arNomConfiguracion->setFechaPago($frmExportacion->get('TxtFechaPago')->getData());
            $arNomConfiguracion->setFechaAplicacionPago($frmExportacion->get('TxtFechaAplicacion')->getData());
            $arNomConfiguracion->setCuentaDebitar($frmExportacion->get('TxtCuenta')->getData());
            $arNomConfiguracion->setSecuencia($frmExportacion->get('TxtSecuencia')->getData());
            $arNomConfiguracion->setTipoCuenta($frmExportacion->get('CboTipoCuenta')->getData());
            $em->persist($arNomConfiguracion);
            $em->flush();
        }

        $ar = new ResultSetMapping;
        $ar->addEntityResult('SogaNominaBundle:Zona', 'z');
        $ar->addFieldResult('z', 'codzona', 'codzona'); // ($alias, $columnName, $fieldName)
        $ar->addFieldResult('z', 'zona', 'zona'); // ($alias, $columnName, $fieldName)
        $ar->addFieldResult('z', 'vr_pago_temporal', 'vrPagoTemporal'); // ($alias, $columnName, $fieldName)

        $strSql = "SELECT zona.codzona, zona.zona, vr_pago_temporal "
                . "FROM zona "
                . "LEFT JOIN periodo ON zona.codzona = periodo.codzona "
                . "WHERE periodo.desde='" . $frmExportacion->get('TxtFechaDesde')->getData() . "' "
                . "AND periodo.hasta='" . $frmExportacion->get('TxtFechaHasta')->getData() . "' "
                . "AND periodo.pagado = '' ORDER BY zona.zona";
        $query = $em->createNativeQuery($strSql, $ar);
        $arZona = $query->getResult();
        $arZona = $paginator->paginate($arZona, $this->getRequest()->query->get('page', 1), 50);

        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            switch ($request->request->get('OpSubmit')) {
                case "OpExportar";
                    $arNomConfiguracion->setFechaDesdeExportarNomina($frmExportacion->get('TxtFechaDesde')->getData());
                    $arNomConfiguracion->setFechaHastaExportarNomina($frmExportacion->get('TxtFechaHasta')->getData());
                    $arNomConfiguracion->setFechaPago($frmExportacion->get('TxtFechaPago')->getData());
                    $arNomConfiguracion->setFechaAplicacionPago($frmExportacion->get('TxtFechaAplicacion')->getData());
                    $arNomConfiguracion->setCuentaDebitar($frmExportacion->get('TxtCuenta')->getData());
                    $arNomConfiguracion->setSecuencia($frmExportacion->get('TxtSecuencia')->getData());
                    $arNomConfiguracion->setTipoCuenta($frmExportacion->get('CboTipoCuenta')->getData());
                    $em->persist($arNomConfiguracion);
                    $em->flush();
                    $strRutaArchivo = $arNomConfiguracion->getRutaExportacion();
                    $strNombreArchivo = "PagoNomina" . date('YmdHis') . ".txt";
                    
                    $ar = fopen($strRutaArchivo . $strNombreArchivo, "a") or
                            die("Problemas en la creacion del archivo plano");
                    // Encabezado
                    $strNitEmpresa = $this->RellenarNr("900456778", "0", 10);
                    $strNombreEmpresa = "JGEFECTIVOS S.A.";
                    $strTipoPagoSecuencia = "225PAGO NOMI ";
                    $strFechaCreacion = $arNomConfiguracion->getFechaPago();
                    $strSecuencia = $arNomConfiguracion->getSecuencia();
                    $strFechaAplicacion = $arNomConfiguracion->getFechaAplicacionPago();

                    $strCuenta = $arNomConfiguracion->getCuentaDebitar();
                    $strTipoCuenta = $arNomConfiguracion->getTipoCuenta();

                    $douTotal = 0;
                    $IntNumeroRegistros = 0;
                    foreach ($arrSeleccionados AS $codzona) {
                        $arZonaMap = new ResultSetMapping;
                        $arZonaMap->addEntityResult('SogaNominaBundle:Empleado', 'emp');
                        $arZonaMap->addFieldResult('emp', 'codemple', 'codemple'); // ($alias, $columnName, $fieldName)
                        $arZonaMap->addFieldResult('emp', 'cedemple', 'cedemple');
                        $arZonaMap->addFieldResult('emp', 'nomemple', 'nomemple');
                        $arZonaMap->addFieldResult('emp', 'cuenta', 'cuenta');
                        $arZonaMap->addFieldResult('emp', 'nivel', 'nivel');

                        $strSql = "SELECT empleado.codemple, empleado.cedemple, LEFT(CONCAT(empleado.nomemple, ' ', empleado.nomemple1, ' ', empleado.apemple, ' ', empleado.apemple1), 18) as nomemple,
                                          empleado.cuenta, nomina.neto as nivel
                                    FROM empleado,banco,periodo,zona,nomina
                                    WHERE
                                    zona.codzona=periodo.codzona AND                                    
                                    empleado.codbanco=banco.codbanco AND
                                    banco.codbanco='07' AND
                                    nomina.neto > 0 AND
                                    empleado.cedemple=nomina.cedemple AND
                                    periodo.codigo=nomina.codigo AND
                                    periodo.desde='" . $arNomConfiguracion->getFechaDesdeExportarNomina() . "' AND periodo.hasta='" . $arNomConfiguracion->getFechaHastaExportarNomina() ."' AND
                                    zona.codzona='" . $codzona . "'ORDER BY empleado.nomemple,empleado.nomemple1,empleado.apemple,empleado.apemple1";
                        $query = $em->createNativeQuery($strSql, $arZonaMap);
                        $arEmpleados = new \Soga\NominaBundle\Entity\Empleado();
                        $arEmpleados = $query->getResult();
                        foreach ($arEmpleados AS $arEmpleado) {
                            if($arEmpleado->getCuenta() != "") {
                                $douTotal = $douTotal + $arEmpleado->getNivel();
                                $IntNumeroRegistros++;
                            }

                        }
                    }
                    $strNumeroRegistros = $this->RellenarNr($IntNumeroRegistros, "0", 6);
                    $strValorTotal = $this->RellenarNr($douTotal, "0", 24);
                    fputs($ar, "1" . $strNitEmpresa . $strNombreEmpresa . $strTipoPagoSecuencia . $strFechaCreacion . $strSecuencia . $strFechaAplicacion . $strNumeroRegistros . $strValorTotal . $strCuenta . $strTipoCuenta . "\n");

                    foreach ($arrSeleccionados AS $codzona) {
                        $arZonaExportar = new \Soga\NominaBundle\Entity\Zona();
                        $arZonaExportar = $em->getRepository('SogaNominaBundle:Zona')->find($codzona);

                        $arZonaMap = new ResultSetMapping;
                        $arZonaMap->addEntityResult('SogaNominaBundle:Empleado', 'emp');
                        $arZonaMap->addFieldResult('emp', 'codemple', 'codemple'); // ($alias, $columnName, $fieldName)
                        $arZonaMap->addFieldResult('emp', 'cedemple', 'cedemple');
                        $arZonaMap->addFieldResult('emp', 'nomemple', 'nomemple');
                        $arZonaMap->addFieldResult('emp', 'cuenta', 'cuenta');
                        $arZonaMap->addFieldResult('emp', 'nivel', 'nivel');

                        $strSql = "SELECT empleado.codemple, empleado.cedemple, LEFT(CONCAT(empleado.nomemple, ' ', empleado.nomemple1, ' ', empleado.apemple, ' ', empleado.apemple1), 18) as nomemple,
                                          empleado.cuenta, nomina.neto as nivel
                                    FROM empleado,banco,periodo,zona,nomina
                                    WHERE
                                    zona.codzona=periodo.codzona AND                                    
                                    empleado.codbanco=banco.codbanco AND
                                    banco.codbanco='07' AND
                                    nomina.neto > 0 AND
                                    empleado.cedemple=nomina.cedemple AND
                                    periodo.codigo=nomina.codigo AND
                                    periodo.desde='" . $arNomConfiguracion->getFechaDesdeExportarNomina() . "' AND periodo.hasta='" . $arNomConfiguracion->getFechaHastaExportarNomina() ."' AND
                                    zona.codzona='" . $codzona . "'ORDER BY empleado.nomemple,empleado.nomemple1,empleado.apemple,empleado.apemple1";
                        $query = $em->createNativeQuery($strSql, $arZonaMap);
                        //$query->setParameter(1, 'romanb');
                        $arEmpleados = new \Soga\NominaBundle\Entity\Empleado();
                        $arEmpleados = $query->getResult();

                        foreach ($arEmpleados AS $arEmpleado) {
                            if($arEmpleado->getCuenta() != "") {
                                fputs($ar, "6" . $this->RellenarNr($arEmpleado->getCedemple(), "0", 15));
                                fputs($ar, $this->RellenarNr(utf8_decode($arEmpleado->getNomemple()),"0", 18));
                                fputs($ar, "005600078");
                                fputs($ar, $this->RellenarNr($arEmpleado->getCuenta(), "0", 17));
                                fputs($ar, "S37");
                                fputs($ar, $this->RellenarNr($arEmpleado->getNivel(), "0", 10));
                                fputs($ar, "                      ");
                                fputs($ar, "\n");
                            }

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
                    exit;
                    break;
                    
                case "OpCalcular";
                    $arMapeo = new ResultSetMapping;
                    $arMapeo->addEntityResult('SogaNominaBundle:Zona', 'z');
                    $arMapeo->addFieldResult('z', 'codzona', 'codzona'); // ($alias, $columnName, $fieldName)
                    $arMapeo->addFieldResult('z', 'zona', 'zona'); // ($alias, $columnName, $fieldName)
                    $arMapeo->addFieldResult('z', 'vr_pago_temporal', 'vrPagoTemporal'); // ($alias, $columnName, $fieldName)

                    $strSql = "SELECT zona.codzona, zona.zona, vr_pago_temporal "
                            . "FROM zona "
                            . "LEFT JOIN periodo ON zona.codzona = periodo.codzona "
                            . "WHERE periodo.desde='" . $frmExportacion->get('TxtFechaDesde')->getData() . "' "
                            . "AND periodo.hasta='" . $frmExportacion->get('TxtFechaHasta')->getData() . "' "
                            . "AND periodo.pagado = ''";
                    $objQuery = $em->createNativeQuery($strSql, $arMapeo);
                    $arZonaCalcular = $objQuery->getResult();
                    //$arZonaCalcular = $paginator->paginate($arZonaCalcular, $this->getRequest()->query->get('page', 1), 50);                    
                    foreach($arZonaCalcular as $arZonaCalcular) {
                        $arZonaMap = new ResultSetMapping;
                        $arZonaMap->addEntityResult('SogaNominaBundle:Empleado', 'emp');
                        $arZonaMap->addFieldResult('emp', 'codemple', 'codemple'); // ($alias, $columnName, $fieldName)
                        $arZonaMap->addFieldResult('emp', 'nivel', 'nivel');

                        $strSql = "SELECT COUNT(codemple) as codemple, SUM(nomina.neto) as nivel
                                    FROM empleado,banco,periodo,zona,nomina
                                    WHERE
                                    zona.codzona=periodo.codzona AND                                    
                                    empleado.codbanco=banco.codbanco AND
                                    banco.codbanco='07' AND
                                    nomina.neto > 0 AND
                                    empleado.cedemple=nomina.cedemple AND
                                    periodo.codigo=nomina.codigo AND
                                    periodo.desde='" . $arNomConfiguracion->getFechaDesdeExportarNomina() . "' AND periodo.hasta='" . $arNomConfiguracion->getFechaHastaExportarNomina() ."' AND
                                    zona.codzona='" . $arZonaCalcular->getCodZona() . "'ORDER BY empleado.nomemple,empleado.nomemple1,empleado.apemple,empleado.apemple1";
                        $query = $em->createNativeQuery($strSql, $arZonaMap);
                        //$query->setParameter(1, 'romanb');
                        $arEmpleados = new \Soga\NominaBundle\Entity\Empleado();
                        $arEmpleados = $query->getResult();                        
                        
                        $arZonaActualizar = new \Soga\NominaBundle\Entity\Zona();
                        $arZonaActualizar = $em->getRepository('SogaNominaBundle:Zona')->find($arZonaCalcular->getCodZona());
                        $arZonaActualizar->setVrPagoTemporal($arEmpleados[0]->getNivel());
                        $em->persist($arZonaActualizar);
                        $em->flush();
                    }
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
