<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\SystemeJeuBundle\Entity\Taille;
use IfRPGMaker\SystemeJeuBundle\Form\TailleType;

/**
 * Taille controller.
 *
 */
class TailleController extends Controller
{
    /**
     * Lists all Taille entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SystemeJeuBundle:Taille')->findAll();

        return $this->render('SystemeJeuBundle:Taille:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Taille entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Taille')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Taille entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Taille:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Taille entity.
     *
     */
    public function newAction()
    {
        $entity = new Taille();
        $form   = $this->createForm(new TailleType(), $entity);

        return $this->render('SystemeJeuBundle:Taille:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Taille entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Taille();
        $form = $this->createForm(new TailleType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('taille_show', array('id' => $entity->getId())));
        }

        return $this->render('SystemeJeuBundle:Taille:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Taille entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Taille')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Taille entity.');
        }

        $editForm = $this->createForm(new TailleType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Taille:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Taille entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Taille')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Taille entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TailleType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('taille_edit', array('id' => $id)));
        }

        return $this->render('SystemeJeuBundle:Taille:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Taille entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SystemeJeuBundle:Taille')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Taille entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('taille'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
