<?php

namespace IfRPGMaker\SystemeJeuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MetierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule')
            ->add('systeme_jeu')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\SystemeJeuBundle\Entity\Metier'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_systemejeubundle_metiertype';
    }
}
