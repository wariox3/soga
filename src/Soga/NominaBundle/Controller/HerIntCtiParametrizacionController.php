<?php

namespace Soga\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HerIntCtiParametrizacionController extends Controller {

    public function epsAction() {
        $em = $this->get('doctrine.orm.entity_manager');        
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrDetalles = $request->request->All();
            if (isset($arrDetalles['LblCodigo'])) {
                if (count($arrDetalles['LblCodigo']) > 0) {                    
                    $intIndice = 0;
                    foreach ($arrDetalles['LblCodigo'] as $intCodigo) {
                        $strNuevoNit = $arrDetalles['TxtNit'][$intIndice];
                        //$arPension = new \Soga\NominaBundle\Entity\Eps();
                        $arPension = $em->getRepository('SogaNominaBundle:Eps')->find($intCodigo);         
                        if (isset($arrDetalles['TxtNit'])) {
                            $arPension->setNit ($strNuevoNit);
                        }                            
                        $em->persist($arPension);
                        $em->flush();                        
                        $intIndice++;
                    }                    
                }
            }                        
        }

        $arPension = new \Soga\NominaBundle\Entity\Eps();
        $arPension = $em->getRepository('SogaNominaBundle:Eps')->findAll();         

        return $this->render('SogaNominaBundle:Herramientas/Intercambio:parametrizacionEps.html.twig', array(
                    'arEps' => $arPension
        ));
    }   
    
    public function pensionAction() {
        $em = $this->get('doctrine.orm.entity_manager');        
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrDetalles = $request->request->All();
            if (isset($arrDetalles['LblCodigo'])) {
                if (count($arrDetalles['LblCodigo']) > 0) {                    
                    $intIndice = 0;
                    foreach ($arrDetalles['LblCodigo'] as $intCodigo) {
                        $strNuevoNit = $arrDetalles['TxtNit'][$intIndice];
                        //$arPension = new \Soga\NominaBundle\Entity\Pension();
                        $arPension = $em->getRepository('SogaNominaBundle:Pension')->find($intCodigo);         
                        if (isset($arrDetalles['TxtNit'])) {
                            $arPension->setNit ($strNuevoNit);
                        }                            
                        $em->persist($arPension);
                        $em->flush();                        
                        $intIndice++;
                    }                    
                }
            }                        
        }

        $arPension = new \Soga\NominaBundle\Entity\Pension();
        $arPension = $em->getRepository('SogaNominaBundle:Pension')->findAll();         

        return $this->render('SogaNominaBundle:Herramientas/Intercambio:parametrizacionPension.html.twig', array(
                    'arPension' => $arPension
        ));
    }        
    
    public function salarioAction() {
        $em = $this->get('doctrine.orm.entity_manager');        
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrDetalles = $request->request->All();
            if (isset($arrDetalles['LblCodigo'])) {
                if (count($arrDetalles['LblCodigo']) > 0) {                    
                    $intIndice = 0;
                    foreach ($arrDetalles['LblCodigo'] as $intCodigo) {
                        $strNuevaCuenta = $arrDetalles['TxtCuenta'][$intIndice];
                        $strNuevaCuenta2 = $arrDetalles['TxtCuenta2'][$intIndice];
                        $strNuevaCuenta3 = $arrDetalles['TxtCuenta3'][$intIndice];
                        $strNuevoNit = $arrDetalles['TxtNit'][$intIndice];
                        $strNuevoTipo = $arrDetalles['TxtTipo'][$intIndice];
                        //$arSalario = new \Soga\NominaBundle\Entity\Salario();
                        $arSalario = $em->getRepository('SogaNominaBundle:Salario')->find($intCodigo);         
                        $arSalario->setCuenta($strNuevaCuenta);
                        $arSalario->setCuenta2($strNuevaCuenta2);
                        $arSalario->setCuenta3($strNuevaCuenta3);
                        $arSalario->setTipoAsiento($strNuevoTipo);
                        $arSalario->setNit($strNuevoNit);    
                        if(isset($arrDetalles['ChkNitFijo'.$intCodigo])) {
                            $arSalario->setNitFijo(1);
                        } else {
                            $arSalario->setNitFijo(0);
                        }
                        if(isset($arrDetalles['ChkNitEmpleado'.$intCodigo])) {
                            $arSalario->setNitEmpleado(1);
                        } else {
                            $arSalario->setNitEmpleado(0);
                        }                        
                        if(isset($arrDetalles['ChkNitEmpresaUsuaria'.$intCodigo])) {
                            $arSalario->setNitEmpresaUsuaria(1);
                        } else {
                            $arSalario->setNitEmpresaUsuaria(0);
                        }                        
                        $em->persist($arSalario);
                        $em->flush();                        
                        $intIndice++;
                    }                    
                }
            }                        
        }

        //$arSalario = new \Soga\NominaBundle\Entity\Salario();
        $arSalario = $em->getRepository('SogaNominaBundle:Salario')->findAll();         

        return $this->render('SogaNominaBundle:Herramientas/Intercambio:parametrizacionSalario.html.twig', array(
                    'arSalario' => $arSalario
        ));
    }            
}
