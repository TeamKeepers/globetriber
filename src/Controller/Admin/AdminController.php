<?php
namespace App\Controller\Admin;

use App\Entity\Recommendation;
use App\Entity\User;
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
     * @Route("/admin/comments", name="comments")
     */
    public function getCommentsByUser(User $user, RecommendationRepository $recommendationRepo)
    {
        $recommendations = $recommendationRepo->findCommentByUser($user);
        return $this->render('admin/comments.html.twig', [
            'user' => $user,
            'recommendation' => $recommendations
        ]);
    }
    
}
