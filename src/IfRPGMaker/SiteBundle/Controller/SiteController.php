<?php

namespace IfRPGMaker\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('SiteBundle:Site:index.html.twig');
    }
}
