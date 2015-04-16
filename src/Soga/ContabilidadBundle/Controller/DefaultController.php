<?php

namespace Soga\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SogaContabilidadBundle:Default:index.html.twig', array('name' => $name));
    }
}
