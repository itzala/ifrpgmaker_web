<?php

namespace IfRPGMaker\SystemeJeuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TypeObjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('partie_corps')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\SystemeJeuBundle\Entity\TypeObjet'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_systemejeubundle_typeobjettype';
    }
}
