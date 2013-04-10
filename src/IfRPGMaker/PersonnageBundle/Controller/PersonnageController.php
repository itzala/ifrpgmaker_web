<?php

namespace IfRPGMaker\PersonnageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\PersonnageBundle\Entity\Personnage;
use IfRPGMaker\PersonnageBundle\Form\PersonnageType;

/**
 * Personnage controller.
 *
 */
class PersonnageController extends Controller
{
    /**
     * Lists all Personnage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PersonnageBundle:Personnage')->findAll();

        return $this->render('PersonnageBundle:Personnage:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Personnage entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonnageBundle:Personnage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personnage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PersonnageBundle:Personnage:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Personnage entity.
     *
     */
    public function newAction()
    {
        $entity = new Personnage();
        $form   = $this->createForm(new PersonnageType(), $entity);

        return $this->render('PersonnageBundle:Personnage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Personnage entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Personnage();
        $form = $this->createForm(new PersonnageType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personnage_show', array('id' => $entity->getId())));
        }

        return $this->render('PersonnageBundle:Personnage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Personnage entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonnageBundle:Personnage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personnage entity.');
        }

        $editForm = $this->createForm(new PersonnageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PersonnageBundle:Personnage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Personnage entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PersonnageBundle:Personnage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personnage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PersonnageType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personnage_edit', array('id' => $id)));
        }

        return $this->render('PersonnageBundle:Personnage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Personnage entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PersonnageBundle:Personnage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personnage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personnage'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
