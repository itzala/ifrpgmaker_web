<?php

namespace IfRPGMaker\HistoireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("intro", 'entity', array(
                'class' => 'HistoireBundle:Intro',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c');
                    },
            ))
            ->add("description", 'entity', array(
                'class' => 'HistoireBundle:Description',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c');
                    },
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\HistoireBundle\Entity\Evenement'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_histoirebundle_evenementtype';
    }
}
