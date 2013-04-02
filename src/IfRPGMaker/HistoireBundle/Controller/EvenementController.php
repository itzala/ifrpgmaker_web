<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HistoireBundle\Form\EvenementHandler;
use HistoireBundle\Form\EvenementType;
use HistoireBundle\Entity\Evenement;

/**
 * Description controller.
 *
 */
class EvenementController extends Controller
{
        public function indexAction()
        {
            return $this->render("HistoireBundle:Evenement:index.html.twig");
        }
        
        public function showAction(\IfRPGMaker\HistoireBundle\Entity\Evenement $event)
        {
            return $this->render("HistoireBundle:Evenement:show.html.twig");
        }
        
        public function newAction()
        {
            $entity = new \IfRPGMaker\HistoireBundle\Entity\Evenement;
            
            $form = $this->createForm(new \IfRPGMaker\HistoireBundle\Form\EvenementType(), $entity);
            
            return $this->render("HistoireBundle:Evenement:new.html.twig", array(
                'entity' => $entity,
                'form' => $form->createView(),
            ));
        }
        
        public function editAction($event)
        {
            $editForm = $this->createForm(new \IfRPGMaker\HistoireBundle\Form\EvenementType(), $event);
            
            return $this->render("HistoireBundle:Evenement:edit.html.twig", array(
                'entity' => $event,
                'editForm' => $editForm,
            ));
        }
                
        /*public function deleteAction($id_event)
        {
            
        }
        
        public function saveAction()
        {
            
        }*/
}
?>
