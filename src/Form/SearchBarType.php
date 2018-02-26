<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchBarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Recherche', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'pseudos' => 'username',
                    'lieux' => 'places'
                ],
                'attr' => [
                    'class' => 'h-25 d-inline-block mw-100'
                ]
            ])
            ->add('search', TextType::class, [
                'attr' => [
                    'placeholder' => 'Recherche ...'
                ]
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}