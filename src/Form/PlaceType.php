<?php

namespace App\Form;

use App\Entity\Place;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaceType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $choices) {
        $builder
                ->add('title', TextType::class, [
                    'label' => 'Titre',
                    'required' => true
                ])
                ->add('description', TextareaType::class, [
                    'label' => 'Description',
                    'required' => true
                ])
                ->add('address', TextType::class, [
                    'label' => 'Adresse',
                    'required' => true
                ])
                
                ->add('country', CountryType::class, [
                    'label' => 'Pays',
                    'required' => false
                ])
                ->add('image', FileType::class, [
                    'label' => 'Photo du lieu'
                ])
                ->add('internet', ChoiceType::class, [
                    'choices' => [
                        'wifi' => 'wifi',
                        'ethernet' => 'ethernet',
                        'fibre' => 'fibre',
                        'adsl' => 'adsl',
                    ],
                    'required' => false
                ])
                ->add('accessibility', CheckboxType::class, [
                    'label' => 'Accéssibilité',
                    'required' => false,
                ])
                ->add('kitchen', CheckboxType::class, [
                    'label' => 'Cuisine',
                    'required' => false,
                ])
                ->add('parking', CheckboxType::class, [
                    'label' => 'Parking',
                    'required' => false,
                ])
                
                // ----------------Sleep type choice
                ->add('bed', ChoiceType::class, [
                    'choices' => [
                        '0' => '0',
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                        '8' => '8',
                        '9' => '9',
                        '10' => '10',
                        '11' => '11',
                        '12' => '12',
                    ]
                ])
                ->add('outlet', CheckboxType::class, [
                    'label' => 'Outlet',
                    'required' => false,
                ])
                ->add('other', TextareaType::class, [
                    'label' => 'Autres',
                    'required' => false,
                ])
                ->add('desk', CheckboxType::class, [
                    'label' => 'Bureau',
                    'required' => false,
                ])
                ->add('airConditioning', CheckboxType::class, [
                    'label' => 'Air conditionné',
                    'required' => false,
                ])
                ->add('washingMachine', CheckboxType::class, [
                    'label' => 'Machine à laver',
                    'required' => false,
                ])
                ->add('types', ChoiceType::class, [
                    'label' => 'Types',
                    'multiple' => true,
                    'expanded' => true,
                    'choices' => [
                        'Dormir ' => 'sleep',
                        'Travailler' => 'work',
                    ]
                ])


                // ------------ Work type choice
                
                ->add('capacity', TextareaType::class, [
                    'label' => 'Capacité',
                    'required' => false,
                ])
                ->add('privateDesk', CheckboxType::class, [
                    'label' => 'Salle de réunion',
                    'required' => false,
                ])
                ->add('computer', CheckboxType::class, [
                    'label' => 'Ordinateur',
                    'required' => false,
                ])
                ->add('printer', CheckboxType::class, [
                    'label' => 'Imprimante',
                    'required' => false,
                ])
                ->add('scanner', CheckboxType::class, [
                    'label' => 'Scanner',
                    'required' => false,
                ])
                ->add('projector', CheckboxType::class, [
                    'label' => 'Vidéoprojecteur',
                    'required' => false,
                ])
                ->add('napStation', CheckboxType::class, [
                    'label' => 'Salle de repos',
                    'required' => false,
                ])
                ->add('whiteBoard', CheckboxType::class, [
                    'label' => 'Tableau',
                    'required' => false,
                ])
                ->add('terrace', CheckboxType::class, [
                    'label' => 'Terasse / Jardin',
                    'required' => false,
                ])
                ->add('freeDrink', CheckboxType::class, [
                    'label' => 'Boissons à volonté',
                    'required' => false,
                ])
                ->add('freeSnack', CheckboxType::class, [
                    'label' => 'Snack à volonté',
                    'required' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Place::class,
        ]);
    }

}
