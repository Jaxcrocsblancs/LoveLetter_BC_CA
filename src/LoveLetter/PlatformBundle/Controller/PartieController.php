<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace LoveLetter\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LoveLetter\PlatformBundle\Entity\Carte;
use LoveLetter\PlatformBundle\Entity\Partie;
use LoveLetter\PlatformBundle\Entity\Manche;
use LoveLetter\PlatformBundle\Entity\Utilisateur;
use LoveLetter\PlatformBundle\Entity\Joueur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; 

class PartieController extends Controller
{
  /*  public function UtilisateurCreerPartieAction()
    {      
        
        //Creation utilisateur pour test
        $joueur = new Joueur();
        $joueur->setPseudo("LOLO");
        $joueur->setMdp("mdp");
        
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        
        // Étape 1 : On « persiste » l'entité
        $em->persist($joueur);
        
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();
        
        $url = $this->get('router')->generate('LoveLetter_platform_CreationPartie', array(
            'nom' => "partieTest",
            'id_joueur' => $joueur->getId()));
        return $this->redirect($url);
    }*/
    
   /* public function UtilisateurRejoinsPartieAction(Request $id_partie)
    {
        //Creation utilisateur pour test
        $joueur = new Utilisateur();
        $joueur->setPseudo("LOLO");
        $joueur->setMdp("mdp");
       
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        
        // Étape 1 : On « persiste » l'entité
        $em->persist($joueur);
        
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();
        
        $idpartie = $id_partie->query->get('id_partie');
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Partie');
        $partie = $repository->find($idpartie);
        $partie->addUtilisateur($joueur);
        
        $url = $this->get('router')->generate('LoveLetter_platform_DebutManche', array(
            'nom' => "partieTest",
            'id_joueur' => $joueur->getId()));
        return $this->redirect($url);
    }*/
    
    public function CreationPartieAction($nom){
        //Creation de deux joueur pour tester
        //A supprimer quand les sessions utilisateur marcherons
        $joueur1 = new Joueur;
        $joueur2 = new Joueur;
        
        //Création d'une nouvelle partie
        $partie = new Partie;
        $partie->setNomPartie($nom);
        $partie->addjoueur($joueur1) ;
        $partie->addjoueur($joueur2) ;
        
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        
        // Étape 1 : On « persiste » l'entité
        $em->persist($joueur1);
        $em->persist($joueur2);
        $em->persist($partie);
        
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();

        //Redirection vers DebutManche pour créer la première manche
        $url = $this->get('router')->generate('LoveLetter_platform_DebutManche', array(
            'id_partie' => $partie->getId()));
        return $this->redirect($url);
    }
    
    public function DebutMancheAction(Request $id_partie){
         // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        $id_partiebis = $id_partie->query->get('id_partie');
        
        $repositoryPartie = $em->getRepository('LoveLetterPlatformBundle:Partie');
        $partie = $repositoryPartie->find($id_partiebis);
        
        //Création d'une nouvelle manche 
        $manche = new Manche;
        $manche->setPartie($partie);
        
        //Creation de la pioche
        $pioche = array(1,1,1,1,1,2,2,3,4,4,5,6,7,8);
        shuffle($pioche);
        array_shift($pioche);
        $manche->setPioche($pioche);

        // Étape 1 : On « persiste » l'entité
        $em->persist($manche);
        
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();
        
        //Redirection vers DebutJeuAction pour créer la première manche
        $url = $this->get('router')->generate('LoveLetter_platform_DistributionCarte', array(
            'id_manche' => $manche->getId()));
        return $this->redirect($url);
    }

    public function DistributionCarteAction(Request $id_manche){
       // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
       $partie = $mancheEnCour->getPartie();
       $ListeJoueur = $partie->getJoueur();
       $pioche = $mancheEnCour->getPioche();
     
        foreach ($ListeJoueur as $Joueur) {
            $Joueur->setCarteMain(array($pioche[0]));
            $em->persist($Joueur);
            array_shift($pioche);
        }

        $mancheEnCour->setPioche($pioche);
        $em->persist($mancheEnCour);
        
        $em->flush();
         // Étape 2 : On « flush » tout ce qui a été persisté avant
        $url = $this->get('router')->generate('LoveLetter_platform_TirerCarte', array(
            'id_manche' => $mancheEnCour->getId(),
            'nb_joueur' => 1));
        return $this->redirect($url);
    }
    
