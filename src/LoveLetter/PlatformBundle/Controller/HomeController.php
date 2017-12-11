<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace LoveLetter\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use LoveLetter\PlatformBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function AccueilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repositoryPartie = $em->getRepository('LoveLetterPlatformBundle:Partie');
        $ListePartie = $repositoryPartie->findAll();
        return $this->render('LoveLetterPlatformBundle:Advert:accueil.html.twig', array(
            "ListePartie" => $ListePartie,  
        ));
        
    }

       
    public function ChercheMancheAction($id){

        $em = $this->getDoctrine()->getManager();
        $repositoryPartie = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $ListeManche = $repositoryPartie->findAll();
        foreach ($ListeManche as $manche){
            if($manche->getPartie()->getId() == $id){
                $url = $this->get('router')->generate('LoveLetter_platform_AffichageJeu', array(
                   'id_manche' => $manche->getId(),
                   ));
               return $this->redirect($url);
            }
        }
        return new Response ("FAIL");
    }
    
    public function CreationPartieAction(){
          return $this->render('LoveLetterPlatformBundle:Advert:choixNbJoueur.html.twig');
    }
    
    public function addAction(Request $request){
       
        $Utilisateur = new Utilisateur();
        $form = $this->createFormBuilder($Utilisateur)
                ->add('pseudo')
                ->add('mdp')
                ->getForm();
        $form->handleRequest($request);
        
         if ($form->isSubmitted() && $form->isValid()) {
            $utilisatueur = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisatueur);
            $em->flush();
            return new Response ("ca marche bg");
        }
        return $this->render('LoveLetterPlatformBundle:Advert:add.html.twig', array(
          'form' => $form->createView(),
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

