<?php

namespace IfRPGMaker\ActionsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\ActionsBundle\Entity\Actions;
use IfRPGMaker\ActionsBundle\Form\ActionsType;

/**
 * Actions controller.
 *
 */
class ActionsController extends Controller
{
    /**
     * Lists all Actions entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ActionsBundle:Actions')->findAll();

        return $this->render('ActionsBundle:Actions:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Actions entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:Actions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ActionsBundle:Actions:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Actions entity.
     *
     */
    public function newAction()
    {
        $entity = new Actions();
        $form   = $this->createForm(new ActionsType(), $entity);

        return $this->render('ActionsBundle:Actions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Actions entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Actions();
        $form = $this->createForm(new ActionsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actions_show', array('id' => $entity->getId())));
        }

        return $this->render('ActionsBundle:Actions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Actions entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:Actions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actions entity.');
        }

        $editForm = $this->createForm(new ActionsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ActionsBundle:Actions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Actions entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:Actions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ActionsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actions_edit', array('id' => $id)));
        }

        return $this->render('ActionsBundle:Actions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Actions entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ActionsBundle:Actions')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Actions entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('actions'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
