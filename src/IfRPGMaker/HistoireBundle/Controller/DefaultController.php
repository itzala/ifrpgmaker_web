<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HistoireBundle:Default:index.html.twig', array('name' => $name));
    }
}
