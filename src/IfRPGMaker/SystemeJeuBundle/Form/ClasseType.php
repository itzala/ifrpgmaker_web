<?php

namespace IfRPGMaker\SystemeJeuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('systeme_jeu')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\SystemeJeuBundle\Entity\Classe'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_systemejeubundle_classetype';
    }
}
