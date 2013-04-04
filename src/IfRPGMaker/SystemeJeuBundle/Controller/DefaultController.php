<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SystemeJeuBundle:Default:index.html.twig', array('name' => $name));
    }
}
