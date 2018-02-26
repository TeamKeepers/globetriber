<?php

// src/Controller/SearchController.php
namespace App\Controller;

use App\Form\SearchBarType;
use App\Repository\PlaceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class SearchController extends Controller
{
    /**
     * @Route("/search", name="search")
     */
    public function searchPaxAndPlace(Request $request, UserRepository $userRepo, PlaceRepository $placeRepo) {
       
       $form = $this->createForm(SearchBarType::class, [
           'attr' => ['class' => 'h-25 d-inline-block mw-100']
       ]);
       
       $form->handleRequest($request);
       
       $results = [];
       
        if ($form->isSubmitted() && $form->isValid()) {
           
            $data= $form->getData();
            
            if($data['Recherche'] == 'username') {
                $results = $userRepo->findByPax($data['search']);
            } else {
                $results = $placeRepo->findByPlace($data['search']);
            }
             
            return $this->render('search/searchResult.html.twig', [
                'results' => $results
            ]);
         }
    
         return $this->render('search/searchBar.html.twig', [
             'form' => $form->createView()
             ]);
         
    }
    
}
