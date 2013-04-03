<?php

namespace IfRPGMaker\PersoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PersoBundle:Default:index.html.twig', array('name' => $name));
    }
}
