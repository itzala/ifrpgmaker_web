<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\SystemeJeuBundle\Entity\Objet;
use IfRPGMaker\SystemeJeuBundle\Form\ObjetType;

/**
 * Objet controller.
 *
 */
class ObjetController extends Controller
{
    /**
     * Lists all Objet entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SystemeJeuBundle:Objet')->findAll();

        return $this->render('SystemeJeuBundle:Objet:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Objet entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Objet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Objet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Objet:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Objet entity.
     *
     */
    public function newAction()
    {
        $entity = new Objet();
        $form   = $this->createForm(new ObjetType(), $entity);

        return $this->render('SystemeJeuBundle:Objet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Objet entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Objet();
        $form = $this->createForm(new ObjetType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('objet_show', array('id' => $entity->getId())));
        }

        return $this->render('SystemeJeuBundle:Objet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Objet entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Objet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Objet entity.');
        }

        $editForm = $this->createForm(new ObjetType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Objet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Objet entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Objet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Objet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ObjetType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('objet_edit', array('id' => $id)));
        }

        return $this->render('SystemeJeuBundle:Objet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Objet entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SystemeJeuBundle:Objet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Objet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('objet'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
