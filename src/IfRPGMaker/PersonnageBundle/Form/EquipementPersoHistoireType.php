<?php

namespace IfRPGMaker\PersonnageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EquipementPersoHistoireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objet')
            ->add('perso')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\PersonnageBundle\Entity\EquipementPersoHistoire'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_personnagebundle_equipementpersohistoiretype';
    }
}
