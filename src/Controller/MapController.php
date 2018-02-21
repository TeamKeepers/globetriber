<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Form\SearchType;
use App\Repository\PlaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
    public function searchPlace(Request $request, PlaceRepository $PlaceRepo) {
        
       $em = $this->getDoctrine()->getManager();
       $form = $this->createForm(SearchType::class);
       
       $form->handleRequest($request);
       
         if ($form->isSubmitted() && $form->isValid()) {
             
            $results = $placeRepo->findUserQuery($form->getData());
             
             // pas de redirection à mon avis. tu souhaites peut-être plutôt renvoyer tes résultats en Json ou dans un template twig
            // $this->render('search.html.twig' ,[ 'results' => $results ])
            // $this->json($results);
         }
    
         return $this->render('map.html.twig', [
             'form' => $form->createView()
                 
             ]);
         
    }
    
    
}
