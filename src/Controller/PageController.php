<?php
namespace App\Controller;

use App\Entity\Place;
use App\Form\UserSearchType;
use App\Repository\RecommendationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    /**
     * 
     * @Route("/", name="home")
     * @Route("/home")
     * 
     */
    public function home()
    {
        /* Pour envoyer la création du form en modal */
        /* $form = $this->createForm(UserType::class, $user); */
        return $this->render('home.html.twig'); /* +, $form */
      
    }
  
//    /**
  //   * 
    // * @Route("/profile", name="profile")
    // * 
   //  */
   // public function profile()
  //  {
    //    return $this->render('profile.html.twig');
   // }
    //*/
  
     /**
     * 
     * @Route("/addplace", name="add_place")
     * 
     */
    public function addPlace()
    {
        return $this->render('add_place.html.twig');
    }

        /**
    *
    * @Route("product/{id}", name="product_details")
    *
    */
   public function getProductDetails(Place $place)
   {
       return $this->render('product_page.html.twig', [
           'place' => $place
       ]);
   }
   
    /**
     * @Route("/profile", name="profile")
     */
    public function UserSearch(Request $request, RecommendationRepository $recommendationRepo) {

        $form = $this->createForm(UserSearchType::class);

        $form->handleRequest($request);
        
        $results = [];

        if ($form->isSubmitted() && $form->isValid()) {

            $recommandations = $recommendationRepo->findByUser($form->getData(),$this->getUser());
            
            foreach ($recommandations as $reco) {
                $results[] = $reco->getPlace();
            }
        }

        return $this->render( 'profile.html.twig', [
                    'form' => $form->createView(),
                    'results' => $results,
           
        ]);
    }
    /**
     * 
     * @Route("/profile/{id}", name="profile_details")
     * 
     */
    public function profileUser()
    {
        return $this->render('profile.html.twig');
    }

}


 
