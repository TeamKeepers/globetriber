<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    /**
     * 
     * @Route("/")
     * @Route("/home")
     * 
     */
    public function home() 
    {
        return $this->render('home.html.twig');
    }
    
    /**
     * 
     * @Route("/profile")
     * 
     */
    public function profile()
    {
        return $this->render('profile.html.twig');
    }
    
}
