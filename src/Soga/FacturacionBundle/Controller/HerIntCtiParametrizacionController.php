<?php

namespace Soga\FacturacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiParametrizacionController extends Controller {

    public function itemAction() {
        $em = $this->get('doctrine.orm.entity_manager');        
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrDetalles = $request->request->All();
            if (isset($arrDetalles['LblCodigo'])) {
                if (count($arrDetalles['LblCodigo']) > 0) {                    
                    $intIndice = 0;
                    foreach ($arrDetalles['LblCodigo'] as $intCodigo) {
                        $strCuenta = $arrDetalles['TxtCuenta'][$intIndice];
                        $arItem = new \Soga\FacturacionBundle\Entity\Item();
                        $arItem = $em->getRepository('SogaFacturacionBundle:Item')->find($intCodigo);         
                        if (isset($arrDetalles['TxtCuenta'])) {
                            $arItem->setCuentaInterface($strCuenta);
                        }                                                    
                        $em->persist($arItem);
                        $em->flush();                        
                        $intIndice++;
                    }                    
                }
            }                        
        }

        $arItem = new \Soga\FacturacionBundle\Entity\Item();
        $arItem = $em->getRepository('SogaFacturacionBundle:Item')->findAll();         

        return $this->render('SogaFacturacionBundle:Herramientas/Intercambio:parametrizacionItem.html.twig', array(
                    'arItem' => $arItem
        ));
    }   
    
}
