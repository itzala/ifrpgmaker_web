<?php

namespace IfRPGMaker\ActionsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ActionsBundle:Default:index.html.twig', array('name' => $name));
    }
}
