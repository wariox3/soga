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
                    $em->getRepository('SogaNominaBundle:Nomina')->generarAuxiliar($consecutivo);
                }  
                $em->flush();
                return $this->redirect($this->generateUrl('soga_nomina_procesos_procesar_nomina'));                                    
            }
            
            if($form->get('BtnGenerarPendientes')->isClicked()) {
                $arNominas = new \Soga\NominaBundle\Entity\Nomina();
                $arNominas = $em->getRepository('SogaNominaBundle:Nomina')->findBy(array('procesoAuxiliar' => 0), array('consecutivo' => 'DESC'), 1000);                        
                foreach ($arNominas AS $arNomina) {
                    $em->getRepository('SogaNominaBundle:Nomina')->generarAuxiliar($arNomina->getConsecutivo());
                }      
                $em->flush();
                return $this->redirect($this->generateUrl('soga_nomina_procesos_procesar_nomina'));                                    
            }            
            
        }

        $arNomina = $paginator->paginate($em->createQuery($this->strListaDql), $this->getRequest()->query->get('page', 1), 10);
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
            ->add('BtnGenerarPendientes', 'submit', array('label'  => 'Generar pendientes',))
            ->getForm();
        return $form;
    }    

    function ultimoDiaMes($elAnio,$elMes) {
      return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }
}
