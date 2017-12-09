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
    public function ChoixAction(Request $id_manche, Request $nb_joueur, Request $numCarteChoisi){
        $em = $this->getDoctrine()->getManager();
        $id_carteJouer = $numCarteChoisi->query->get('numCarteChoisi');

        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
        
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);

        $ListeJoueur = $mancheEnCour->getJoueur();
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
                     'nb_joueur' => $nbJoueurJouant,
                     ));
                 return $this->redirect($url);
                break;
            case 2:
                $url = $this->get('router')->generate('LoveLetter_platform_Pretre', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant,
                     ));
                 return $this->redirect($url);
                break;
            case 3:
                $url = $this->get('router')->generate('LoveLetter_platform_Baron', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant,
                     ));
                 return $this->redirect($url);
                break;
            case 4:
                $url = $this->get('router')->generate('LoveLetter_platform_Servante', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant,
                     ));
                 return $this->redirect($url);
                break;
            case 5:
                $url = $this->get('router')->generate('LoveLetter_platform_Prince', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant,
                    ));
                 return $this->redirect($url);
                break;
            case 6:
                $url = $this->get('router')->generate('LoveLetter_platform_Roi', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant,
                    ));
                 return $this->redirect($url);
                break;
            case 7:
                $url = $this->get('router')->generate('LoveLetter_platform_Comtesse', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant,
                     ));
                 return $this->redirect($url);
                break;
            case 8:
                $url = $this->get('router')->generate('LoveLetter_platform_Princesse', array(
                     'id_manche' => $id_manchebis,
                     'nb_joueur' => $nbJoueurJouant,
                        ));
                 return $this->redirect($url);
                break;
        }
    }
    
    public function GardeAction(Request $id_manche, Request $nb_joueur){
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       $ListeJoueur = $mancheEnCour->getJoueur();
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
           if($nbJoueur != $nbJoueurJouant && !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
            $liste[]=$nbJoueur;
           }
       }

        return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'Liste' => $liste,
        'action' => "GardeChoix",
        ));
    }

    public function GardeChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
        $em = $this->getDoctrine()->getManager();
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);
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
            
    public function GardeChoix2Action(Request $id_manche, Request $nb_joueur, Request $id_carte, Request $choixJoueur){

        $em = $this->getDoctrine()->getManager();
        //Recuperation de la manche
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);

        $ListeJoueur = $mancheEnCour->getJoueur();
        $nbjoueur = $nb_joueur->query->get('nb_joueur');      
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
            
    public function PretreAction(Request $id_manche, Request $nb_joueur){
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       $ListeJoueur = $mancheEnCour->getJoueur();
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
           if($nbJoueur != $nbJoueurJouant && !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
            $liste[]=$nbJoueur;
           }
       }

        return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'Liste' => $liste,
        'action' => "PretreChoix",
        ));
    }
    
    public function PretreChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
         $em = $this->getDoctrine()->getManager();
        //recuperation de l'id_manche
        $id_manchebis = $id_manche->query->get('id_manche');
        //recuperation de repository des manches
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');

        //recuperation de la class manche en cour
        $mancheEnCour = $repositoryManche->find($id_manchebis);
                   
        //recuperation de la liste des joueurs participant a la manche
        $ListeJoueur = $mancheEnCour->getJoueur();
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');
        $nbJoueurChoisie = $choixJoueur->query->get('choixJoueur');
        $repositoryCarte = $em->getRepository('LoveLetterPlatformBundle:Carte');

        $carte = $ListeJoueur[$nbJoueurChoisie-1]->getCarteMain();
        $carteAffichage = $repositoryCarte->find($carte[0]);
        
        return $this->render('LoveLetterPlatformBundle:Jeu:Pretre.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'tour_De' => $mancheEnCour->getTourDe(),
        'carte' => $carteAffichage,
        ));
    }

    public function BaronAction(Request $id_manche, Request $nb_joueur){
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       $ListeJoueur = $mancheEnCour->getJoueur();
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
           if($nbJoueur != $nbJoueurJouant && !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
            $liste[]=$nbJoueur;
           }
       }

        return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'Liste' => $liste,
        'action' => "BaronChoix",
        ));
    }
        
    public function BaronChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
       $em = $this->getDoctrine()->getManager();
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $ListeJoueur = $mancheEnCour->getJoueur();
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');   
       $nbJoueurChoisi = $choixJoueur->query->get('choixJoueur');
        $ListeCarteJ1 = $ListeJoueur[$nbJoueurJouant-1]->getCarteMain();
        $ListeCarteJ2 = $ListeJoueur[$nbJoueurChoisi-1]->getCarteMain();
        if($ListeCarteJ1[0]<$ListeCarteJ2[0]){
            array_shift($ListeCarteJ1);
            $ListeJoueur[$nbJoueurJouant-1]->setCarteMain($ListeCarteJ1);
            $em->persist($ListeJoueur[$nbJoueurJouant-1]);
        }
        elseif($ListeCarteJ1[0]>$ListeCarteJ2[0]){
            array_shift($ListeCarteJ2);
            $ListeJoueur[$nbJoueurChoisi-1]->setCarteMain($ListeCarteJ2);
            $em->persist($ListeJoueur[$nbJoueurChoisi-1]);
        }        
        $em->flush();
        
         $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $mancheEnCour->getId(),
            'nb_joueur' => $nbJoueurJouant,
            ));
        return $this->redirect($url);
    }
    
    public function ServanteAction(Request $id_manche, Request $nb_joueur){
        $em = $this->getDoctrine()->getManager();
        $id_manchebis = $id_manche->query->get('id_manche');
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');   
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $mancheEnCour = $repositoryManche->find($id_manchebis);
        $proteger = $mancheEnCour->getProteger();
        if(empty($proteger)){
            $newtab = array($nbJoueurJouant);
        }
        else{
            $newtab = array($proteger, $nbJoueurJouant);
        }
        $mancheEnCour->setProteger($newtab);
        $em->persist($mancheEnCour);
        $em->flush();
        $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $mancheEnCour->getId(),
            'nb_joueur' => $nbJoueurJouant,
            ));
        return $this->redirect($url);
    }
    
    public function PrinceAction(Request $id_manche, Request $nb_joueur){
       $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       $ListeJoueur = $mancheEnCour->getJoueur();
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
           if($nbJoueur != $nbJoueurJouant && !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
             $liste[]=$nbJoueur;
           }
       }
       
        return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'Liste' => $liste,
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
    
    public function RoiAction(Request $id_manche, Request $nb_joueur){
        $id_manchebis = $id_manche->query->get('id_manche');
       $repositoryManche = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Manche');
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
       $ListeJoueur = $mancheEnCour->getJoueur();
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
           if($nbJoueur != $nbJoueurJouant && !in_array($nbJoueur, $proteger) && !in_array($nbJoueur, $perdu)){
            $liste[]=$nbJoueur;
           }
       }

        return $this->render('LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $nbJoueurJouant,
        'Liste' => $liste,
        'action' => "RoiChoix",
        ));
    }
    
    public function RoiChoixAction(Request $id_manche, Request $nb_joueur, Request $choixJoueur){
        $em = $this->getDoctrine()->getManager();
        $id_manchebis = $id_manche->query->get('id_manche');
        $repositoryManche = $em->getRepository('LoveLetterPlatformBundle:Manche');
        $mancheEnCour = $repositoryManche->find($id_manchebis);
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');    
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
    
    public function ComtesseAction(Request $id_manche, Request $nb_joueur){
        $id_manchebis = $id_manche->query->get('id_manche');
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');   
        $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $id_manchebis,
            'nb_joueur' => $nbJoueurJouant,
            ));
        return $this->redirect($url);
    }
    
    public function PrincesseAction(Request $id_manche, Request $nb_joueur){
        $id_manchebis = $id_manche->query->get('id_manche');
        $nbJoueurJouant = $nb_joueur->query->get('nb_joueur');   
        $url = $this->get('router')->generate('LoveLetter_platform_TestFin', array(
            'id_manche' => $id_manchebis,
            'nb_joueur' => $nbJoueurJouant,
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
