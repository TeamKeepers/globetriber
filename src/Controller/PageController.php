<?php

namespace App\Controller;

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
     * @param Request $request
     * 
     */
   /*
     public function index($request)
    {

    $request->attributes->set( 'controller', 'AppBundle:SearchPlace:_findByTypes');
    
    $response = $this->forward('App\Controller\MapController::searchPlace', array(
        'request'  => $request,
    ));

    // ... further modify the response or return it directly

    return $response;
}*/

    
    
    
}
