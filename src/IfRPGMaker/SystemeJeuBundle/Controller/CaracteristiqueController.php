<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\SystemeJeuBundle\Entity\Caracteristique;
use IfRPGMaker\SystemeJeuBundle\Form\CaracteristiqueType;

/**
 * Caracteristique controller.
 *
 */
class CaracteristiqueController extends Controller
{
    /**
     * Lists all Caracteristique entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SystemeJeuBundle:Caracteristique')->findAll();

        return $this->render('SystemeJeuBundle:Caracteristique:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Caracteristique entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Caracteristique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Caracteristique:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Caracteristique entity.
     *
     */
    public function newAction()
    {
        $entity = new Caracteristique();
        $form   = $this->createForm(new CaracteristiqueType(), $entity);

        return $this->render('SystemeJeuBundle:Caracteristique:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Caracteristique entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Caracteristique();
        $form = $this->createForm(new CaracteristiqueType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caracteristique_show', array('id' => $entity->getId())));
        }

        return $this->render('SystemeJeuBundle:Caracteristique:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Caracteristique entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Caracteristique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristique entity.');
        }

        $editForm = $this->createForm(new CaracteristiqueType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Caracteristique:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Caracteristique entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Caracteristique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CaracteristiqueType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caracteristique_edit', array('id' => $id)));
        }

        return $this->render('SystemeJeuBundle:Caracteristique:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Caracteristique entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SystemeJeuBundle:Caracteristique')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caracteristique entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('caracteristique'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
