<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace LoveLetter\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LoveLetter\PlatformBundle\Entity\Carte;
use LoveLetter\PlatformBundle\Entity\CarteRepository;
use Symfony\Component\HttpFoundation\RedirectResponse; 
use Symfony\Component\HttpFoundation\Response;

class PartieController extends Controller
{
    public function DebutJeuAction($id)
    {
     $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Carte');
     
        $url = $repository->find(6);
        $url2= $repository->find(7);
        
     return $this->render('LoveLetterPlatformBundle:Jeu:plateauDeJeu.html.twig', array('id'=>$id, 'url' => $url->getUrl(), 'url2' => $url2->getUrl()));
    }
    
    public function RemplisageTableCarteAction(){
        $carte = new Carte;
        $carte->setNom("Garde");
        $carte->setNombre(1);
        $carte->setPouvoir("Nommez une carte non Garde et choisissez un joueur. Si ce joueur a la carte nommée, il est éliminer");
        $carte->setUrl("http://3.bp.blogspot.com/-lCe7lG6BVbw/VAN7i5VmL9I/AAAAAAAAAPA/rM020AgEhJM/s1600/garde2400.png");
       
        
        $carte1 = new Carte;
        $carte1->setNom("Pretre");
        $carte1->setNombre(2);
        $carte1->setPouvoir("Constulter la main d'un adversaire");
        $carte1->setUrl("http://4.bp.blogspot.com/-FXksdpb3jDU/VAN9gUrmIzI/AAAAAAAAAPM/3skFjA-OPsU/s1600/pretre2400.png");
        
        
        
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        
        // Étape 1 : On « persiste » l'entité
        $em->persist($carte);
        $em->persist($carte1);
        

        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();
       
        
        $url = $this->get('router')->generate('LoveLetter_platform_jeu');
        return $this->redirect($url);
    }
    
}
