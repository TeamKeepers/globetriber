<?php

namespace App\Controller;

use App\Entity\User;
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
    public function showMyProfile()
    {
        return $this->render('profile.html.twig');
    }
    
    /**
     * @Route("/profile/{id}", name="profile_list")
     */
    public function showProfile($id){
        $profile = $this->getDoctrine()->getRepository(User::class)->find($id);
    }
    
}
