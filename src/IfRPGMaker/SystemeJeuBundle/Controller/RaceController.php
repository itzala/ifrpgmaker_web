<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\SystemeJeuBundle\Entity\Race;
use IfRPGMaker\SystemeJeuBundle\Form\RaceType;

/**
 * Race controller.
 *
 */
class RaceController extends Controller
{
    /**
     * Lists all Race entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SystemeJeuBundle:Race')->findAll();

        return $this->render('SystemeJeuBundle:Race:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Race entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Race')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Race entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Race:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Race entity.
     *
     */
    public function newAction()
    {
        $entity = new Race();
        $form   = $this->createForm(new RaceType(), $entity);

        return $this->render('SystemeJeuBundle:Race:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Race entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Race();
        $form = $this->createForm(new RaceType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('race_show', array('id' => $entity->getId())));
        }

        return $this->render('SystemeJeuBundle:Race:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Race entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Race')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Race entity.');
        }

        $editForm = $this->createForm(new RaceType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Race:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Race entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Race')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Race entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RaceType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('race_edit', array('id' => $id)));
        }

        return $this->render('SystemeJeuBundle:Race:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Race entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SystemeJeuBundle:Race')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Race entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('race'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
