<?php

namespace IfRPGMaker\DialoguesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\DialoguesBundle\Entity\Dialogues;
use IfRPGMaker\DialoguesBundle\Form\DialoguesType;

/**
 * Dialogues controller.
 *
 */
class DialoguesController extends Controller
{
    /**
     * Lists all Dialogues entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DialoguesBundle:Dialogues')->findAll();

        return $this->render('DialoguesBundle:Dialogues:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Dialogues entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DialoguesBundle:Dialogues')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dialogues entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DialoguesBundle:Dialogues:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Dialogues entity.
     *
     */
    public function newAction()
    {
        $entity = new Dialogues();
        $form   = $this->createForm(new DialoguesType(), $entity);

        return $this->render('DialoguesBundle:Dialogues:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Dialogues entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Dialogues();
        $form = $this->createForm(new DialoguesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dialogues_show', array('id' => $entity->getId())));
        }

        return $this->render('DialoguesBundle:Dialogues:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Dialogues entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DialoguesBundle:Dialogues')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dialogues entity.');
        }

        $editForm = $this->createForm(new DialoguesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DialoguesBundle:Dialogues:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Dialogues entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DialoguesBundle:Dialogues')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dialogues entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DialoguesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dialogues_edit', array('id' => $id)));
        }

        return $this->render('DialoguesBundle:Dialogues:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Dialogues entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DialoguesBundle:Dialogues')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Dialogues entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dialogues'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
