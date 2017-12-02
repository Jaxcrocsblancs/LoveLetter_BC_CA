<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace LoveLetter\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use LoveLetter\PlatformBundle\Entity\Carte;
class AdvertController extends Controller
{
    public function AccueilAction($id, Request $request)
    {
// Création de l'entité
      
        

        return $this->render('LoveLetterPlatformBundle:Advert:accueil.html.twig', array(
          'id'  => $id,
        ));
    }
    
     public function indexAction()
     {
        $user = new test();


        $entityManager->remove($user);
        return $this->render('LoveLetterPlatformBundle:Advert:index.html.twig');
    }
}
//LoveLetterPlatformBundle:Advert:index