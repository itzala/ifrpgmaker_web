<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\HistoireBundle\Entity\Intro;
use IfRPGMaker\HistoireBundle\Form\IntroType;

/**
 * Intro controller.
 *
 */
class IntroController extends Controller
{
    
    public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('HistoireBundle:Intro');
    }
    
    
    public function setFlash($titre, $message) {
        $this->get('session')->setFlash(
                $titre,
                $message
                );
    }
    
    /**
     * Lists all Intro entities.
     *
     */
    public function indexAction()
    {
        $res = $this->getRepository()->findAll();

        return $this->render('HistoireBundle:Intro:index.html.twig', array(
            'entities' => $res['entities'],
            'sql' => $res['sql'],
        ));
    }

    /**
     * Finds and displays a Intro entity.
     *
     */
    public function showAction($id)
    {
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];    
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Intro:show.html.twig', array(
            'entity'      => $entity,    
            'sql'         => $res['sql'],
            'delete_form' => $deleteForm->createView(),
            ));
    }

    /**
     * Displays a form to create a new Intro entity.
     *
     */
    public function newAction()
    {
        $entity = new Intro();
        $form   = $this->createForm(new IntroType(), $entity);

        return $this->render('HistoireBundle:Intro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Intro entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Intro();
        $form = $this->createForm(new IntroType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $rep = $this->getRepository();
            $sql = $rep->insert($entity);
            
            $message = 'La requête exécutée est la suivante : <br/>'.$sql;
            $this->setFlash("sql", $message);

            $message = var_dump($entity->getArrayIds());
            //$this->setFlash("array-ids", $message);
            echo $message;
            return $this->redirect($this->generateUrl('intro'));
            //return $this->redirect($this->generateUrl('intro_show', $entity->getArrayIds()));
        }

        return $this->render('HistoireBundle:Intro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Intro entity.
     *
     */
    public function editAction($id)
    {
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intro entity.');
        }

        $editForm = $this->createForm(new IntroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Intro:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Intro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $rep = $this->getRepository();
        $res = $rep->find($id);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IntroType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $sql = $rep->update($entity);
            
            $this->setFlash("sql", $sql);

            return $this->redirect($this->generateUrl('intro_edit', $entity->getArrayIds()));
        }

        return $this->render('HistoireBundle:Intro:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Intro entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $res = $em->getRepository('HistoireBundle:Intro')->find($id);
            $entity = $res["entity"];

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Intro entity.');
            }

            $sql = $this->getRepository()->delete($entity);
            
             $this->setFlash("sql", $sql);
        }

        return $this->redirect($this->generateUrl('intro'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