    public function AffichageJeuAction(Request $id_manche, Request $id_joueur){       
        $em = $this->getDoctrine()->getManager();
        //recuperation de l'id_manche
        $id_manchebis = $id_manche->query->get('id_manche');
        //recuperation de repository des manches
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');

        //recuperation de la class manche en cour
        $mancheEnCour = $repositoryManche->find($id_manchebis);
                   
        //recuperation de la liste des joueurs participant a la manche
        $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
        $nbJoueurJouant = $id_joueur->query->get('id_joueur');
        if($nbJoueurJouant == 1){
         $nbJoueurAdvers = $nbJoueurJouant+1;
        }
        else{
         $nbJoueurAdvers = $nbJoueurJouant-1;
        }

        $repositoryCarte = $em->getRepository('LoveLetterPlatformBundle:Carte');
        if(!empty($ListeJoueur[$nbJoueurJouant-1]->getCarteMain())){
            foreach($ListeJoueur[$nbJoueurJouant-1]->getCarteMain() as $int){
                $ListeCarteJ1[]= $repositoryCarte->find($int);
            }
        }
        else{
            $ListeCarteJ1 =array();
        }

        if(!empty($ListeJoueur[$nbJoueurJouant-1]->getCarteJouer())){
            foreach($ListeJoueur[$nbJoueurJouant-1]->getCarteJouer() as $int){
                $ListeCarteJouerJ1[]= $repositoryCarte->find($int);
            }
        }
        else{
            $ListeCarteJouerJ1 =array();
        }

        if(!empty($ListeJoueur[$nbJoueurAdvers-1]->getCarteMain())){      
            foreach($ListeJoueur[$nbJoueurAdvers-1]->getCarteMain() as $int){
                $ListeCarteJ2[]= $repositoryCarte->find($int);
            }
        }
        else{
            $ListeCarteJ2 = array();
        }
       
        if(!empty($ListeJoueur[$nbJoueurAdvers-1]->getCarteJouer())){
            foreach($ListeJoueur[$nbJoueurAdvers-1]->getCarteJouer() as $int){
                   $ListeCarteJouerJ2[]= $repositoryCarte->find($int);
            }
        }
        else{
            $ListeCarteJouerJ2 = array();
        }
        
        //envoi sur l'affichage du jeu
        return $this->render('LoveLetterPlatformBundle:Jeu:plateauDeJeu.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'liste_cartesJ1' => $ListeCarteJ1,
        'liste_cartesJ2' => $ListeCarteJ2,
        'liste_cartesJouerJ1' => $ListeCarteJouerJ1,
        'liste_cartesJouerJ2' => $ListeCarteJouerJ2,
        ));
    }
    
    public function TirerCarteAction(Request $id_manche, Request $nb_joueur){
        $em = $this->getDoctrine()->getManager();
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);
               
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');

        $pioche = $mancheEnCour->getPioche();
        $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
        
        $joueur = $ListeJoueur[$nbJoueurJouant-1];
        $carteMainJoueur = $joueur->getCarteMain();

        $newtab = array($carteMainJoueur[0], $pioche[0]);
        array_shift($pioche);
        $joueur->setCarteMain($newtab);
        $mancheEnCour->setPioche($pioche);
        $em->persist($mancheEnCour);
        $em->persist($joueur);
        $em->flush();        

        if($nbJoueurJouant == 1){
                $nbJoueurAdvers = $nbJoueurJouant+1;
            }
        else{
             $nbJoueurAdvers = $nbJoueurJouant-1;
        }

        //test comtesse
        $carteMain = $joueur->getCarteMain();
        if($carteMain[0] == 7){
            if($carteMain[1] == 6 || $carteMain[1] == 5){
                $carteJouer = $joueur->getCarteJouer();
                if(empty($carteJouer)){
                $carteJouer = array($carteMain[0]);
                    }
                else{
                    array_push($carteJouer, $carteMain[0]);
                }
                array_shift($carteMain);
                $joueur->setCarteMain($carteMain);
                $joueur->setCarteJouer($carteJouer);
                $em->persist($joueur);
                $em->flush();
                $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                    'id_manche' => $mancheEnCour->getId(),
                    'nb_joueur' => $nbJoueurJouant));
                return $this->redirect($url);
            }
        }
        elseif($carteMain[1] == 7){
            if($carteMain[0] == 6 || $carteMain[0] == 5){
                $carteJouer = $joueur->getCarteJouer();
                if(empty($carteJouer)){
                $carteJouer = array($carteMain[1]);
                }
                else{
                    array_push($carteJouer, $carteMain[1]);
                }
                $carteMain = array($carteMain[0]);
                $joueur->setCarteMain($carteMain);
                $joueur->setCarteJouer($carteJouer);
                $em->persist($joueur);
                $em->flush();
                $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                    'id_manche' => $mancheEnCour->getId(),
                    'nb_joueur' => $nbJoueurJouant));
                return $this->redirect($url);
            }
        }
       
        
        $url = $this->get('router')->generate('LoveLetter_platform_AffichageJeu', array(
            'id_manche' => $mancheEnCour->getId(),
            'id_joueur' => $nbJoueurJouant));
        return $this->redirect($url);
    }
    
    public function ChoixAction(Request $id_manche, Request $nb_joueur, Request $numCarteChoisi){
        $em = $this->getDoctrine()->getManager();
        
        $id_carteJouer = $numCarteChoisi->query->get('numCarteChoisi');

        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
        
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);

        $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
        $joueur = $ListeJoueur[$nbJoueurJouant-1];
        
        $carteMain= $joueur->getCarteMain();
        $carteJouer= $joueur->getCarteJouer();

        //Deplacer cette function pour ne pas l'utiliser avec toutes les cartes 
        //a verifier
        if($carteMain[0] == $id_carteJouer){
            if(empty($carteJouer)){
                $carteJouer = array($carteMain[0]);
            }
            else{
                array_push($carteJouer, $carteMain[0]);
            }
            array_shift($carteMain);
        }
        else{
            if(empty($carteJouer)){
                $carteJouer = array($carteMain[1]);
            }
            else{
                array_push($carteJouer, $carteMain[1]);
            }
            $carteMain = array($carteMain[0]);
        }
        $joueur->setCarteMain($carteMain);
        $joueur->setCarteJouer($carteJouer);
        $em->persist($joueur);
        $em->flush();
        
        //revoie sur bon action
        switch ($id_carteJouer) {
            case 1:
                 $url = $this->get('router')->generate('LoveLetter_platform_Garde', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant));
                 return $this->redirect($url);
                break;
            case 2:
                $url = $this->get('router')->generate('LoveLetter_platform_Pretre', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant));
                 return $this->redirect($url);
                break;
            case 3:
                $url = $this->get('router')->generate('LoveLetter_platform_Baron', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant));
                 return $this->redirect($url);
                break;
            case 4:
                $url = $this->get('router')->generate('LoveLetter_platform_Servante', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant));
                 return $this->redirect($url);
                break;
            case 5:
                $url = $this->get('router')->generate('LoveLetter_platform_Prince', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant));
                 return $this->redirect($url);
                break;
            case 6:
                $url = $this->get('router')->generate('LoveLetter_platform_Roi', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant));
                 return $this->redirect($url);
                break;
            case 7:
                $url = $this->get('router')->generate('LoveLetter_platform_Comtesse', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant));
                 return $this->redirect($url);
                break;
            case 8:
                $url = $this->get('router')->generate('LoveLetter_platform_Princesse', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant));
                 return $this->redirect($url);
                break;
        }
    }
    
    public function GardeAction(Request $id_manche, Request $nb_joueur){
        $em = $this->getDoctrine()->getManager();
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);
        $nbjoueur = $nb_joueur->query->get('nb_joueur');        
        $partie = $mancheEnCour->getPartie();
        
        $repositoryCarte = $em->getRepository('LoveLetterPlatformBundle:Carte');
        
        $ListeCarte[0] = $repositoryCarte->find(2);
        $ListeCarte[1] = $repositoryCarte->find(3);
        $ListeCarte[2] = $repositoryCarte->find(4);
        $ListeCarte[3] = $repositoryCarte->find(5);
        $ListeCarte[4] = $repositoryCarte->find(6);
        $ListeCarte[5] = $repositoryCarte->find(7);
        $ListeCarte[6] = $repositoryCarte->find(8);
        
        return $this->render('LoveLetterPlatformBundle:Jeu:garde.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbjoueur,
        'liste_cartes' => $ListeCarte
        ));  
    }
    
    public function GardeChoixAction(Request $id_manche, Request $nb_joueur, Request $id_carte){
        $em = $this->getDoctrine()->getManager();
        //Recuperation de la manche
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);

        $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
        $nbjoueur = $nb_joueur->query->get('nb_joueur');      
        
        $id_cartebis = $id_carte->query->get('id_carte');    

        if($nbjoueur == 1){
            $nbJoueurAdvers = $nbjoueur+1;
        }
        else{
             $nbJoueurAdvers = $nbjoueur-1;
        }
        $ListeCarteMain = $ListeJoueur[$nbJoueurAdvers-1]->getCarteMain();
        $ListeCarteJouer = $ListeJoueur[$nbJoueurAdvers-1]->getCarteJouer();
        if(empty($ListeCarteJouer)){
            $ListeCarteJouer = array();
        }
       
        if($ListeCarteMain[0] == $id_cartebis){
            $ListeCarteJouer = array_merge($ListeCarteJouer, $ListeCarteMain);
            $ListeCarteMain = array();
            $ListeJoueur[$nbJoueurAdvers-1]->setCarteMain($ListeCarteMain);
            $ListeJoueur[$nbJoueurAdvers-1]->setCarteJouer($ListeCarteJouer);
            $em->persist($ListeJoueur[$nbJoueurAdvers-1]);
            $em->flush();
        }
           $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $mancheEnCour->getId(),
            'nb_joueur' => $nbjoueur));
        return $this->redirect($url);
    }
            
    public function PretreAction(Request $id_manche, Request $nb_joueur){
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
       $repositoryCarte = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Carte');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       
        if($nbJoueurJouant == 1){
            $nbJoueurAdvers = $nbJoueurJouant+1;
        }
        else{
             $nbJoueurAdvers = $nbJoueurJouant-1;
        }
        if(!empty($ListeJoueur[$nbJoueurJouant-1]->getCarteMain())){
            foreach($ListeJoueur[$nbJoueurJouant-1]->getCarteMain() as $int){
                $ListeCarteJ1[]= $repositoryCarte->find($int);
            }
        }
        else{
            $ListeCarteJ1 =array();
        }
        if(!empty($ListeJoueur[$nbJoueurJouant-1]->getCarteJouer())){
            foreach($ListeJoueur[$nbJoueurJouant-1]->getCarteJouer() as $int){
                $ListeCarteJouerJ1[]= $repositoryCarte->find($int);
            }
        }
        else{
            $ListeCarteJouerJ1 =array();
        }
        if(!empty($ListeJoueur[$nbJoueurAdvers-1]->getCarteMain())){
            foreach($ListeJoueur[$nbJoueurAdvers-1]->getCarteMain() as $int){
                $ListeCarteJ2[]= $repositoryCarte->find($int);
            }
        }
        else{
            $ListeCarteJ2 = array();
        }
        if(!empty($ListeJoueur[$nbJoueurAdvers-1]->getCarteJouer())){
            foreach($ListeJoueur[$nbJoueurAdvers-1]->getCarteJouer() as $int){
                   $ListeCarteJouerJ2[]= $repositoryCarte->find($int);
            }
        }
        else{
            $ListeCarteJouerJ2 = array();
        }
            
            
        return $this->render('LoveLetterPlatformBundle:Jeu:Pretre.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'liste_cartesJ1' => $ListeCarteJ1,
        'liste_cartesJ2' => $ListeCarteJ2,
        'liste_cartesJouerJ1' => $ListeCarteJouerJ1,
        'liste_cartesJouerJ2' => $ListeCarteJouerJ2,
        ));
    }
    
    public function BaronAction(Request $id_manche, Request $nb_joueur){
       $em = $this->getDoctrine()->getManager();
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');   
        if($nbJoueurJouant == 1){
            $nbJoueurAdvers = $nbJoueurJouant+1;
        }
        else{
             $nbJoueurAdvers = $nbJoueurJouant-1;
        }

        $ListeCarteJ1 = $ListeJoueur[$nbJoueurJouant-1]->getCarteMain();
        $ListeCarteJ2 = $ListeJoueur[$nbJoueurAdvers-1]->getCarteMain();
        if($ListeCarteJ1[0]<$ListeCarteJ2[0]){
            array_shift($ListeCarteJ1);
            $ListeJoueur[$nbJoueurJouant-1]->setCarteMain($ListeCarteJ1);
            $em->persist($ListeJoueur[$nbJoueurJouant-1]);
        }
        elseif($ListeCarteJ1[0]>$ListeCarteJ2[0]){
            array_shift($ListeCarteJ2);
            $ListeJoueur[$nbJoueurAdvers-1]->setCarteMain($ListeCarteJ2);
            $em->persist($ListeJoueur[$nbJoueurAdvers-1]);
        }        
        else{
            
        }
        $em->flush();
        
         $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $mancheEnCour->getId(),
            'nb_joueur' => $nbJoueurJouant));
        return $this->redirect($url);
    }
    
    public function ServanteAction(Request $id_manche, Request $nb_joueur){
        //appliquer choix personne sur tout le monde et bloquer la personne qui a utilise servante jusqu'a sont prochaine tour
        return new Response("Servante");
    }
    
    public function PrinceAction(Request $id_manche, Request $nb_joueur){
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       
        
        return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'action' => "PrinceChoix",
        ));
    }
    
    public function PrinceChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
       $em = $this->getDoctrine()->getManager();
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       $Jchoisie = $choixJoueur->query->get('choixJoueur');    
       $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
       
       
       $carteMain= $ListeJoueur[$Jchoisie-1]->getCarteMain();
       $carteJouer= $ListeJoueur[$Jchoisie-1]->getCarteJouer();

        if(empty($carteJouer)){
           $carteJouer = array($carteMain[0]);
        }
        else{
            array_push($carteJouer, $carteMain[0]);
        }       
        array_shift($carteMain);    

        $ListeJoueur[$Jchoisie-1]->setCarteJouer($carteJouer);    
        $pioche = $mancheEnCour->getPioche();          
        $newtab = array($pioche[0]);
        array_shift($pioche);
        $ListeJoueur[$Jchoisie-1]->setCarteMain($newtab);
        $mancheEnCour->setPioche($pioche);
        $em->persist($mancheEnCour);
        $em->persist($ListeJoueur[$Jchoisie-1]);
        $em->flush();        

        $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
             'id_manche' => $mancheEnCour->getId(),
             'nb_joueur' => $nbJoueurJouant));
        return $this->redirect($url);
    }
    
    public function RoiAction(Request $id_manche, Request $nb_joueur){
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       
        return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'action' => "RoiChoix",
        ));
        //"Echangez votre main avec celle du joueur de votre choix."
    }
    
    public function RoiChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
        $em = $this->getDoctrine()->getManager();
        $id_manchebis = $id_manche->query->get('id_manche');
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $mancheEnCour = $repositoryManche->find($id_manchebis);
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
        $nbJoueurChoisie= $choixJoueur->query->get('choixJoueur');    
        if($nbJoueurJouant == $nbJoueurChoisie){
            return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
                    'id' => $mancheEnCour->getId(), 
                    'joueur' => $nbJoueurJouant,
                    'action' => "RoiChoix",
                    ));
        }
        $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
        $carteMainJ1= $ListeJoueur[$nbJoueurJouant-1]->getCarteMain();
        $carteMainJ2= $ListeJoueur[$nbJoueurChoisie-1]->getCarteMain();
        $ListeJoueur[$nbJoueurJouant-1]->setCarteMain($carteMainJ2);
        $ListeJoueur[$nbJoueurChoisie-1]->setCarteMain($carteMainJ1);
        $em->persist($ListeJoueur[$nbJoueurJouant-1]);
        $em->persist($ListeJoueur[$nbJoueurChoisie-1]);
        $em->flush();
        
        $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $mancheEnCour->getId(),
            'nb_joueur' => $nbJoueurJouant));
        return $this->redirect($url);
    }
    
    public function ComtesseAction(Request $id_manche, Request $nb_joueur){
        $id_manchebis = $id_manche->query->get('id_manche');
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');   
        $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $id_manchebis,
            'nb_joueur' => $nbJoueurJouant));
        return $this->redirect($url);
    }
    
    public function PrincesseAction(Request $id_manche, Request $nb_joueur){
        $id_manchebis = $id_manche->query->get('id_manche');
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');   
        $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' =>  $id_manchebis,
            'nb_joueur' => $nbJoueurJouant));
        return $this->redirect($url);
    }
    
    public function TestFinAction(Request $id_manche, Request $nb_joueur){
        //Different test de fin de partie a faire a chaque fin de tour de jeu de chaque joueur
        //Recuperation de la manche
        $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);

        $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
        $nbjoueur = $nb_joueur->query->get('nb_joueur');     
        $numJoueur = 0;
        foreach($ListeJoueur as $joueur){
            $numJoueur++;
            if(empty($joueur->getCarteMain())){
                return $this->render('LoveLetterPlatformBundle:Jeu:finManche.html.twig', array(
                    'test' => "plus carte", 
                    'joueur' => $numJoueur,
                    'idPartie' => $mancheEnCour->getPartie()->getId(),
                    ));
            }
            $ListeCarteJouer = $joueur->getCarteJouer();
            if(!empty($ListeCarteJouer)){
                foreach($ListeCarteJouer as $carte){
                    if ($carte == 8){
                        return $this->render('LoveLetterPlatformBundle:Jeu:finManche.html.twig', array(
                        'test' => "princesses",
                        'joueur' => $numJoueur,
                        'idPartie' => $mancheEnCour->getPartie()->getId(),
                        ));
                    }
                }
            }
        }
        if($nbjoueur == 1){
            $nbJoueurAdvers = $nbjoueur+1;
        }
        else{
             $nbJoueurAdvers = $nbjoueur-1;
        }

        $url = $this->get('router')->generate('LoveLetter_platform_TirerCarte', array(
            'id_manche' => $mancheEnCour->getId(),
            'nb_joueur' => $nbJoueurAdvers));
            return $this->redirect($url);
    }
    
    public function RemplisageTableCarteAction(){
        //Initialisation de la bdd avec les carte du jeu
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
        
        $carte2 = new Carte;
        $carte2->setNom("Baron");
        $carte2->setNombre(3);
        $carte2->setPouvoir("Vous et un autre joueur comparez secretement votre main. Le joueur avec la valeur la plus faible est éliminé.");
        $carte2->setUrl("http://4.bp.blogspot.com/-6cdKuzKOcDU/VAN-RUsAIZI/AAAAAAAAAPU/gX2zRU8TVLM/s1600/baron2400.png");

        $carte3 = new Carte;
        $carte3->setNom("Servante");
        $carte3->setNombre(4);
        $carte3->setPouvoir("Jusqu'à votre prochaine tour, ignorez tous les effets des cartes jouées par les autres joueurs.");
        $carte3->setUrl("http://1.bp.blogspot.com/-STIjfRwIegM/VAN_aGofPFI/AAAAAAAAAQA/bJfp3UJrEhI/s1600/servante2400.png");

        $carte4 = new Carte;
        $carte4->setNom("Prince");
        $carte4->setNombre(5);
        $carte4->setPouvoir("Choisissez un autre joueur (ce peut être vous). Il défausse sa main et pioche une nouvelle carte.");
        $carte4->setUrl("http://2.bp.blogspot.com/-8yH8JHqLNBA/VAN-dcSvvmI/AAAAAAAAAPc/em0FE054rmw/s1600/prince2400.png");

        $carte5 = new Carte;
        $carte5->setNom("Roi");
        $carte5->setNombre(6);
        $carte5->setPouvoir("Echangez votre main avec celle du joueur de votre choix.");
        $carte5->setUrl("http://3.bp.blogspot.com/-neBZ0NfeX2E/VAN_YNIgQ0I/AAAAAAAAAP4/7loy4fix_bI/s1600/roi2400.png");

        $carte6 = new Carte;
        $carte6->setNom("Comtesse");
        $carte6->setNombre(7);
        $carte6->setPouvoir("Si vous avez cette carte et le roi ou un prince, vous devez défausser la Comtesse");
        $carte6->setUrl("http://3.bp.blogspot.com/-hgI9NTCbm_M/VAN-jAdT_gI/AAAAAAAAAPk/8ODcM6_CIN0/s1600/comptesse2400.png");

        $carte7 = new Carte;
        $carte7->setNom("Princesse");
        $carte7->setNombre(8);
        $carte7->setPouvoir("Si vous défaussez cette carte vous êtes éliminé");
        $carte7->setUrl("http://4.bp.blogspot.com/-7Lq-8DZByAI/VAN_LHMq4XI/AAAAAAAAAPw/V1YAVTuWm9g/s1600/princess2400.png");
        
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        
        // Étape 1 : On « persiste » l'entité
        $em->persist($carte);
        $em->persist($carte1);
        $em->persist($carte2);
        $em->persist($carte3);
        $em->persist($carte4);
        $em->persist($carte5);
        $em->persist($carte6);
        $em->persist($carte7);
        
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();
       
        $url = $this->get('router')->generate('LoveLetter_platform_jeu');
        return $this->redirect($url);
    }    
}
