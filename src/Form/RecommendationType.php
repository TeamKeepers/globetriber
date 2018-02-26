<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Description of RecommendationType
 *
 * @author Laeti
 */
class RecommendationType extends AbstractType {
     
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
           ->add('validation', CheckboxType::class, [
                    'label' => 'Ajouter à mes lieux',
                    'required' => false,
                ]);

    }   
     public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Recommendation::class,
        ]);
    }
}
