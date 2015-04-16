<?php

namespace Soga\NominaBundle\Controller;

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
                    $arNomConfiguracion = new \Soga\NominaBundle\Entity\NomConfiguracion();
                    $arNomConfiguracion = $em->getRepository('SogaNominaBundle:NomConfiguracion')->find(1); 
                    $arNomConfiguracion->setComprobanteInterface($arrControles['TxtComprobante']);
                    $arNomConfiguracion->setComprobantePrestaciones($arrControles['TxtComprobantePrestaciones']);
                    $arNomConfiguracion->setRutaExportacion($arrControles['TxtRuta']);
                    $arNomConfiguracion->setCuentaTrabajadoresMision($arrControles['TxtCuentaTrabajadoresMision']);
                    $arNomConfiguracion->setCuentaTrabajadoresPlanta($arrControles['TxtCuentaTrabajadoresPlanta']);
                    $em->persist($arNomConfiguracion);
                    $em->flush();
                    break;                 
            }
        }
        $arNomConfiguracion = new \Soga\NominaBundle\Entity\NomConfiguracion();
        $arNomConfiguracion = $em->getRepository('SogaNominaBundle:NomConfiguracion')->find(1);
        return $this->render('SogaNominaBundle:Configuracion:configuracion.html.twig', array(
                    'arrControles' => $arrControles,
                    'arNomConfiguracion' => $arNomConfiguracion
        ));
        
    }   
    
}
