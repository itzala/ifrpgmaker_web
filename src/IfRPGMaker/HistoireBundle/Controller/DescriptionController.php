<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\HistoireBundle\Entity\Description;
use IfRPGMaker\HistoireBundle\Form\DescriptionType;

/**
 * Description controller.
 *
 */
class DescriptionController extends Controller
{
    /**
     * Lists all Description entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HistoireBundle:Description')->findAll();

        return $this->render('HistoireBundle:Description:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Description entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Description')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Description entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Description:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Description entity.
     *
     */
    public function newAction()
    {
        $entity = new Description();
        $form   = $this->createForm(new DescriptionType(), $entity);

        return $this->render('HistoireBundle:Description:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Description entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Description();
        $form = $this->createForm(new DescriptionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('description_show', array('id' => $entity->getId())));
        }

        return $this->render('HistoireBundle:Description:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Description entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Description')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Description entity.');
        }

        $editForm = $this->createForm(new DescriptionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Description:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Description entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Description')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Description entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DescriptionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('description_edit', array('id' => $id)));
        }

        return $this->render('HistoireBundle:Description:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Description entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistoireBundle:Description')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Description entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('description'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
