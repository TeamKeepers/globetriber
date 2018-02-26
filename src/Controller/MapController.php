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


/**
 * Description of MapController
 * 
 * 
 */
class MapController extends Controller {

    /**
     * 
     */
    public function searchPlace(Request $request, PlaceRepository $placeRepo) {

        $form = $this->createForm(MySearchType::class);

        $form->handleRequest($request);
        
        $results = [];

        if ($form->isSubmitted() && $form->isValid()) {

            $results = $placeRepo->findByTypes($form->getData());
            
            // return $this->json($results);
        }

        return $this->render( 'map.html.twig', [
                    'form' => $form->createView(),
                    'results' => $results,
           
        ]);
    }

}
