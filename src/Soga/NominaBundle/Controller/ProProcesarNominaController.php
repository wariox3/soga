<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;

class ProProcesarNominaController extends Controller {

    var $strListaDql = "";
    public function listaAction() {
        set_time_limit(0);
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        $request = $this->getRequest();        
        $form = $this->formulario();
        $form->handleRequest($request);
        $this->listar();
        if($form->isValid()) {
            $arrSelecionados = $request->request->get('ChkSeleccionar');

            if($form->get('BtnGenerar')->isClicked()) {
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                foreach ($arrSeleccionados AS $consecutivo) {
                    $arNomina = new \Soga\NominaBundle\Entity\Nomina();
                    $arNomina = $em->getRepository('SogaNominaBundle:Nomina')->find($consecutivo);                        
                    if($arNomina->getFechaDesde()->format('m') != $arNomina->getFechaHasta()->format('m')) {
                        $fechaDesde = $arNomina->getFechaDesde();
                        $fechaHasta = $arNomina->getFechaHasta();
                        
                        //Mes 1
                        $intUltimoDiaMes = $this->ultimoDiaMes($arNomina->getFechaDesde()->format('Y'), $arNomina->getFechaDesde()->format('m'));
                        $strHastaMes = $arNomina->getFechaDesde()->format('Y/m') . "/" . $intUltimoDiaMes;
                        $fechaHastaMes = date_create($strHastaMes);                        
                        
                        $intDias = $fechaDesde->diff($fechaHastaMes);
                        $intDias = $intDias->format('%a');
                        $intDiasMes1 = $intDias + 1;                         
                        
                        //Mes 2
                        $intPrimerDiaMes = 1;
                        $strDesdeMes = $arNomina->getFechaHasta()->format('Y/m') . "/" . $intPrimerDiaMes;
                        $fechaDesdeMes = date_create($strDesdeMes);                        

                        $intDias = $fechaDesdeMes->diff($fechaHasta);
                        $intDias = $intDias->format('%a');
                        $intDiasMes2 = $intDias + 1;                         
                        
                        $intTotalDias = $intDiasMes1 + $intDiasMes2;                        
                        
                        $arNominaDetalleAuxiliar = new \Soga\NominaBundle\Entity\NominaDetalleAuxiliar();
                        $arNominaDetalleAuxiliar->setCodigoNominaFk($consecutivo);
                        $arNominaDetalleAuxiliar->setNumeroIdentificacion($arNomina->getCedulaEmpleado());
                        $arNominaDetalleAuxiliar->setAnio($arNomina->getFechaDesde()->format('Y'));
                        $arNominaDetalleAuxiliar->setMes($arNomina->getFechaDesde()->format('m'));
                        $arNominaDetalleAuxiliar->setDias($intDiasMes1);
                        $arNominaDetalleAuxiliar->setFechaDesde($fechaDesde);
                        $arNominaDetalleAuxiliar->setFechaHasta($fechaHastaMes);
                        $floIngresoBaseCotizacion = ($arNomina->getPresta() / $intTotalDias) * $intDiasMes1;
                        $arNominaDetalleAuxiliar->setIngresoBaseCotizacion($floIngresoBaseCotizacion);                        
                        $em->persist($arNominaDetalleAuxiliar);                                                          
                        
                        $arNominaDetalleAuxiliar = new \Soga\NominaBundle\Entity\NominaDetalleAuxiliar();
                        $arNominaDetalleAuxiliar->setCodigoNominaFk($consecutivo);
                        $arNominaDetalleAuxiliar->setNumeroIdentificacion($arNomina->getCedulaEmpleado());
                        $arNominaDetalleAuxiliar->setAnio($arNomina->getFechaHasta()->format('Y'));
                        $arNominaDetalleAuxiliar->setMes($arNomina->getFechaHasta()->format('m'));
                        $arNominaDetalleAuxiliar->setDias($intDiasMes2);
                        $arNominaDetalleAuxiliar->setFechaDesde($fechaDesdeMes);
                        $arNominaDetalleAuxiliar->setFechaHasta($fechaHasta);
                        $floIngresoBaseCotizacion = ($arNomina->getPresta() / $intTotalDias) * $intDiasMes2;
                        $arNominaDetalleAuxiliar->setIngresoBaseCotizacion($floIngresoBaseCotizacion);
                        $em->persist($arNominaDetalleAuxiliar);                        
                       
                    } else {
                        $fechaDesde = $arNomina->getFechaDesde();
                        $fechaHasta = $arNomina->getFechaHasta();
                        $intDias = $fechaDesde->diff($fechaHasta);
                        $intDias = $intDias->format('%a');
                        $intDiasPeriodo = $intDias + 1;
                        
                        $arNominaDetalleAuxiliar = new \Soga\NominaBundle\Entity\NominaDetalleAuxiliar();
                        $arNominaDetalleAuxiliar->setCodigoNominaFk($consecutivo);
                        $arNominaDetalleAuxiliar->setNumeroIdentificacion($arNomina->getCedulaEmpleado());
                        $arNominaDetalleAuxiliar->setAnio($arNomina->getFechaDesde()->format('Y'));
                        $arNominaDetalleAuxiliar->setMes($arNomina->getFechaDesde()->format('m'));
                        $arNominaDetalleAuxiliar->setDias($intDiasPeriodo);
                        $arNominaDetalleAuxiliar->setFechaDesde($fechaDesde);
                        $arNominaDetalleAuxiliar->setFechaHasta($fechaHasta);                        
                        $arNominaDetalleAuxiliar->setIngresoBaseCotizacion($arNomina->getPresta());
                        $em->persist($arNominaDetalleAuxiliar);                         
                    }                                        
                    $em->flush();
                }                
                return $this->redirect($this->generateUrl('soga_nomina_procesos_procesar_nomina'));                                    
            }                                  
        }

        $arNomina = $paginator->paginate($em->createQuery($this->strListaDql), $this->getRequest()->query->get('page', 1), 200);
        return $this->render('SogaNominaBundle:Procesos/ProcesarNomina:lista.html.twig', array(
                    'arNomina' => $arNomina,
                    'form' => $form->createView()
        ));
        set_time_limit(60);
    }

    private function listar() {
        $em = $this->getDoctrine()->getManager();        
        $this->strListaDql = $em->getRepository('SogaNominaBundle:Nomina')->dqlNominaSinProcesar();
    }

    private function formulario() {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createFormBuilder()            
            ->add('BtnGenerar', 'submit', array('label'  => 'Generar',))
            ->getForm();
        return $form;
    }

    private function filtrar ($form) {
        $session = $this->getRequest()->getSession();
        $session->set('filtroFechaDesde', $form->get('TxtFechaDesde')->getData());
        $session->set('filtroFechaHasta', $form->get('TxtFechaHasta')->getData());
        $session->set('filtroTipoComprobante', $form->get('tipoComprobante')->getData());
    }

    function ultimoDiaMes($elAnio,$elMes) {
      return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }
}
