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
class CaractPersoHistoireController extends Controller
{
    
    public function getRepository()
    {
        return $this->getDoctrine()->getManager()->getRepository("PersonnageBundle:CaractPersoHistoire");        
    }
    
    
    /**
     * Lists all Personnage entities.
     *
     */
    public function indexAction()
    {
        $entities = $this->getRepository()->findAll();        

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
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];        
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
            $repository = $em->getRepository("PersonnageBundle:Personnage");
            $repository->insert($entity);            

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
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];

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

        $res = $em->getRepository('PersonnageBundle:Personnage')->find($id);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personnage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PersonnageType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $repository = $em->getRepository("PersonnageBundle:Personnage");
            $repository->insert($entity);     

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
            $repository = $this->getRepository();
            $res = $repository->find($id);            
            $entity = $res["entity"];

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personnage entity.');
            }
            $repository->delete($entity);                   
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
