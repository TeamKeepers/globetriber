<?php

// src/Controller/SearchController.php
namespace App\Controller;

use App\Form\SearchBarType;
use App\Repository\SearchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class SearchController extends Controller
{
    /**
     * @Route("/search", name="search")  
     */
    public function searchPaxAndPlace(Request $request, SearchRepository $searchRepo) {
       
       $form = $this->createForm(SearchBarType::class);
       
       $form->handleRequest($request);
       
       $results = [];
         if ($form->isSubmitted() && $form->isValid()) {
           
            $results = $searchRepo->findByPax($form->getData());
            $results = $searchRepo->findByPlace($form->getData());
            
            // $this->json($results);
         }
    
         return $this->render('searchBar.html.twig', [
             'form' => $form->createView(),
             'results' => $results 
                 
             ]);
         
    }
    
}
