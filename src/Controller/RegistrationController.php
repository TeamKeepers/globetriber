<?php

// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            
            // 4) upload du fichier image
            $image = $user->getPhotoProfile();
            $fileName = md5(uniqid()).'.'.$image->guessExtension();
            // guessExtension pour déduire quel produit on lui envoit et ainsi éviter qu'on nous envoit du PHP
           // procédural: move_uploaded_file
            $image->move('uploads/photos_profile', $fileName);
            $user->setPhotoProfile($fileName);
            
            $user->setActivityStatus(false);
            $user->setRoles('ROLE_USER');
            

            // 5) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('profile.html.twig');
        }

        return $this->render(
            'register.html.twig',
            array('form' => $form->createView())
        );
    }
    
    /**
    * @Route("/login", name="login")
    */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();
        
        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
}
