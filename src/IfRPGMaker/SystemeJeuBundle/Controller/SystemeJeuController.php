<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu;
use IfRPGMaker\SystemeJeuBundle\Form\SystemeJeuType;

/**
 * SystemeJeu controller.
 *
 */
class SystemeJeuController extends Controller
{
    
    public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('SystemeJeuBundle:SystemeJeu');
    }
    
    
    public function setFlash($titre, $message) {
        $this->get('session')->setFlash(
                $titre,
                $message
                );
    }
    
    /**
     * Lists all SystemeJeu entities.
     *
     */
    public function indexAction()
    {
        $res = $this->getRepository()->findAll();

        return $this->render('SystemeJeuBundle:SystemeJeu:index.html.twig', array(
            'entities' => $res['entities'],
            'sql' => $res['sql'],
        ));
    }

    /**
     * Finds and displays a SystemeJeu entity.
     *
     */
    public function showAction($id)
    {
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];    
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SystemeJeu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:SystemeJeu:show.html.twig', array(
            'entity'      => $entity,    
            'sql'         => $res['sql'],
            'delete_form' => $deleteForm->createView(),
            ));
    }

    /**
     * Displays a form to create a new SystemeJeu entity.
     *
     */
    public function newAction()
    {
        $entity = new SystemeJeu();
        $form   = $this->createForm(new SystemeJeuType(), $entity);

        return $this->render('SystemeJeuBundle:SystemeJeu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new SystemeJeu entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new SystemeJeu();
        $form = $this->createForm(new SystemeJeuType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $rep = $this->getRepository();
            $res = $rep->insert($entity);
            $sql = $res['sql'];
            
            $message = 'La requête exécutée est la suivante : <br/>'.$sql;
            $this->setFlash("sql", $message);

            
            
            return $this->redirect($this->generateUrl('intro_show', array('id' => $res['id'])));
        }

        return $this->render('SystemeJeuBundle:SystemeJeu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SystemeJeu entity.
     *
     */
    public function editAction($id)
    {
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SystemeJeu entity.');
        }

        $editForm = $this->createForm(new SystemeJeuType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:SystemeJeu:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing SystemeJeu entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $rep = $this->getRepository();
        $res = $rep->find($id);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SystemeJeu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SystemeJeuType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $sql = $rep->update($entity);
            
            $this->setFlash("sql", $sql);

            return $this->redirect($this->generateUrl('intro_edit', $entity->getArrayIds()));
        }

        return $this->render('SystemeJeuBundle:SystemeJeu:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SystemeJeu entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $res = $em->getRepository('SystemeJeuBundle:SystemeJeu')->find($id);
            $entity = $res["entity"];

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SystemeJeu entity.');
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
