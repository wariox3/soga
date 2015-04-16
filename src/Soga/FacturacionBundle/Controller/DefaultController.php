<?php

namespace Soga\FacturacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SogaFacturacionBundle:Default:index.html.twig', array('name' => $name));
    }
}
