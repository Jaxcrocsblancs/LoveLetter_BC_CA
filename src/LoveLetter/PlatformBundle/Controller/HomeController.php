<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace LoveLetter\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function AccueilAction()
    {
        return $this->render('LoveLetterPlatformBundle:Advert:accueil.html.twig');
    }
    
    public function indexAction()
     {
        $user = new test();


        $entityManager->remove($user);
        return $this->render('LoveLetterPlatformBundle:Advert:index.html.twig');
    }
}
//LoveLetterPlatformBundle:Advert:index