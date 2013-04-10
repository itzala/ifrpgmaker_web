<?php

namespace IfRPGMaker\HistoireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ScenarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('histoire')
            ->add('debut')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\HistoireBundle\Entity\Scenario'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_histoirebundle_scenariotype';
    }
}
