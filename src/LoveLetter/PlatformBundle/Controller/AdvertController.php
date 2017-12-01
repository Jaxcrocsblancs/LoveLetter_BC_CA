<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace LoveLetter\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller
{
    public function AccueilAction($id, Request $request)
    {
        return $this->render('LoveLetterPlatformBundle:Advert:accueil.html.twig', array(
      'id'  => $id,
    ));
    }
    
     public function indexAction()
     {
     
        return $this->render('LoveLetterPlatformBundle:Advert:index.html.twig');
    }
}
//LoveLetterPlatformBundle:Advert:index