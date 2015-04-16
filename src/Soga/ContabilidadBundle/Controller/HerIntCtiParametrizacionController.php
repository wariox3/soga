<?php

namespace Soga\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiParametrizacionController extends Controller {

    public function bancosAction() {
        $em = $this->get('doctrine.orm.entity_manager');        
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrDetalles = $request->request->All();
            if (isset($arrDetalles['LblCodigo'])) {
                if (count($arrDetalles['LblCodigo']) > 0) {                    
                    $intIndice = 0;
                    foreach ($arrDetalles['LblCodigo'] as $intCodigo) {
                        $strNuevaAhorro = $arrDetalles['TxtAhorro'][$intIndice];
                        $strNuevaCorriente = $arrDetalles['TxtCorriente'][$intIndice];
                        $strNuevaOficina = $arrDetalles['TxtOficina'][$intIndice];
                        $arBanco = new \Soga\ContabilidadBundle\Entity\Bancos();
                        $arBanco = $em->getRepository('SogaContabilidadBundle:Bancos')->find($intCodigo);         
                        if (isset($arrDetalles['TxtAhorro'])) {
                            $arBanco->setCuentaAhorro($strNuevaAhorro);
                        }                            
                        if (isset($arrDetalles['TxtCorriente'])) {
                            $arBanco->setCuentaCorriente($strNuevaCorriente);
                        }                        
                        if (isset($arrDetalles['TxtOficina'])) {
                            $arBanco->setCuentaOficina($strNuevaOficina);
                        }                        
                        $em->persist($arBanco);
                        $em->flush();                        
                        $intIndice++;
                    }                    
                }
            }                        
        }

        $arBancos = new \Soga\NominaBundle\Entity\Eps();
        $arBancos = $em->getRepository('SogaContabilidadBundle:Bancos')->findAll();         

        return $this->render('SogaContabilidadBundle:Herramientas/Intercambio:parametrizacionBancos.html.twig', array(
                    'arBancos' => $arBancos
        ));
    }   
    
}
