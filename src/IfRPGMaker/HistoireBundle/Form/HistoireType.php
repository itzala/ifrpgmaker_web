<?php

namespace IfRPGMaker\HistoireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HistoireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('date_creation')
            ->add('date_modification')
            ->add('auteur')
            ->add('description')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\HistoireBundle\Entity\Histoire'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_histoirebundle_histoiretype';
    }
}
