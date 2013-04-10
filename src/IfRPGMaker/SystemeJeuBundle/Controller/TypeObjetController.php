<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\SystemeJeuBundle\Entity\TypeObjet;
use IfRPGMaker\SystemeJeuBundle\Form\TypeObjetType;

/**
 * TypeObjet controller.
 *
 */
class TypeObjetController extends Controller
{
    /**
     * Lists all TypeObjet entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SystemeJeuBundle:TypeObjet')->findAll();

        return $this->render('SystemeJeuBundle:TypeObjet:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a TypeObjet entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:TypeObjet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeObjet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:TypeObjet:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new TypeObjet entity.
     *
     */
    public function newAction()
    {
        $entity = new TypeObjet();
        $form   = $this->createForm(new TypeObjetType(), $entity);

        return $this->render('SystemeJeuBundle:TypeObjet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new TypeObjet entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new TypeObjet();
        $form = $this->createForm(new TypeObjetType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typeobjet_show', array('id' => $entity->getId())));
        }

        return $this->render('SystemeJeuBundle:TypeObjet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypeObjet entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:TypeObjet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeObjet entity.');
        }

        $editForm = $this->createForm(new TypeObjetType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:TypeObjet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TypeObjet entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:TypeObjet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeObjet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TypeObjetType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typeobjet_edit', array('id' => $id)));
        }

        return $this->render('SystemeJeuBundle:TypeObjet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TypeObjet entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SystemeJeuBundle:TypeObjet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypeObjet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typeobjet'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
