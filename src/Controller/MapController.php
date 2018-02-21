<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Form\SearchType;
use App\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Description of MapController
 *
 * @author Laeti
 */
class MapController extends Controller{
    
    /**
     * @Route("/map")
     */
  
    public function searchPlace(Request $request ) {
                 
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(SearchType::class);
       
        $form->handleRequest($request);
       
         if ($form->isSubmitted() && $form->isValid()) {
             
             $PlaceRepo = $em->getRepository($PlaceRepo)->findUserQuery();   
 
             return $this->redirectToRoute('/map');
         } 
    
         return $this->render('map.html.twig', [
             'form' => $form->createView()
                 
             ]);
         
    }
    
    
}
