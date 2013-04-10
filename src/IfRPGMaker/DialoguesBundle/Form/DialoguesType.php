<?php

namespace IfRPGMaker\DialoguesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DialoguesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dialogues')
            ->add('auteur')
            ->add('description')
            ->add('perso')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\DialoguesBundle\Entity\Dialogues'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_dialoguesbundle_dialoguestype';
    }
}
