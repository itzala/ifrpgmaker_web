<?php

namespace IfRPGMaker\ActionsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class KeywordsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyword')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\ActionsBundle\Entity\Keywords'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_actionsbundle_keywordstype';
    }
}
