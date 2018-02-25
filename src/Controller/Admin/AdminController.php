<?php
namespace App\Controller\Admin;

use App\Entity\Place;
use App\Entity\User;
use App\Repository\PlaceRepository;
use App\Repository\RecommendationRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class AdminController extends Controller
{
    /**
     * @Route("/admin", name="homeadmin")
     */
    public function admin()
    {
        return $this->render('admin/homeadmin.html.twig', [
            'controller_name' => 'homeadmin',
        ]);
    }
    
    /**
     * @Route("/admin/user", name="list_user")
     */
    public function getList(UserRepository $userRepo)
    {
        $users = $userRepo->findAll();
        return $this->render('admin/list_user.html.twig', [
            'users' => $users
        ]);
    }
    
    /**
    *@Route("/admin/user/{id}", name="user_details")
    */
   public function details(User $user)
   {
       return $this->render('admin/details_user.html.twig', [
           'user'=> $user
       ]);
   }
   
   /**
    *
    * @Route("/admin/comments", name="comments")
    */
    public function getCommentList(RecommendationRepository $recommendationRepo)
    {
        $recommendation = $recommendationRepo->findAll();
        return $this->render('admin/comments.html.twig', [
            'recommendations' => $recommendation
        ]);
    }
    
        
    /**
     * 
     * @Route("admin/places", name="places")
     * 
     */
    public function getPlaceList(PlaceRepository $placeRepo)
    {
        $places = $placeRepo->findAll();
        return $this->render('admin/places.html.twig', [
            'places' => $places
        ]);
    }


    /**
     * 
     * @Route("admin/place/{id}", name="place_details")
     * 
     */
    public function PlaceDetails(Place $place)
    {
        return $this->render('admin/details_place.html.twig', [
            'place' => $place
        ]);
    }
   
// A développer plus tard - afficher tous les commentaires ainsi que leurs auteur et le lieu concerné  
//    /**
//    *
//    * @Route("/admin/comments", name="comments")
//    */
//    public function getCommentsByUser(User $user, UserRepository $userRepo, RecommendationRepository $recommendationRepo)
//    {
//        $recommendations = $recommendationRepo->findCommentByUser();
//        return $this->render('admin/comments.html.twig', [
//            'user' => $user,
//            'recommendation' => $recommendations
//        ]);
//    }
    
}
