<?php

namespace IfRPGMaker\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\UserBundle\Entity\Joueur;
use IfRPGMaker\UserBundle\Form\JoueurType;

/**
 * Joueur controller.
 *
 */
class JoueurController extends Controller
{
    
    public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('UserBundle:Joueur');
    }
    
    
    public function setFlash($titre, $message) {
        $this->get('session')->setFlash(
                $titre,
                $message
                );
    }
    
    /**
     * Lists all Joueur entities.
     *
     */
    public function indexAction()
    {
        $res = $this->getRepository()->findAll();

        return $this->render('UserBundle:Joueur:index.html.twig', array(
            'entities' => $res['entities'],
            'sql' => $res['sql'],
        ));
    }

    /**
     * Finds and displays a Joueur entity.
     *
     */
    public function showAction($id)
    {
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];    
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Joueur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:Joueur:show.html.twig', array(
            'entity'      => $entity,    
            'sql'         => $res['sql'],
            'delete_form' => $deleteForm->createView(),
            ));
    }

    /**
     * Displays a form to create a new Joueur entity.
     *
     */
    public function newAction()
    {
        $entity = new Joueur();
        $form   = $this->createForm(new JoueurType(), $entity);

        return $this->render('UserBundle:Joueur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Joueur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Joueur();
        $form = $this->createForm(new JoueurType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $rep = $this->getRepository();
            $res = $rep->insert($entity);
            $sql = $res['sql'];
            
            $message = 'La requête exécutée est la suivante : <br/>'.$sql;
            $this->setFlash("sql", $message);

            return $this->redirect($this->generateUrl('joueur_show', array('id' => $res['pseudo'])));
        }

        return $this->render('UserBundle:Joueur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Joueur entity.
     *
     */
    public function editAction($id)
    {
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Joueur entity.');
        }

        $editForm = $this->createForm(new JoueurType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:Joueur:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Joueur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $rep = $this->getRepository();
        $res = $rep->find($id);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Joueur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new JoueurType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $sql = $rep->update($entity);
            
            $this->setFlash("sql", $sql);

            return $this->redirect($this->generateUrl('joueur_edit', $entity->getArrayIds()));
        }

        return $this->render('UserBundle:Joueur:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Joueur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $res = $em->getRepository('UserBundle:Joueur')->find($id);
            $entity = $res["entity"];

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Joueur entity.');
            }

            $sql = $this->getRepository()->delete($entity);
            
             $this->setFlash("sql", $sql);
        }

        return $this->redirect($this->generateUrl('joueur'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
