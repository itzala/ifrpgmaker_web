<?php

namespace IfRPGMaker\ActionsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\ActionsBundle\Entity\Keywords;
use IfRPGMaker\ActionsBundle\Form\KeywordsType;

/**
 * Keywords controller.
 *
 */
class KeywordsController extends Controller
{
    /**
     * Lists all Keywords entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ActionsBundle:Keywords')->findAll();

        return $this->render('ActionsBundle:Keywords:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Keywords entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:Keywords')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Keywords entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ActionsBundle:Keywords:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Keywords entity.
     *
     */
    public function newAction()
    {
        $entity = new Keywords();
        $form   = $this->createForm(new KeywordsType(), $entity);

        return $this->render('ActionsBundle:Keywords:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Keywords entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Keywords();
        $form = $this->createForm(new KeywordsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('keywords_show', array('id' => $entity->getId())));
        }

        return $this->render('ActionsBundle:Keywords:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Keywords entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:Keywords')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Keywords entity.');
        }

        $editForm = $this->createForm(new KeywordsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ActionsBundle:Keywords:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Keywords entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ActionsBundle:Keywords')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Keywords entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new KeywordsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('keywords_edit', array('id' => $id)));
        }

        return $this->render('ActionsBundle:Keywords:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Keywords entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ActionsBundle:Keywords')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Keywords entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('keywords'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
