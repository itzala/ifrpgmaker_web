<?php

namespace IfRPGMaker\DialoguesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IfRPGMaker\DialoguesBundle\Entity\Dialogues;
use IfRPGMaker\DialoguesBundle\Form\DialoguesType;

/**
 * Dialogues controller.
 *
 */
class DialoguesController extends Controller
{
    
    public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('DialoguesBundle:Dialogues');
    }
    
    
    public function setFlash($titre, $message) {
        $this->get('session')->setFlash(
                $titre,
                $message
                );
    }
    
    /**
     * Lists all Dialogues entities.
     *
     */
    public function indexAction()
    {
        $res = $this->getRepository()->myfindAll();

        return $this->render('DialoguesBundle:Dialogues:index.html.twig', array(
            'entities' => $res['entities'],
            'sql' => $res['sql'],
        ));
    }

    /**
     * Finds and displays a Dialogues entity.
     *
     */
    public function showAction($auteur, $perso, $description)
    {
        $res = $this->getRepository()->myfind($auteur, $perso, $description);
        $entity = $res["entity"];    
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dialogues entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DialoguesBundle:Dialogues:show.html.twig', array(
            'entity'      => $entity,    
            'sql'         => $res['sql'],
            'delete_form' => $deleteForm->createView(),
            ));
    }

    /**
     * Displays a form to create a new Dialogues entity.
     *
     */
    public function newAction()
    {
        $entity = new Dialogues();
        $form   = $this->createForm(new DialoguesType(), $entity);

        return $this->render('DialoguesBundle:Dialogues:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Dialogues entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Dialogues();
        $form = $this->createForm(new DialoguesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $rep = $this->getRepository();
            $res = $rep->insert($entity);
            $sql = $res['sql'];
            
            $message = 'La requête exécutée est la suivante : <br/>'.$sql;
            $this->setFlash("sql", $message);

            
            
            return $this->redirect($this->generateUrl('Dialogues_show', array('id' => $res['id'])));
        }

        return $this->render('DialoguesBundle:Dialogues:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Dialogues entity.
     *
     */
    public function editAction($auteur, $perso, $description)
    {
        $res = $this->getRepository()->myfind($auteur, $perso, $description);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dialogues entity.');
        }

        $editForm = $this->createForm(new DialoguesType(), $entity);
        $deleteForm = $this->createDeleteForm($auteur, $perso, $description);

        return $this->render('DialoguesBundle:Dialogues:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Dialogues entity.
     *
     */
    public function updateAction(Request $request, $auteur, $perso, $description)
    {
        $rep = $this->getRepository();
        $res = $rep->myfind($auteur, $perso, $description);
        $entity = $res["entity"];

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dialogues entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DialoguesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $sql = $rep->update($entity);
            
            $this->setFlash("sql", $sql);

            return $this->redirect($this->generateUrl('Dialogues_edit', $entity->getArrayIds()));
        }

        return $this->render('DialoguesBundle:Dialogues:edit.html.twig', array(
            'entity'      => $entity,
            'sql'         => $res['sql'],
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Dialogues entity.
     *
     */
    public function deleteAction(Request $request, $auteur, $perso, $description)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $res = $em->getRepository('DialoguesBundle:Dialogues')->myfind($auteur, $perso, $description);
            $entity = $res["entity"];

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Dialogues entity.');
            }

            $sql = $this->getRepository()->delete($entity);
            
             $this->setFlash("sql", $sql);
        }

        return $this->redirect($this->generateUrl('Dialogues'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $auteur, $perso, $description))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
