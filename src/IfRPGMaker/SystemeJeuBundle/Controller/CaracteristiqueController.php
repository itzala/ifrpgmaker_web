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
    
    public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('SystemeJeuBundle:Caracteristique');
    }
    
    
    public function setFlash($titre, $message) {
        $this->get('session')->setFlash(
                $titre,
                $message
                );
    }
     
    /**
     * Lists all Caracteristique entities.
     *
     */
    public function indexAction()
    {
        $res = $this->getRepository()->findAll();

        return $this->render('SystemeJeuBundle:Caracteristique:index.html.twig', array(
            'entities' => $res['entities'],
            'sql' => $res['sql'],
        ));
    }

    /**
     * Finds and displays a Caracteristique entity.
     *
     */
    public function showAction($id)
    {
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];    
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Caracteristique:show.html.twig', array(
            'entity'      => $entity,    
            'sql'         => $res['sql'],
            'delete_form' => $deleteForm->createView(),
            ));
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
            $rep = $this->getRepository();
            $res = $rep->insert($entity);
            $sql = $res['sql'];
            
            $message = 'La requête exécutée est la suivante : <br/>'.$sql;
            $this->setFlash("sql", $message);
           
            return $this->redirect($this->generateUrl('caract_show', array('id' => $res['id'])));
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
        $res = $this->getRepository()->find($id);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristique entity.');
        }

        $editForm = $this->createForm(new CaracteristiqueType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SystemeJeuBundle:Caracteristique:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
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
        $rep = $this->getRepository();
        $res = $rep->find($id);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CaracteristiqueType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $sql = $rep->update($entity);
            
            $this->setFlash("sql", $sql);

            return $this->redirect($this->generateUrl('caract_edit', $entity->getArrayIds()));
        }

        return $this->render('SystemeJeuBundle:Caracteristique:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
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
            $res = $em->getRepository('SystemeJeuBundle:Caracteristique')->find($id);
            $entity = $res["entity"];

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caracteristique entity.');
            }

            $sql = $this->getRepository()->delete($entity);
            
             $this->setFlash("sql", $sql);
        }

        return $this->redirect($this->generateUrl('caract'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
