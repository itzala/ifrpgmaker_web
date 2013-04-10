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
    /**
     * Lists all Joueur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:Joueur')->findAll();

        return $this->render('UserBundle:Joueur:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Joueur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:Joueur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Joueur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:Joueur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
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
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('joueur_show', array('id' => $entity->getId())));
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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:Joueur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Joueur entity.');
        }

        $editForm = $this->createForm(new JoueurType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:Joueur:edit.html.twig', array(
            'entity'      => $entity,
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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:Joueur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Joueur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new JoueurType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('joueur_edit', array('id' => $id)));
        }

        return $this->render('UserBundle:Joueur:edit.html.twig', array(
            'entity'      => $entity,
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
            $entity = $em->getRepository('UserBundle:Joueur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Joueur entity.');
            }

            $em->remove($entity);
            $em->flush();
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
