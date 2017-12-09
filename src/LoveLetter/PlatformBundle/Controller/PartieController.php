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
        //Création d'une nouvelle partie
        $partie = new Partie;
        $partie->setNomPartie($nom);
       
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        
        // Étape 1 : On « persiste » l'entité

        $em->persist($partie);
        
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();

        //Redirection vers DebutManche pour créer la première manche
        $url = $this->get('router')->generate('LoveLetter_platform_DebutManche', array(
            'id_partie' => $partie->getId()));
        return $this->redirect($url);
    }
    
    public function DebutMancheAction(Request $id_partie){
        $em = $this->getDoctrine()->getManager();
        //Creation de deux joueur pour tester
        //A supprimer quand les sessions utilisateur marcherons
        $joueur1 = new Joueur;
        $joueur2 = new Joueur;
        $joueur3 = new Joueur;
        $joueur4 = new Joueur;
        $em->persist($joueur1);
        $em->persist($joueur2);
        $em->persist($joueur3);
        $em->persist($joueur4);
         // On récupère l'EntityManager
        
        $id_partiebis = $id_partie->query->get('id_partie');
        
        $repositoryPartie = $em->getRepository('LoveLetterPlatformBundle:Partie');
        $partie = $repositoryPartie->find($id_partiebis);
       
        
        //Création d'une nouvelle manche 
        $manche = new Manche;
        $manche->setPartie($partie);
        $manche->setTourDe(1);
        $manche->addjoueur($joueur1) ;
        $manche->addjoueur($joueur2) ;
        $manche->addjoueur($joueur3) ;
        $manche->addjoueur($joueur4) ;
        $proteger = array();
        $manche->setProteger($proteger);
        $perdu = array();
        $manche->setProteger($perdu);
        //Creation de la pioche
        $pioche = array(1,1,1,1,1,2,2,3,3,4,4,5,5,6,7,8);
        //shuffle($pioche);
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
       $ListeJoueur = $mancheEnCour->getJoueur();
       $pioche = $mancheEnCour->getPioche();
     
        foreach ($ListeJoueur as $Joueur) {
            $Joueur->setCarteMain(array($pioche[0]));
            $em->persist($Joueur);
            array_shift($pioche);
        }

        $mancheEnCour->setPioche($pioche);
        $em->persist($mancheEnCour);
        $em->flush();
        

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
        $ListeJoueur = $mancheEnCour->getJoueur();
        $nbJoueurJouant = $id_joueur->query->get('id_joueur');

        $repositoryCarte = $em->getRepository('LoveLetterPlatformBundle:Carte');
        
        $ListeEnvoi = array();
        $nbJoueur = 0;
        foreach($ListeJoueur as $joueur){//parcours de la liste des joueurs

            $ListeEnvoi[$nbJoueur] = array();
            if(!empty($joueur->getCarteMain())){
                foreach($joueur->getCarteMain() as $int){
                    $ListeEnvoi[$nbJoueur][0][]= $repositoryCarte->find($int);
                }
            } 
            else{
                $ListeEnvoi[$nbJoueur][0] = array();
            }

            if(!empty($joueur->getCarteJouer())){
                foreach($joueur->getCarteJouer() as $int){
                    $ListeEnvoi[$nbJoueur][1][]= $repositoryCarte->find($int);
                }
            }
            else{
               $ListeEnvoi[$nbJoueur][1] = array();
            }
            $nbJoueur ++;
        }
        return $this->render('LoveLetterPlatformBundle:Jeu:plateauDeJeu.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'liste' => $ListeEnvoi,
        'tour_De' => $mancheEnCour->getTourDe(),
        'pioche' => count($mancheEnCour->getPioche()),
        ));
    }
    
    public function TirerCarteAction(Request $id_manche, Request $nb_joueur){
        $em = $this->getDoctrine()->getManager();
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);
        $getTourDe = $mancheEnCour->getTourDe();
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');

        $proteger = $mancheEnCour->getProteger();

        if(in_array( $getTourDe,$proteger)){
            array_shift($proteger);
            $mancheEnCour->setProteger($proteger);
        }
        $pioche = $mancheEnCour->getPioche();
        $ListeJoueur = $mancheEnCour->getJoueur();
        $tour_de = $mancheEnCour->getTourDe();
        $joueur = $ListeJoueur[$tour_de-1];
        $carteMainJoueur = $joueur->getCarteMain();
        $newtab = array($carteMainJoueur[0], $pioche[0]);
        array_shift($pioche);
        $joueur->setCarteMain($newtab);
        $mancheEnCour->setPioche($pioche);
        $em->persist($mancheEnCour);
        $em->persist($joueur);
        $em->flush();        
        
        //test comtesse
        $carteMain = $joueur->getCarteMain();
        if($carteMain[0] == 7){
            if($carteMain[1] == 6 || $carteMain[1] == 5 || $carteMain[1] == 8){
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
                    'nb_joueur' => $nbJoueurJouant,
                    ));
                return $this->redirect($url);
            }
        }
        elseif($carteMain[1] == 7){
            if($carteMain[0] == 6 || $carteMain[0] == 5 || $carteMain[0] == 8){
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
                    'nb_joueur' => $nbJoueurJouant,
                        ));
                return $this->redirect($url);
            }
        }
       
        $url = $this->get('router')->generate('LoveLetter_platform_AffichageJeu', array(
            'id_manche' => $mancheEnCour->getId(),
            'id_joueur' => $nbJoueurJouant,
            ));
        return $this->redirect($url);
    }

    public function TestFinAction(Request $id_manche, Request $nb_joueur){
        $em = $this->getDoctrine()->getManager();
        //Different test de fin de partie a faire a chaque fin de tour de jeu de chaque joueur
        //Recuperation de la manche
        $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);

        $ListeJoueur = $mancheEnCour->getJoueur();
        $nbjoueur = $nb_joueur->query->get('nb_joueur');     
        $numJoueur = 0;
        $perdu = $mancheEnCour->getPerdu();
        if(empty($perdu)){
            $perdu = array();
        }
        foreach($ListeJoueur as $joueur){
            $numJoueur++;
            if(!in_array($numJoueur, $perdu)){
                if(empty($joueur->getCarteMain())){
                    $perdu[] = $numJoueur;
                }
                $ListeCarteJouer = $joueur->getCarteJouer();
                if(!empty($ListeCarteJouer)){
                    foreach($ListeCarteJouer as $carte){
                        if ($carte == 8){
                           $perdu[] = $numJoueur;
                        }
                    }
                }
            }
        }
       
        $mancheEnCour->setPerdu($perdu);
        $tour_de = $mancheEnCour->getTourDe();
        $stock = $tour_de;
        $tour_de++;
        if(count($ListeJoueur)<$tour_de){
                $tour_de=1;
        }
        while(in_array($tour_de,$perdu)){
            $tour_de++;
            if(count($ListeJoueur)<$tour_de){
                $tour_de=1;
            }
        }
        if($stock == $tour_de){
            //envoi debut manche avec num joueur gagnant +1 score et apres faire test si score est suffisant pour arret de la partie
            return new Response("FIN DE MANCHE".$stock." ".$tour_de);
        }
        $mancheEnCour->setTourDe($tour_de);
        
        $em->persist($mancheEnCour);
        $em->flush();
        $url = $this->get('router')->generate('LoveLetter_platform_TirerCarte', array(
            'id_manche' => $mancheEnCour->getId(),
            'nb_joueur' => $nbjoueur,
            ));
        return $this->redirect($url);
    }
}
