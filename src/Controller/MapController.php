<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Form\MySearchType;
use App\Repository\PlaceRepository;
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
       * @Route("/map",)  
     */
    public function searchPlace(Request $request, PlaceRepository $placeRepo) {
       
       $form = $this->createForm(MySearchType::class);
       
       $form->handleRequest($request);
       
       $results = [];
         if ($form->isSubmitted() && $form->isValid()) {
           
            $results = $placeRepo->findByTypes($form->getData());
             
               
             // pas de redirection à mon avis. tu souhaites peut-être plutôt renvoyer tes résultats en Json ou dans un template twig
            
            // $this->json($results);
         }
    
         return $this->render('map.html.twig', [
             'form' => $form->createView(),
             'results' => $results 
                 
             ]);
         
    }
    
}
