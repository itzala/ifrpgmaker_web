<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\SystemeJeuBundle\Entity\Metier;
use IfRPGMaker\SystemeJeuBundle\Form\MetierType;

/**
 * Metier controller.
 *
 */
class MetierController extends Controller
{
    /**
     * Lists all Metier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SystemeJeuBundle:Metier')->findAll();

        return $this->render('SystemeJeuBundle:Metier:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Metier entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Metier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Metier:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Metier entity.
     *
     */
    public function newAction()
    {
        $entity = new Metier();
        $form   = $this->createForm(new MetierType(), $entity);

        return $this->render('SystemeJeuBundle:Metier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Metier entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Metier();
        $form = $this->createForm(new MetierType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('metier_show', array('id' => $entity->getId())));
        }

        return $this->render('SystemeJeuBundle:Metier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Metier entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Metier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metier entity.');
        }

        $editForm = $this->createForm(new MetierType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Metier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Metier entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Metier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MetierType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('metier_edit', array('id' => $id)));
        }

        return $this->render('SystemeJeuBundle:Metier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Metier entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SystemeJeuBundle:Metier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Metier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('metier'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
