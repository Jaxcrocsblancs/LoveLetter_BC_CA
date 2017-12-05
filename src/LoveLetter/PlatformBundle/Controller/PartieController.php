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
        $id_partiebis = $id_partie->query->get('id_partie');
        
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Partie');
     
        $partie = $repository->find($id_partiebis);
        
        //Création d'une nouvelle manche 
        $manche = new Manche;
        $manche->setPartie($partie);
        
        //Creation de la pioche
        $pioche = array(1,1,1,1,1,2,2,3,3,4,4,5,5,6,7,8);
        shuffle($pioche);
        $manche->setPioche($pioche);

         // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        
        // Étape 1 : On « persiste » l'entité
        $em->persist($manche);
        
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();
        
        //Redirection vers DebutJeuAction pour créer la première manche
        $url = $this->get('router')->generate('LoveLetter_platform_DistributionCarte', array(
            'id_manche' => $manche->getId()));
        return $this->redirect($url);
    }
        
    
    public function DistributionCarteAction(Request $id_manche)
    {
        $id_manchebis = $id_manche->query->get('id_manche');
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Manche');

       $mancheEnCour = $repository->find($id_manchebis);
       
       $partie = $mancheEnCour->getPartie();
       $ListeJoueur = $partie->getJoueur();
       
       $repositoryCarte = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Carte');
  
       $pioche = $mancheEnCour->getPioche();
     
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
        
        foreach ($ListeJoueur as $Joueur) {
            $carte= $repositoryCarte->find($pioche[0]);
            $Joueur->addCarteMain($carte);
            // Étape 1 : On « persiste » l'entité 
            $em->persist($Joueur);
            array_shift($pioche);
        }

        $mancheEnCour->setPioche($pioche);
        $em->persist($mancheEnCour);
        
        $em->flush();
         // Étape 2 : On « flush » tout ce qui a été persisté avant
        
        $url = $this->get('router')->generate('LoveLetter_platform_TirerCarte', array(
            'id_manche' => $mancheEnCour->getId(),
            'id_joueur' => $ListeJoueur[0]->getId()));
        return $this->redirect($url);
    }
    
    public function AffichageJeuAction(Request $id_manche, Request $id_joueur)
    {
        //recuperation de l'id_manche
        $id_manchebis = $id_manche->query->get('id_manche');
        //recuperation de repository des manches
        $repositoryManche = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Manche');

        //recuperation de la class manche en cour
         $mancheEnCour = $repositoryManche->find($id_manchebis);
       
        //recuperation de la liste des joueurs participant a la manche
        $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
        $id_joueurbis = $id_joueur->query->get('id_joueur');
        if($ListeJoueur[0]->getId() == $id_joueurbis) {
            $ListeCarteJ1 =$ListeJoueur[0]->getCarteMain();
            $carte1J1 = $ListeCarteJ1[0];
            $ListeCarteJ2 =$ListeJoueur[1]->getCarteMain();
            $carte1J2 = $ListeCarteJ2[1];
        }
        else{
            $ListeCarteJ1 =$ListeJoueur[1]->getCarteMain();
            $carte1J1 = $ListeCarteJ1[1];
            $ListeCarteJ2 =$ListeJoueur[0]->getCarteMain();
            $carte1J2 = $ListeCarteJ2[0];
        }

        //envoi sur l'affichage du jeu
        return $this->render('LoveLetterPlatformBundle:Jeu:plateauDeJeu.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $id_joueur,
        'liste_cartesJ1' => $ListeCarteJ1,
        'liste_cartesJ2' => $ListeCarteJ2,
        ));
    }
    
    public function TirerCarteAction(Request $id_manche, Request $id_joueur){
        $em = $this->getDoctrine()->getManager();
        $repositoryManche = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
       $mancheEnCour = $repositoryManche->find($id_manchebis);
       
        $repositoryJoueur= $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Joueur');
        
        $id_joueurbis = $id_joueur->query->get('id_joueur');
        $Joueur= $repositoryJoueur->find($id_joueurbis);
        
        $repositoryCarte = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Carte');
  
        $pioche = $mancheEnCour->getPioche();
       
        $carte= $repositoryCarte->find($pioche[0]);
        $Joueur->addCarteMain($carte);
        array_shift($pioche);
        
        $mancheEnCour->setPioche($pioche);
        
        $em->persist($mancheEnCour);
  
        $carteMain = $Joueur->getCarteMain();
        if($carteMain[0]->getNombre()==7){
            if($carteMain[1]->getNombre()==6 || $carteMain[1]->getNombre()==5){
                $Joueur->addCarteJouer($carteMain[1]);
                $Joueur->removeCarteMain($carteMain[1]);
            }
        }
        if($carteMain[1]->getNombre()==7){
            if($carteMain[0]->getNombre()==6 || $carteMain[0]->getNombre()==5){
                $Joueur->addCarteJouer($carteMain[0]);
                $Joueur->removeCarteMain($carteMain[0]);    
               }
        }
        
        $em->persist($Joueur);
        $em->flush();
        
        $url = $this->get('router')->generate('LoveLetter_platform_AffichageJeu', array(
            'id_manche' => $mancheEnCour->getId(),
            'id_joueur' => $Joueur->getId()));
        return $this->redirect($url);
    }
    
    public function ChoixAction(Request $id_manche, Request $id_joueur, Request $numCarteChoisi){
        $em = $this->getDoctrine()->getManager();
        $repositoryCarte = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Carte');
        
        $id_carteJouer = $numCarteChoisi->query->get('numCarteChoisi');
        $carteJouer =$repositoryCarte->find($id_carteJouer);
        
        $repositoryJoueur = $this->getDoctrine()->getManager()->getRepository('LoveLetterPlatformBundle:Joueur');
        $id_joueurbis = $id_joueur->query->get('id_joueur');    
        $joueur = $repositoryJoueur->find($id_joueurbis);
        
       
        $joueur->addCarteJouer($carteJouer);
        $joueur->removeCarteMain($carteJouer);
        $em->persist($joueur);
        $em->flush();
        
        $id_manchebis = $id_manche->query->get('id_manche');    
        
        //revoie sur bon action 
        $url = $this->get('router')->generate('LoveLetter_platform_AffichageJeu', array(
            'id_manche' => $id_manchebis,
            'id_joueur' => $joueur->getId()));
        return $this->redirect($url);
    }
    
    
    public function Action1Action(Request $id_manche, Request $id_joueur){
        $repositoryManche = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Manche');
        $id_manchebis = $id_manche->query->get('id_manche');    
        $mancheEnCour = $repositoryManche->find($id_manchebis);

        $partie = $mancheEnCour->getPartie();
        $ListeJoueur = $partie->getJoueur();
        $ListeCarteJ1 =$ListeJoueur[0]->getCarteMain();
        $ListeCarteJ2 =$ListeJoueur[1]->getCarteMain();
        
        $repositoryCarte = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Carte');
        
        $ListeCarte[0] = $repositoryCarte->find(2);
        $ListeCarte[1] = $repositoryCarte->find(3);
        $ListeCarte[2] = $repositoryCarte->find(4);
        $ListeCarte[3] = $repositoryCarte->find(5);
        $ListeCarte[4] = $repositoryCarte->find(6);
        $ListeCarte[5] = $repositoryCarte->find(7);
        $ListeCarte[6] = $repositoryCarte->find(8);
        
        return $this->render('LoveLetterPlatformBundle:Jeu:garde.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $id_joueur,
        'liste_cartesJ1' => $ListeCarteJ1,
        'liste_cartesJ2' => $ListeCarteJ2,
        'liste_cartes' => $ListeCarte
        ));  
    }
    
    public function GardeAction(Request $id_manche, Request $id_joueur, Request $id_carte){
        return new Response("lol");
    }
    
    public function Action2Action(Request $id_manche, Request $id_joueur){
        $id_manchebis = $id_manche->query->get('id_manche');
         $repositoryManche = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Manche');

       $mancheEnCour = $repositoryManche->find($id_manchebis);
       
       $ListeJoueur = $mancheEnCour->getPartie()->getJoueur();
        $id_joueurbis = $id_joueur->query->get('id_joueur');
        if($ListeJoueur[0]->getId() == $id_joueurbis) {
            $ListeCarteJ1 =$ListeJoueur[0]->getCarteMain();
            $carte1J1 = $ListeCarteJ1[0];
            $ListeCarteJ2 =$ListeJoueur[1]->getCarteMain();
            $carte1J2 = $ListeCarteJ2[1];
        }
        else{
            $ListeCarteJ1 =$ListeJoueur[1]->getCarteMain();
            $carte1J1 = $ListeCarteJ1[1];
            $ListeCarteJ2 =$ListeJoueur[0]->getCarteMain();
            $carte1J2 = $ListeCarteJ2[0];
        }

        return $this->render('LoveLetterPlatformBundle:Jeu:Pretre.html.twig', array(
        'id' => $mancheEnCour->getId(), 
        'joueur' => $id_joueur,
        'liste_cartesJ1' => $ListeCarteJ1,
        'liste_cartesJ2' => $ListeCarteJ2,
        ));
        
    }
    
    
    //Test si la manche est fini
    public function TestFinAction(){
        //Different test de fin de partie a faire a chaque fin de tour de jeu de chaque joueur
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
