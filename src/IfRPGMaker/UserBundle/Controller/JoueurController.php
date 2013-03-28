<?php

namespace IfRPGMaker\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JoueurController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserBundle:Joueur:index.html.twig');
    }
}
