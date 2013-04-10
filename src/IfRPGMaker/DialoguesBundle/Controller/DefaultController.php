<?php

namespace IfRPGMaker\DialoguesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DialoguesBundle:Default:index.html.twig', array('name' => $name));
    }
}
