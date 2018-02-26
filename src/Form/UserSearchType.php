<?php



namespace App\Form;

use App\Form\MySearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Description of UserSearchType
 *
 * @author Laeti
 */
class UserSearchType extends MySearchType
{
     public function buildForm(FormBuilderInterface $builder, array $choices) {
      
        parent::buildForm($builder, $choices);
        $builder
                ->add('town', TextType::class, [
                    'label' => 'Ville',
                    'required' => false
                ])
         ->add('rechercher', SubmitType::class);
              
           $criteria = ['title', 'address', 'image','capacity','other','description','add', 'accessibility', 'outlet', 'kitchen', 'parking', 'desk','airConditioning','washingMachine', 'computer', 'printer', 'privateDesk', 'scanner', 'projector', 'napStation', 'whiteBoard', 'terrace', 'types', 'bed', 'internet','freeDrink','freeSnack']; 
        
            foreach ($criteria as $criterium){
           $builder->remove($criterium);
            }

    }

    public function configureOptions(OptionsResolver $resolver) {
//        $resolver->setDefaults([
//            'data_class' => Place::class,
//        ]);
    }

}


