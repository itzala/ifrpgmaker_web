<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\SystemeJeuBundle\Entity\PartieCorps;
use IfRPGMaker\SystemeJeuBundle\Form\PartieCorpsType;

/**
 * PartieCorps controller.
 *
 */
class PartieCorpsController extends Controller
{
    /**
     * Lists all PartieCorps entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SystemeJeuBundle:PartieCorps')->findAll();

        return $this->render('SystemeJeuBundle:PartieCorps:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a PartieCorps entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:PartieCorps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PartieCorps entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:PartieCorps:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new PartieCorps entity.
     *
     */
    public function newAction()
    {
        $entity = new PartieCorps();
        $form   = $this->createForm(new PartieCorpsType(), $entity);

        return $this->render('SystemeJeuBundle:PartieCorps:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new PartieCorps entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new PartieCorps();
        $form = $this->createForm(new PartieCorpsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('partiecorps_show', array('id' => $entity->getId())));
        }

        return $this->render('SystemeJeuBundle:PartieCorps:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PartieCorps entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:PartieCorps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PartieCorps entity.');
        }

        $editForm = $this->createForm(new PartieCorpsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:PartieCorps:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing PartieCorps entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:PartieCorps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PartieCorps entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PartieCorpsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('partiecorps_edit', array('id' => $id)));
        }

        return $this->render('SystemeJeuBundle:PartieCorps:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PartieCorps entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SystemeJeuBundle:PartieCorps')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PartieCorps entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('partiecorps'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
