<?php

namespace IfRPGMaker\HistoireBundle\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use IfRPGMaker\HistoireBundle\Entity\Choix;


class ChoixHandler
{
    private $form;
    private $request;
    private $em;

    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
    }

    public function process()
    {
        if( $this->request->getMethod() == 'POST' )
        {
            $this->form->bind($this->request);

            if( $this->form->isValid() )
            {
                $this->onSuccess($this->form->getData());
                return true;
            }
        }
        return false;
    }

    public function onSuccess(Choix $choix)
    {
        $this->em->persist($choix);
        $this->em->flush();
    }
}

?>
