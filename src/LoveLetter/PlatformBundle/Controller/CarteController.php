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

class CarteController extends Controller
{
    //Test si c'est bien le tour du joueur qui tente de faire une action
    public function TestTourDe($id_manche, $nb_joueur){
        $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche);
       $tourDe = $mancheEnCour->getTourDe();
       if($tourDe != $nb_joueur){
           return "false";
       }
       else{
          return "true";
       } 
    }
    
    public function ChoixAction(Request $id_manche, Request $nb_joueur, Request $numCarteChoisi){
       // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       $reponse = $this->TestTourDe($id_manchebis,$nbJoueurJouant);
       //test pour verifier que c'est bien le bon joueur qui teste un action
       if($mancheEnCour->getFin() == 0 && $reponse == "true"){
            //Supprime la carte de la main du joueur et transfert vers la liste des cartes jouer
            $id_carteJouer = $numCarteChoisi->query->get('numCarteChoisi');
            $ListeJoueur = $mancheEnCour->getJoueur();
            $joueur = $ListeJoueur[$nbJoueurJouant-1];
            $carteMain= $joueur->getCarteMain();
            $carteJouer= $joueur->getCarteJouer();
            //Suppression de la bonne carte
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
            //Stockage des nouveaux tableaux dans l'entité
            $joueur->setCarteMain($carteMain);
            $joueur->setCarteJouer($carteJouer);
            $em->persist($joueur);
            $em->flush();

            //revoie sur la bonne action 
            switch ($id_carteJouer) {
                case 1:
                     $response = $this->Garde($id_manchebis,$nbJoueurJouant);
                     return $response;
                    break;
                case 2:
                    $response = $this->Pretre($id_manchebis,$nbJoueurJouant);
                    return $response;
                    break;
                case 3:
                    $response = $this->Baron($id_manchebis,$nbJoueurJouant);
                    return $response;
                    break;
                case 4:
                    $response = $this->Servante($id_manchebis,$nbJoueurJouant);
                    return $response;
                    break;
                case 5:
                     $response = $this->Prince($id_manchebis,$nbJoueurJouant);
                    return $response;
                    break;
                case 6:
                    $response = $this->Roi($id_manchebis,$nbJoueurJouant);
                    return $response;
                    break;
                case 7:
                   $response = $this->Comtesse($id_manchebis,$nbJoueurJouant);
                    return $response;
                    break;
                case 8:
                  $response = $this->Princesse($id_manchebis,$nbJoueurJouant);
                    return $response;
                    break;
            }
       }
       else{
           return new Response("Tricher c'est Mal");
       }
    }
    
    public function Garde($id_manche, $nb_joueur){
        // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche); 
       $ListeJoueur = $mancheEnCour->getJoueur();
       $nbJoueur = 0;
       $liste = array();
       
       $proteger = $mancheEnCour->getProteger();
       $perdu = $mancheEnCour->getPerdu();
        //Fabrication de la liste des joueurs pouvant être affecter pas 
            if(empty($perdu)){
                $perdu = array();
            }
            if(empty($proteger)){
                $proteger = array();
            }
            foreach($ListeJoueur as $joueur){
                $nbJoueur++;
                if($nbJoueur != $nb_joueur && !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
                 $liste[]=$nbJoueur;
                }
            }
            //si la liste est vide renvoi vers testFin pour la fin du tour
            if(empty($liste)){
                $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                    'id_manche' => $id_manche,
                    'nb_joueur' => $nb_joueur,
                    ));
                 return $this->redirect($url);
            }
            //envoie sur le choix du joueur
             return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
             'id' => $id_manche, 
             'joueur' =>  $nb_joueur,
             'Liste' => $liste,
             'action' => "GardeChoix",
             ));
    }

    public function GardeChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
         // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
       $nbjoueur = $nb_joueur->query->get('nb_joueur');    
       $reponse = $this->TestTourDe($id_manchebis,$nbjoueur);
       if($mancheEnCour->getFin() == 0 && $reponse == "true"){
           //affichage des cartes selectionnable
            $nbjoueur = $nb_joueur->query->get('nb_joueur');        
            $nbjoueurChoisie = $choixJoueur->query->get('choixJoueur');        
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
            'liste_cartes' => $ListeCarte,
            'jchoisie' => $nbjoueurChoisie,
            ));  
       }
       else{
           return new Response("Manche finie");
       }
    }
            
    public function GardeChoix2Action(Request $id_manche, Request $nb_joueur, Request $id_carte, Request $choixJoueur){
         // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
       $nbjoueur = $nb_joueur->query->get('nb_joueur'); 
       $reponse = $this->TestTourDe($id_manchebis,$nbjoueur);

       if($mancheEnCour->getFin() == 0 && $reponse == "true"){
           //application des choix
           //suppression de la carte de la main du joueur si elle y est
            $ListeJoueur = $mancheEnCour->getJoueur();     
            $joueurChoisie = $choixJoueur->query->get('choixJoueur'); 
            $id_cartebis = $id_carte->query->get('id_carte');    

            $ListeCarteMain = $ListeJoueur[$joueurChoisie-1]->getCarteMain();
            $ListeCarteJouer = $ListeJoueur[$joueurChoisie-1]->getCarteJouer();
            if(empty($ListeCarteJouer)){
                $ListeCarteJouer = array();
            }

            if($ListeCarteMain[0] == $id_cartebis){
                $ListeCarteJouer = array_merge($ListeCarteJouer, $ListeCarteMain);
                $ListeCarteMain = array();
                $ListeJoueur[$joueurChoisie-1]->setCarteMain($ListeCarteMain);
                $ListeJoueur[$joueurChoisie-1]->setCarteJouer($ListeCarteJouer);
                $em->persist($ListeJoueur[$joueurChoisie-1]);
                $em->flush();
            }
            $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                'id_manche' => $mancheEnCour->getId(),
                'nb_joueur' => $nbjoueur,
                ));
            return $this->redirect($url);
       }
       else{
           return new Response("Manche finie");
       }
    }
            
    public function Pretre($id_manche, $nb_joueur){
         // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche);
        $ListeJoueur = $mancheEnCour->getJoueur();
        $nbJoueur = 0;
         //Fabrication de la liste des joueurs pouvant être affecter pas 
        $liste = array();
        $proteger = $mancheEnCour->getProteger();
        $perdu = $mancheEnCour->getPerdu();
        if(empty($perdu)){
            $perdu = array();
        }
        if(empty($proteger)){
            $proteger = array();
        }
        foreach($ListeJoueur as $joueur){
            $nbJoueur++;
            if($nbJoueur != $nb_joueur && !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
             $liste[]=$nbJoueur;
            }
        }
        if(empty($liste)){
                $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                    'id_manche' => $mancheEnCour->getId(),
                    'nb_joueur' => $nb_joueur,
                    ));
                 return $this->redirect($url);
        }
         return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
         'id' => $mancheEnCour->getId(), 
         'joueur' => $nb_joueur,
         'Liste' => $liste,
         'action' => "PretreChoix",
         ));
    }
    
    public function PretreChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
         // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');
        $reponse = $this->TestTourDe($id_manchebis,$nbJoueurJouant);

       if($mancheEnCour->getFin() == 0 && $reponse == "true"){
           //Affichage de la carte selon le choix du joueur
           $ListeJoueur = $mancheEnCour->getJoueur();
          
           $nbJoueurChoisie = $choixJoueur->query->get('choixJoueur');
           $repositoryCarte = $em->getRepository('LoveLetterPlatformBundle:Carte');

           $carte = $ListeJoueur[$nbJoueurChoisie-1]->getCarteMain();
           $carteAffichage = $repositoryCarte->find($carte[0]);

           return $this->render('LoveLetterPlatformBundle:Jeu:Pretre.html.twig', array(
           'id' => $mancheEnCour->getId(), 
           'joueur' => $nbJoueurJouant,
           'tour_De' => $mancheEnCour->getTourDe(),
           'carte' => $carteAffichage,
           'nb' => $nbJoueurChoisie,    
           ));
       }
       else{
           return new Response("Manche finie");
       }
    }

    public function Baron($id_manche,$nb_joueur){
         // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche); 
        $ListeJoueur = $mancheEnCour->getJoueur();
         //Fabrication de la liste des joueurs pouvant être affecter pas 
        $nbJoueur = 0;
        $liste = array();
        $proteger = $mancheEnCour->getProteger();
        $perdu = $mancheEnCour->getPerdu();
         if(empty($perdu)){
            $perdu = array();
        }
        if(empty($proteger)){
            $proteger = array();
        }
        foreach($ListeJoueur as $joueur){
            $nbJoueur++;
            if($nbJoueur != $nb_joueur && !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
             $liste[]=$nbJoueur;
            }
        }
        if(empty($liste)){
                $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                    'id_manche' => $mancheEnCour->getId(),
                    'nb_joueur' => $nb_joueur,
                    ));
                 return $this->redirect($url);
        }
         return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
         'id' => $mancheEnCour->getId(), 
         'joueur' => $nb_joueur,
         'Liste' => $liste,
         'action' => "BaronChoix",
         ));
    }

    public function BaronChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){ // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');   
       $reponse = $this->TestTourDe($id_manchebis,$nbJoueurJouant);

       if($mancheEnCour->getFin() == 0 && $reponse == "true"){
        $ListeJoueur = $mancheEnCour->getJoueur();
        //Comparaison des cartes des 2 joueurs et suppression si besoin
        $nbJoueurChoisi = $choixJoueur->query->get('choixJoueur');
         $ListeCarteJ1 = $ListeJoueur[$nbJoueurJouant-1]->getCarteMain();
         $ListeCarteJ2 = $ListeJoueur[$nbJoueurChoisi-1]->getCarteMain();
         $ListeCarteJouerJ1 = $ListeJoueur[$nbJoueurJouant-1]->getCarteJouer();
         $ListeCarteJouerJ2 = $ListeJoueur[$nbJoueurChoisi-1]->getCarteJouer();
         if($ListeCarteJ1[0]<$ListeCarteJ2[0]){
             $ListeCarteJouerJ1[] = $ListeCarteJ1[0];
             array_shift($ListeCarteJ1);
             $ListeJoueur[$nbJoueurJouant-1]->setCarteMain($ListeCarteJ1);
             $ListeJoueur[$nbJoueurJouant-1]->setCarteJouer($ListeCarteJouerJ1);
             $em->persist($ListeJoueur[$nbJoueurJouant-1]);
         }
         elseif($ListeCarteJ1[0]>$ListeCarteJ2[0]){
             $ListeCarteJouerJ2[] = $ListeCarteJ2[0];
             array_shift($ListeCarteJ2);
             $ListeJoueur[$nbJoueurChoisi-1]->setCarteMain($ListeCarteJ2);
             $ListeJoueur[$nbJoueurChoisi-1]->setCarteJouer($ListeCarteJouerJ2);
             $em->persist($ListeJoueur[$nbJoueurChoisi-1]);
         }
         else{
             
         }
         $em->flush();

          $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
             'id_manche' => $mancheEnCour->getId(),
             'nb_joueur' => $nbJoueurJouant,
             ));
         return $this->redirect($url);
       }
       else{
           return new Response("Manche finie");
       }
    }
    
    public function Servante($id_manche, $nb_joueur){
         // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche);
       //Ajout du joueur dans la liste des joueurs proteger
            $proteger = $mancheEnCour->getProteger();
            if(empty($proteger)){
                $newtab = array($nb_joueur);
            }
            else{
                $newtab = array($proteger, $nb_joueur);
            }
            $mancheEnCour->setProteger($newtab);
            $em->persist($mancheEnCour);
            $em->flush();
            $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                'id_manche' => $mancheEnCour->getId(),
                'nb_joueur' => $nb_joueur,
                ));
            return $this->redirect($url);
       }
    
    public function Prince($id_manche,$nb_joueur){
         // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche);
        $ListeJoueur = $mancheEnCour->getJoueur();
         //Fabrication de la liste des joueurs pouvant être affecter pas 
        $nbJoueur = 0;
        $liste = array();
        $proteger = $mancheEnCour->getProteger();
        $perdu = $mancheEnCour->getPerdu();
         if(empty($perdu)){
            $perdu = array();
        }
        if(empty($proteger)){
            $proteger = array();
        }
        foreach($ListeJoueur as $joueur){
            $nbJoueur++;
            if( !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
              $liste[]=$nbJoueur;
            }
        }
        if(empty($liste)){
                $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                    'id_manche' => $mancheEnCour->getId(),
                    'nb_joueur' => $nb_joueur,
                    ));
                 return $this->redirect($url);
        }
         return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
         'id' => $mancheEnCour->getId(), 
         'joueur' => $nb_joueur,
         'Liste' => $liste,
         'action' => "PrinceChoix",
         ));
       }
    
    public function PrinceChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
         // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
        $reponse = $this->TestTourDe($id_manchebis,$nbJoueurJouant);

       if($mancheEnCour->getFin() == 0 && $reponse == "true"){
        //Defausse la carte du joueur choisie et retire une autre carte
        $Jchoisie = $choixJoueur->query->get('choixJoueur');    
        $ListeJoueur = $mancheEnCour->getJoueur();
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
              'nb_joueur' => $nbJoueurJouant,
                 ));
         return $this->redirect($url);
       }
       else{
           return new Response ("Manche finie");
       }
    }
    
    public function Roi($id_manche,$nb_joueur){
         // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manche);
           $ListeJoueur = $mancheEnCour->getJoueur();
            //Fabrication de la liste des joueurs pouvant être affecter pas 
           $nbJoueur = 0;
           $liste = array();
           $proteger = $mancheEnCour->getProteger();
           $perdu = $mancheEnCour->getPerdu();
            if(empty($perdu)){
               $perdu = array();
           }
           if(empty($proteger)){
               $proteger = array();
           }
           foreach($ListeJoueur as $joueur){
               $nbJoueur++;
               if($nbJoueur != $nb_joueur && !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
                $liste[]=$nbJoueur;
               }
           }
                   if(empty($liste)){
                $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                    'id_manche' => $mancheEnCour->getId(),
                    'nb_joueur' => $nb_joueur,
                    ));
                 return $this->redirect($url);
             }
            return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
            'id' => $mancheEnCour->getId(), 
            'joueur' => $nb_joueur,
            'Liste' => $liste,
            'action' => "RoiChoix",
            ));
       }
    
    public function RoiChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
       // On récupère l'EntityManager
       $em = $this->getDoctrine()->getManager();
       //Recuperation de la manche
       $id_manchebis = $id_manche->query->get('id_manche');
       $repository = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repository->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       $reponse = $this->TestTourDe($id_manchebis,$nbJoueurJouant);

       if($mancheEnCour->getFin() == 0 && $reponse == "true"){
            //Enchange des mains entre le joueur du tour et le joueur choisie
            $nbJoueurChoisie= $choixJoueur->query->get('choixJoueur');    

            $ListeJoueur = $mancheEnCour->getJoueur();
            $carteMainJ1= $ListeJoueur[$nbJoueurJouant-1]->getCarteMain();
            $carteMainJ2= $ListeJoueur[$nbJoueurChoisie-1]->getCarteMain();
            $ListeJoueur[$nbJoueurJouant-1]->setCarteMain($carteMainJ2);
            $ListeJoueur[$nbJoueurChoisie-1]->setCarteMain($carteMainJ1);
            $em->persist($ListeJoueur[$nbJoueurJouant-1]);
            $em->persist($ListeJoueur[$nbJoueurChoisie-1]);
            $em->flush();

            $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
                'id_manche' => $mancheEnCour->getId(),
                'nb_joueur' => $nbJoueurJouant,
                ));
            return $this->redirect($url);
       }
       else{
           return new Response("Manche finie");
       }
    }
    
    public function Comtesse($id_manche,$nb_joueur){
        //revoie vers la fin de manche le test comtesse ce fait en tirant la carte
        $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $id_manche,
            'nb_joueur' => $nb_joueur,
            ));
        return $this->redirect($url);
    }
    
    public function Princesse($id_manche, $nb_joueur){
        //l'effet de la princesse ce fait dans le test de fin de tour
        $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $id_manche,
            'nb_joueur' => $nb_joueur,
            ));
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
