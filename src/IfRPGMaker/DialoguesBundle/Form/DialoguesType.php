<?php

namespace IfRPGMaker\DialoguesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class ChoixType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("perso", 'entity', array(
                'class' => 'DialoguesBundle:perso',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c');
                    },
            ))
            ->add("description", 'entity', array(
                'class' => 'DialoguesBundle:Description',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c');
                    },
            ))
            ->add("dialogues", 'entity', array(
                'class' => 'DialoguesBundle:dialogues',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c');
                    },
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IfRPGMaker\DialoguesBundle\Entity\Dialogues'
        ));
    }

    public function getName()
    {
        return 'ifrpgmaker_Dialoguesbundle_choixtype';
    }
}
