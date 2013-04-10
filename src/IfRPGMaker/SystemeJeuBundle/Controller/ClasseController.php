<?php

namespace IfRPGMaker\SystemeJeuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\SystemeJeuBundle\Entity\Classe;
use IfRPGMaker\SystemeJeuBundle\Form\ClasseType;

/**
 * Classe controller.
 *
 */
class ClasseController extends Controller
{
    /**
     * Lists all Classe entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SystemeJeuBundle:Classe')->findAll();

        return $this->render('SystemeJeuBundle:Classe:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Classe entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Classe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Classe:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Classe entity.
     *
     */
    public function newAction()
    {
        $entity = new Classe();
        $form   = $this->createForm(new ClasseType(), $entity);

        return $this->render('SystemeJeuBundle:Classe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Classe entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Classe();
        $form = $this->createForm(new ClasseType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('classe_show', array('id' => $entity->getId())));
        }

        return $this->render('SystemeJeuBundle:Classe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Classe entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Classe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classe entity.');
        }

        $editForm = $this->createForm(new ClasseType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Classe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Classe entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SystemeJeuBundle:Classe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ClasseType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('classe_edit', array('id' => $id)));
        }

        return $this->render('SystemeJeuBundle:Classe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Classe entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SystemeJeuBundle:Classe')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Classe entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('classe'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
