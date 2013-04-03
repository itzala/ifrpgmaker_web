<?php

namespace IfRPGMaker\ContraintesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ContraintesBundle:Default:index.html.twig', array('name' => $name));
    }
}
