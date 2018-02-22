<?php

namespace App\Form;

use App\Entity\Place;
use App\Form\PlaceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Description of EntityType
 *
 * @author Laeti
 */
class MySearchType extends PlaceType {
    

    public function buildForm(FormBuilderInterface $builder, array $choices) {
      
        parent::buildForm($builder, $choices);
        $builder
                ->add('town', TextType::class, [
                    'label' => 'Ville',
                    'required' => false
                ])
                ->add('Rechercher', SubmitType::class);
        
        $builder->remove('title');
        $builder->remove('address');
        $builder->remove('image');
        $builder->remove('capacity');
        $builder->remove('other');
        $builder->remove('description');
        $builder->remove('add');
    }

    public function configureOptions(OptionsResolver $resolver) {
//        $resolver->setDefaults([
//            'data_class' => Place::class,
//        ]);
    }

}
