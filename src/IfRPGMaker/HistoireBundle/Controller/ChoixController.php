<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\HistoireBundle\Entity\Choix;
use IfRPGMaker\HistoireBundle\Form\ChoixType;

/**
 * Choix controller.
 *
 */
class ChoixController extends Controller
{
    /**
     * Lists all Choix entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HistoireBundle:Choix')->findAll();

        return $this->render('HistoireBundle:Choix:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Choix entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Choix')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Choix entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Choix:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Choix entity.
     *
     */
    public function newAction()
    {
        $entity = new Choix();
        $form   = $this->createForm(new ChoixType(), $entity);

        return $this->render('HistoireBundle:Choix:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Choix entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Choix();
        $form = $this->createForm(new ChoixType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('choix_show', array('id' => $entity->getId())));
        }

        return $this->render('HistoireBundle:Choix:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Choix entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Choix')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Choix entity.');
        }

        $editForm = $this->createForm(new ChoixType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Choix:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Choix entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Choix')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Choix entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ChoixType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('choix_edit', array('id' => $id)));
        }

        return $this->render('HistoireBundle:Choix:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Choix entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistoireBundle:Choix')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Choix entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('choix'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
