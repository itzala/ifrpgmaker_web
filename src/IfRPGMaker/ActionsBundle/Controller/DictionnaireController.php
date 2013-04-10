<?php

namespace IfRPGMaker\ActionsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\ActionsBundle\Entity\Dictionnaire;
use IfRPGMaker\ActionsBundle\Form\DictionnaireType;

/**
 * Dictionnaire controller.
 *
 */
class DictionnaireController extends Controller
{
    /**
     * Lists all Dictionnaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ActionsBundle:Dictionnaire')->findAll();

        return $this->render('ActionsBundle:Dictionnaire:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Dictionnaire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:Dictionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dictionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ActionsBundle:Dictionnaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Dictionnaire entity.
     *
     */
    public function newAction()
    {
        $entity = new Dictionnaire();
        $form   = $this->createForm(new DictionnaireType(), $entity);

        return $this->render('ActionsBundle:Dictionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Dictionnaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Dictionnaire();
        $form = $this->createForm(new DictionnaireType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dictionnaire_show', array('id' => $entity->getId())));
        }

        return $this->render('ActionsBundle:Dictionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Dictionnaire entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:Dictionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dictionnaire entity.');
        }

        $editForm = $this->createForm(new DictionnaireType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ActionsBundle:Dictionnaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Dictionnaire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:Dictionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dictionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DictionnaireType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dictionnaire_edit', array('id' => $id)));
        }

        return $this->render('ActionsBundle:Dictionnaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Dictionnaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ActionsBundle:Dictionnaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Dictionnaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dictionnaire'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
