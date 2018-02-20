<?php


namespace App\Controller;

use App\Entity\Product\Place;
use App\Form\PlaceType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PlaceController extends Controller
{
    /**
     * @Route("/addplace")
     */
    public function addProduct(ObjectManager $manager, Request $request)
    {
        $place = new Place();
        
        $form = $this->createForm(PlaceType::class, $place)
                ->add('add', SubmitType::class);
        
        $form->handleRequest($request);
        
         if ($form->isSubmitted() && $form->isValid()) {
            
            $image = $place->getImage();
            $fileName = md5(uniqid()) . '.' . $image->guessExtension();
            // move_uploaded_file
            $image->move('public/uploads/place', $fileName);
            $place->setImage($fileName);
            $place->setUser($this->getUser());

            // Enregistrement du produit
            $manager->persist($place);
            $manager->flush();
            return $this->redirectToRoute('');
        }

        return $this->render('add_place.html.twig', [
            'form' => $form->createView()
         
        ]);
    }
}
