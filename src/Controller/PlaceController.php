<?php

namespace App\Controller;

use App\Entity\Place;
use App\Entity\Recommendation;
use App\Form\PlaceType;
use App\Service\Geocoder;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class PlaceController extends Controller {

    /**
     * @Route("/addplace", name="add_place")  
     */
    public function addPlace(ObjectManager $manager, Request $request, Geocoder $geocoder) {

        $place = new Place();

        $form = $this->createForm(PlaceType::class, $place)
                ->add('add', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Get place image
            $image = $place->getImage();
            $fileName = md5(uniqid()) . '.' . $image->guessExtension();
            // move_uploaded_file
            $image->move('uploads/place', $fileName);
            $place->setImage($fileName);


            // get address infos

            $infos = $geocoder->getAddressInfos($place->getAddress());

            $lat = $infos['lat'];
            $place->setLat($lat);

            $lng = $infos['lng'];
            $place->setLng($lng);

//            $town = $infos['town'];
//            $place->setTown($town);

            $postalCode = $infos['postal_code'];
            $place->setPostalCode($postalCode);

            $place->setTypes(implode('|', $place->getTypes()));


            // Enregistrement du produit

            $manager->persist($place);
            $manager->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render(
                        'add_place.html.twig', array(
                        'form' => $form->createView())
        );
        
    }
    // --------------------- Requete ajout like place from user 
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/product/{id}/recommendation/add", name="add_recommendation")  
     */
    
     public function addRecommendation(ObjectManager $manager, Place $place) {

        // ... todo check if reco already exists
         
        $recommendation = new Recommendation();

        $recommendation->setUser($this->getUser());
        
        $recommendation->setPlace($place);
        
        $manager->persist($recommendation);
        
        $res = $manager->flush();
        
        return $this->json(['id'=>$res]);
    }


}


