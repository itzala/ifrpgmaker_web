<?php

namespace IfRPGMaker\SystemeJeuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class CaracteristiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('id_systeme_jeu', 'entity', array(
                "class" => "SystemeJeuBundle:SystemeJeu",
                 'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('s');
                    },
                "label" => "Systeme de Jeu")
                 )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\SystemeJeuBundle\Entity\Caracteristique'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_systemejeubundle_caracteristiquetype';
    }
}
