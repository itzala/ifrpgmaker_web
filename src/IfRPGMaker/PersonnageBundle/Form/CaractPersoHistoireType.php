<?php

namespace IfRPGMaker\PersonnageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CaractPersoHistoireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('valeur')
            ->add('carac')
            ->add('perso')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\PersonnageBundle\Entity\CaractPersoHistoire'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_personnagebundle_caractpersohistoiretype';
    }
}
