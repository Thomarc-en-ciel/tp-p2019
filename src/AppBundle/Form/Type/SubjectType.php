<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Subject;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SubjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', textType::class,['label'=> 'Titre'])
            ->add('description', TextareaType::class,['label'=> 'Déscription','attr' => ['cols' => 40]]
        );
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->
            setDefaults(
                [
                    'data_class' => Subject::class,
                    'method' => 'POST',
                ]
        );
    }
}