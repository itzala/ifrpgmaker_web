<?php

namespace IfRPGMaker\HistoireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class ChoixType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("evenement", 'entity', array(
                'class' => 'HistoireBundle:Evenement',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c');
                    },
            ))
            ->add("parent")
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\HistoireBundle\Entity\Choix'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_histoirebundle_choixtype';
    }
}
