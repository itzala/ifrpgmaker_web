<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HistoireController extends Controller
{
    public function indexAction()
    {
        return $this->render('HistoireBundle:Histoire:index.html.twig');
    }
}
