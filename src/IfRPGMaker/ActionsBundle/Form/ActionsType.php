<?php

namespace IfRPGMaker\ActionsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('action')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\ActionsBundle\Entity\Actions'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_actionsbundle_actionstype';
    }
}
