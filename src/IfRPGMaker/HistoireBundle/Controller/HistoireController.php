<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\HistoireBundle\Entity\Histoire;
use IfRPGMaker\HistoireBundle\Form\HistoireType;

/**
 * Histoire controller.
 *
 */
class HistoireController extends Controller
{
    /**
     * Lists all Histoire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HistoireBundle:Histoire')->findAll();

        return $this->render('HistoireBundle:Histoire:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Histoire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Histoire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Histoire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Histoire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Histoire entity.
     *
     */
    public function newAction()
    {
        $entity = new Histoire();
        $form   = $this->createForm(new HistoireType(), $entity);

        return $this->render('HistoireBundle:Histoire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Histoire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Histoire();
        $form = $this->createForm(new HistoireType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('histoire_show', array('id' => $entity->getId())));
        }

        return $this->render('HistoireBundle:Histoire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Histoire entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Histoire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Histoire entity.');
        }

        $editForm = $this->createForm(new HistoireType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Histoire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Histoire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Histoire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Histoire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new HistoireType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('histoire_edit', array('id' => $id)));
        }

        return $this->render('HistoireBundle:Histoire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Histoire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistoireBundle:Histoire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Histoire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('histoire'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
