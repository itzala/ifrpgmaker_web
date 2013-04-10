<?php

namespace IfRPGMaker\PersonnageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PersonnageBundle:Default:index.html.twig', array('name' => $name));
    }
}
