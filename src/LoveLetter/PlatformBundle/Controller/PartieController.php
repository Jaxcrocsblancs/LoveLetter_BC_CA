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
    
    //fonction non aboutie car manque le systeme de session
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
    
    //Creation de la partie dans la BDD
    public function CreationPartieAction($nom, $nb){
        //Création d'une nouvelle partie
        $partie = new Partie;
        $partie->setNomPartie($nom);
       
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        
        // Étape 1 : On « persiste » l'entite
        $em->persist($partie);
        
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();

        //Redirection vers DebutManche pour créer la première manche        
        $response = $this->DebutManche($partie->getId(),1,null,1,$nb);
        return $response;
    }
    
    //Creation d'un nouvelle nouvelle manche
    public function DebutManche($id_partie, $premierJoueur, $id_manchePrecedente, $id_joueur, $nb){
          // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        $repositoryPartie = $em->getRepository('LoveLetterPlatformBundle:Partie');
        $partie = $repositoryPartie->find($id_partie);
       
        //Création d'une nouvelle manche 
        $manche = new Manche;
        $manche->setPartie($partie);
        $manche->setFin(0);
        //Creation de nouveau joueur selon le nombre définit
        $joueur1 = new Joueur;
        $em->persist($joueur1);
        $manche->addjoueur($joueur1) ;
        $joueur2 = new Joueur;
        $em->persist($joueur2);
        $manche->addjoueur($joueur2) ;
        if($nb>2){
            $joueur3 = new Joueur;
            $em->persist($joueur3);
             $manche->addjoueur($joueur3) ;
            if($nb>3){
                $joueur4 = new Joueur;
                $em->persist($joueur4);
                $manche->addjoueur($joueur4) ;
            }
        }
        
        $manche->setTourDe($premierJoueur);
        $proteger = array();
        $manche->setProteger($proteger);
        $perdu = array();
        $manche->setProteger($perdu);
        //Creation de la pioche
        $pioche = array(1,1,1,1,1,2,2,3,3,4,4,5,5,6,7,8);
        shuffle($pioche);
        if($nb == 2){
            array_shift($pioche);
            array_shift($pioche);
            array_shift($pioche);   
        }
        array_shift($pioche);
        $manche->setPioche($pioche);

        // Étape 1 : On « persiste » l'entité
        $em->persist($manche);
        
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();
        
        //Si il y a une manche précedente récuperation des données
        if($id_manchePrecedente != null){
            $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
            $ManchePreced = $repositoryManche->find($id_manchePrecedente);
            $ManchePreced->setSuivant($manche->getId());
            $em->persist($ManchePreced);
            $LjoueurP = $ManchePreced->getJoueur();
            $Ljoueur = $manche->getJoueur();
            $nb = 0;
            foreach($LjoueurP as $joueur){
                $Ljoueur[$nb]->setScore($joueur->getScore());
                $em->persist($Ljoueur[$nb]);
                $nb++;
            }
        }
        $em->flush();
        //Redirection vers DebutJeuAction pour créer la première manche
        $response = $this->DistributionCarte($manche->getId(),$id_joueur);
        return $response;
    }

    public function DistributionCarte($id_manche, $id_joueur){
       // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche);
        $ListeJoueur = $mancheEnCour->getJoueur();
        $pioche = $mancheEnCour->getPioche();
        //distrubution d'une carte par joueur, les cartes sont supprimé de la pioche
         foreach ($ListeJoueur as $Joueur) {
             $Joueur->setCarteMain(array($pioche[0]));
             $em->persist($Joueur);
             array_shift($pioche);
         }
         $mancheEnCour->setPioche($pioche);
         $em->persist($mancheEnCour);
         $em->flush();
         $response = $this->TirerCarte($id_manche,$id_joueur);
         return $response;
    }
    
    public function AffichageJeuAction(Request $id_manche, Request $nb_joueur){    
          // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
       $nbjoueur = $nb_joueur->query->get('nb_joueur'); 

       if($mancheEnCour->getFin() == 0){
            //recuperation de la liste des joueurs participant a la manche
            $ListeJoueur = $mancheEnCour->getJoueur();
            $repositoryCarte = $em->getRepository('LoveLetterPlatformBundle:Carte');
            $ListeEnvoi = array();
            $ListeScore = array();
            $nbJoueur = 0;
            //Creation de la liste pour affichage
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
                $ListeScore[] = $joueur->getScore();
                $nbJoueur ++;
            }
            $score = 1;
            foreach($ListeJoueur as $joueur){
                $score = $score + $joueur->getScore();
            }
            return $this->render('LoveLetterPlatformBundle:Jeu:plateauDeJeu.html.twig', array(
                'id' => $mancheEnCour->getId(), 
                'joueur' => $nbjoueur,
                'liste' => $ListeEnvoi,
                'tour_De' => $mancheEnCour->getTourDe(),
                'pioche' => count($mancheEnCour->getPioche()),
                'ListeScore' =>$ListeScore,
                'manche' => $score,
            ));
       }
       else{
             $url = $this->get('router')->generate('LoveLetter_platform_AffichageJeu', array(
                        'id_manche' => $mancheEnCour->getSuivant(),
                        'nb_joueur' => $nbjoueur,
                            ));
            return $this->redirect($url);
       }
    }
    
    public function TirerCarte($id_manche, $nb_joueur){

        // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche);
         //suppression du joueur dans le tableau proteger si il l'etait
            $getTourDe = $mancheEnCour->getTourDe();
            $proteger = $mancheEnCour->getProteger();
            if(in_array( $getTourDe,$proteger)){
                array_shift($proteger);
                $mancheEnCour->setProteger($proteger);
            }
            //tirage d'une carte
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
            //test comtesse si avec la comtesse il y a un prince un roi ou un princesse la comptesse est jouer automatiquement
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
                        'nb_joueur' => $nb_joueur,
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
                        'nb_joueur' => $nb_joueur,
                            ));
                    return $this->redirect($url);
                }
            }
            $url = $this->get('router')->generate('LoveLetter_platform_AffichageJeu', array(
                        'id_manche' => $mancheEnCour->getId(),
                        'nb_joueur' => $nb_joueur,
                            ));
            return $this->redirect($url);
    }

    public function TestFinAction(Request $id_manche, Request $nb_joueur){
        // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
       if($mancheEnCour->getFin() == 0){
            $em = $this->getDoctrine()->getManager();
            $ListeJoueur = $mancheEnCour->getJoueur();
            $nbjoueur = $nb_joueur->query->get('nb_joueur');     
            $numJoueur = 0;
            $perdu = $mancheEnCour->getPerdu();
            if(empty($perdu)){
                $perdu = array();
            }
            //Si la pioche est vide fin de manche
            $pioche = $mancheEnCour-> getPioche();
            if(empty($pioche)){
                $carteMax = 0;
                $joueurMax = 0;
                foreach($ListeJoueur as $joueur){
                    $numJoueur++;
                    if($joueur->getMain()>$carteMax){
                         $carteMax = $joueur->getMain();
                         $joueurMax = $numJoueur;
                    }
                }
                $response = $this->TestFinPartie($id_manchebis,$joueurMax);
                return $response;
            }
            
           //Ajout des joueurs aux tableaux perdu si ils ont perdu
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
                               $ListeCarteMain = $joueur->getCarteMain();
                               while(!empty($ListeCarteMain)){
                                   $ListeCarteJouer[] = $ListeCarteMain[0];
                                   array_shift($ListeCarteMain);
                               }
                               $joueur->setCarteMain($ListeCarteMain);
                               $joueur->setCarteJouer($ListeCarteJouer);
                               $em->persist($joueur);
                            }
                        }
                    }
                }
            }
            
            // fin de manche si il ne reste plus qu'un joueur
              if((count($perdu)+1) == $numJoueur){
                //envoi debut manche avec num joueur gagnant +1 score et apres faire test si score est suffisant pour arret de la partie
                $response = $this->TestFinPartie($id_manchebis,$nbjoueur);
                     return $response;
            }
            
            //changement de tour
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
            $mancheEnCour->setTourDe($tour_de);
            $em->persist($mancheEnCour);
            $em->flush();
            
            $response = $this->TirerCarte($id_manchebis,$nbjoueur);
            return $response;
       }
       else{
           return new Response ("Manche Finie");
       }
    }
    
    public function TestFinPartie($id_manche, $nb_joueur){

       // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche);
       //definie que la manche est finie
            $mancheEnCour->setFin(1);
            $em->persist($mancheEnCour);
            $em->flush();
            //test si la partie est finie
            $ListeJoueur = $mancheEnCour->getJoueur();     
            $nb = 0;
            $tourDe = $mancheEnCour->getTourDe();
            $scoreSelonNbJoueur = array(0,0,7,5,4);
            $nombreDeJoueur = count($ListeJoueur);
            foreach($ListeJoueur as $joueur){
                $nb++;
                if($nb == $tourDe){
                    $score = $joueur->getScore();
                    $score++;
                    $joueur->setScore($score);
                    $em->persist($joueur);
                    $em->flush();
                    if($joueur->getScore() == $scoreSelonNbJoueur[$nombreDeJoueur]){
                          return $this->render('LoveLetterPlatformBundle:Jeu:finPartie.html.twig', array(
                        'joueur' => $nb
                    ));
                    }
                    else{
                         $response = $this->DebutManche($mancheEnCour->getPartie()->getId(),$nb,$mancheEnCour->getId(),$nb_joueur,count($ListeJoueur));
                         return $response;
                    }
                }
            }
    }
}
