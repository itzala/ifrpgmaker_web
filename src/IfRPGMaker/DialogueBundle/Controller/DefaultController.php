<?php

namespace IfRPGMaker\DialogueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DialogueBundle:Default:index.html.twig', array('name' => $name));
    }
}
