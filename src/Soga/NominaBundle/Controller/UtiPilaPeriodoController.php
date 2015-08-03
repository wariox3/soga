<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityRepository;

class UtiPilaPeriodoController extends Controller {
    var $strDetalleEmpleadosDql = "";
    public function listaAction() {
        set_time_limit(0);        
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();                      
            if($request->request->get('OpGenerarPeriodo')) {
                $codigoPeriodo = $request->request->get('OpGenerarPeriodo');
                $arPeriodo = new \Soga\NominaBundle\Entity\SsoPeriodo();
                $arPeriodo = $em->getRepository('SogaNominaBundle:SsoPeriodo')->find($codigoPeriodo);                           
                $arSucursales = new \Soga\NominaBundle\Entity\SsoSucursal();
                $arSucursales = $em->getRepository('SogaNominaBundle:SsoSucursal')->findAll();                                           
                foreach ($arSucursales as $arSucursal) {
                    $arPeriodoDetalle = new \Soga\NominaBundle\Entity\SsoPeriodoDetalle();
                    $arPeriodoDetalle->setCodigoPeriodoFk($codigoPeriodo);
                    $arPeriodoDetalle->setNombre($arSucursal->getNombre());
                    $arPeriodoDetalle->setAnio($arPeriodo->getAnio());
                    $arPeriodoDetalle->setMes($arPeriodo->getMes());
                    $arPeriodoDetalle->setMesSalud($arPeriodo->getMesSalud());
                    $arPeriodoDetalle->setFechaDesde($arPeriodo->getFechaDesde());
                    $arPeriodoDetalle->setFechaHasta($arPeriodo->getFechaHasta());
                    $arPeriodoDetalle->setSucursalRel($arSucursal);
                    $em->persist($arPeriodoDetalle);
                }
                $em->flush();
                $em->getRepository('SogaNominaBundle:SsoPeriodoEmpleado')->generarEmpleados($codigoPeriodo);                                           
                $arPeriodo->setEstadoGenerado(1);
                $em->persist($arPeriodo);
                $em->flush();
                return $this->redirect($this->generateUrl('soga_nomina_utilidades_pila'));
            }                                                            
        }        
        $objQueryPeriodos = $em->getRepository('SogaNominaBundle:SsoPeriodo')->DevDqlPeriodos();
        $arPeriodos = $paginator->paginate($objQueryPeriodos, $this->getRequest()->query->get('page', 1), 200);                
        
        return $this->render('SogaNominaBundle:Utilidades/Pila:lista.html.twig', array(         
            'arPeriodos' => $arPeriodos
                ));
        set_time_limit(60);
    }         
}
