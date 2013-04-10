<?php

namespace IfRPGMaker\PersonnageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('race')
            ->add('metier')
            ->add('classe')
            ->add('joueur')
            ->add('taille')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\PersonnageBundle\Entity\Personnage'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_personnagebundle_personnagetype';
    }
}
