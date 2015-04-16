<?php

namespace Soga\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConConfiguracionController extends Controller {

    public function configuracionAction() {        
        $em = $this->get('doctrine.orm.entity_manager');        
        $request = $this->getRequest();
        $arrControles = null;
        if ($request->getMethod() == 'POST') {  
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {
                case "OpGuardar";
                    $arConConfiguracion = new \Soga\ContabilidadBundle\Entity\ConConfiguracion();
                    $arConConfiguracion = $em->getRepository('SogaContabilidadBundle:ConConfiguracion')->find(1); 
                    $arConConfiguracion->setComprobanteComprobantes($arrControles['TxtComprobante']);                    
                    $arConConfiguracion->setCuentaTrabajadoresMision($arrControles['TxtCuentaTrabajadoresMision']);
                    $arConConfiguracion->setCuentaTrabajadoresPlanta($arrControles['TxtCuentaTrabajadoresPlanta']);
                    $arConConfiguracion->setCuentaPrimaTrabajadoresMision($arrControles['TxtCuentaPrimaTrabajadoresMision']);
                    $arConConfiguracion->setCuentaPrimaTrabajadoresPlanta($arrControles['TxtCuentaPrimaTrabajadoresPlanta']);
                    $em->persist($arConConfiguracion);
                    $em->flush();
                    break;                 
            }
        }
        $arConConfiguracion = new \Soga\ContabilidadBundle\Entity\ConConfiguracion();
        $arConConfiguracion = $em->getRepository('SogaContabilidadBundle:ConConfiguracion')->find(1);
        return $this->render('SogaContabilidadBundle:Herramientas/Intercambio/Configuracion:configuracion.html.twig', array(
                    'arrControles' => $arrControles,
                    'arConConfiguracion' => $arConConfiguracion
        ));
        
    }   
    
}
