<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HistoireBundle\Form\ChoixHandler;
use HistoireBundle\Form\ChoixType;
use HistoireBundle\Entity\Choix;

/**
 * Description controller.
 *
 */
class ChoixController extends Controller
{
        public function indexAction()
        {
            return $this->render("HistoireBundle:Choix:index.html.twig");
        }
        
        public function showAction($id)
        {
            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository("HistoireBundle:Choix");
            
            return $this->render("HistoireBundle:Choix:show.html.twig");                
        }
        
        public function newAction()
        {
            return $this->render("HistoireBundle:Choix:new.html.twig");
        }
        
        public function editAction(Choix $choix)
        {
            return $this->render("HistoireBundle:Choix:edit.html.twig");
        }
                
        /*public function deleteAction($id_choix)
        {
            
        }
        
        public function saveAction()
        {
            
        }*/
}
?>
