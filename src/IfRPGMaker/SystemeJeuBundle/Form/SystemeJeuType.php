<?php

namespace IfRPGMaker\SystemeJeuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class SystemeJeuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createur', 'entity', array(
                "class" => "UserBundle:Joueur",
                 'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('s');
                    },
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_systemejeubundle_systemejeutype';
    }
}
