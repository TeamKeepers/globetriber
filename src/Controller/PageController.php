<?php

namespace App\Controller;

use App\Entity\Place;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
  
    /**
     * 
     * @Route("/profile", name="profile")
     * 
     */
    public function profile()
    {
        return $this->render('profile.html.twig');
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
}


 
