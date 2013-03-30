<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\HistoireBundle\Entity\Intro;
use IfRPGMaker\HistoireBundle\Form\IntroType;

/**
 * Intro controller.
 *
 */
class IntroController extends Controller
{
    /**
     * Lists all Intro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HistoireBundle:Intro')->findAll();

        return $this->render('HistoireBundle:Intro:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Intro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Intro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Intro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Intro entity.
     *
     */
    public function newAction()
    {
        $entity = new Intro();
        $form   = $this->createForm(new IntroType(), $entity);

        return $this->render('HistoireBundle:Intro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Intro entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Intro();
        $form = $this->createForm(new IntroType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('intro_show', array('id' => $entity->getId())));
        }

        return $this->render('HistoireBundle:Intro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Intro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Intro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intro entity.');
        }

        $editForm = $this->createForm(new IntroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Intro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Intro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Intro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IntroType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('intro_edit', array('id' => $id)));
        }

        return $this->render('HistoireBundle:Intro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Intro entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistoireBundle:Intro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Intro entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('intro'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
