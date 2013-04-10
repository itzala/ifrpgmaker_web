<?php

namespace IfRPGMaker\HistoireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\HistoireBundle\Entity\Scenario;
use IfRPGMaker\HistoireBundle\Form\ScenarioType;

/**
 * Scenario controller.
 *
 */
class ScenarioController extends Controller
{
    /**
     * Lists all Scenario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HistoireBundle:Scenario')->findAll();

        return $this->render('HistoireBundle:Scenario:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Scenario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Scenario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Scenario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Scenario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Scenario entity.
     *
     */
    public function newAction()
    {
        $entity = new Scenario();
        $form   = $this->createForm(new ScenarioType(), $entity);

        return $this->render('HistoireBundle:Scenario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Scenario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Scenario();
        $form = $this->createForm(new ScenarioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('scenario_show', array('id' => $entity->getId())));
        }

        return $this->render('HistoireBundle:Scenario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Scenario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Scenario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Scenario entity.');
        }

        $editForm = $this->createForm(new ScenarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HistoireBundle:Scenario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Scenario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HistoireBundle:Scenario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Scenario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ScenarioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('scenario_edit', array('id' => $id)));
        }

        return $this->render('HistoireBundle:Scenario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Scenario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HistoireBundle:Scenario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Scenario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('scenario'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
