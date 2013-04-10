<?php

namespace IfRPGMaker\ActionsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\ActionsBundle\Entity\ActiKey;
use IfRPGMaker\ActionsBundle\Form\ActiKeyType;

/**
 * ActiKey controller.
 *
 */
class ActiKeyController extends Controller
{
    /**
     * Lists all ActiKey entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ActionsBundle:ActiKey')->findAll();

        return $this->render('ActionsBundle:ActiKey:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a ActiKey entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:ActiKey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActiKey entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ActionsBundle:ActiKey:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new ActiKey entity.
     *
     */
    public function newAction()
    {
        $entity = new ActiKey();
        $form   = $this->createForm(new ActiKeyType(), $entity);

        return $this->render('ActionsBundle:ActiKey:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new ActiKey entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ActiKey();
        $form = $this->createForm(new ActiKeyType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actikey_show', array('id' => $entity->getId())));
        }

        return $this->render('ActionsBundle:ActiKey:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ActiKey entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:ActiKey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActiKey entity.');
        }

        $editForm = $this->createForm(new ActiKeyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ActionsBundle:ActiKey:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ActiKey entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:ActiKey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActiKey entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ActiKeyType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actikey_edit', array('id' => $id)));
        }

        return $this->render('ActionsBundle:ActiKey:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ActiKey entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ActionsBundle:ActiKey')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ActiKey entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('actikey'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
