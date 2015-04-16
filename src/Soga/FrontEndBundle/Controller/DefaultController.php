<?php

namespace Soga\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SogaFrontEndBundle:Default:index.html.twig');
    }
    public function menuAction()
    {
        //$arUsuario = new \Soga\SeguridadBundle\Entity\User();
        //$arUsuario = $this->get('security.context')->getToken()->getUser();
        //$strUsuario = $arUsuario->getNombreCorto();
        return $this->render('SogaFrontEndBundle:plantillas:menu.html.twig', array('Usuario' => "JG Efectivos"));
    }     
}
