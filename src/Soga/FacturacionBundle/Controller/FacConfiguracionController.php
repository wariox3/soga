<?php

namespace Soga\FacturacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FacConfiguracionController extends Controller {

    public function configuracionAction() {        
        $em = $this->get('doctrine.orm.entity_manager');        
        $request = $this->getRequest();
        $arrControles = null;
        if ($request->getMethod() == 'POST') {  
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {
                case "OpGuardar";
                    $arFacConfiguracion = new \Soga\FacturacionBundle\Entity\FacConfiguracion();
                    $arFacConfiguracion = $em->getRepository('SogaFacturacionBundle:FacConfiguracion')->find(1); 
                    $arFacConfiguracion->setComprobanteFacturas($arrControles['TxtComprobante']);
                    $arFacConfiguracion->setCuentaIva($arrControles['TxtCuentaIva']);
                    $arFacConfiguracion->setCuentaRteFte($arrControles['TxtCuentaRteFte']);
                    $arFacConfiguracion->setCuentaRteIva($arrControles['TxtCuentaRteIva']);
                    $arFacConfiguracion->setCuentaCartera($arrControles['TxtCuentaCartera']);
                    $arFacConfiguracion->setCuentaCREE($arrControles['TxtCuentaCREE']);
                    $arFacConfiguracion->setCuentaCREECartera($arrControles['TxtCuentaCREECartera']);
                    $em->persist($arFacConfiguracion);
                    $em->flush();
                    break;                 
            }
        }
        $arFacConfiguracion = new \Soga\FacturacionBundle\Entity\FacConfiguracion();
        $arFacConfiguracion = $em->getRepository('SogaFacturacionBundle:FacConfiguracion')->find(1);
        return $this->render('SogaFacturacionBundle:Herramientas/Intercambio/Configuracion:configuracion.html.twig', array(
                    'arrControles' => $arrControles,
                    'arFacConfiguracion' => $arFacConfiguracion
        ));
        
    }   
    
}
