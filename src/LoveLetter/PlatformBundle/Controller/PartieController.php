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
            'id_partie' => $partie->getId(),
            'id_manche' => 1));
        return $this->redirect($url);
    }
       
    public function DebutMancheAction(Request $id_partie,Request $id_manche){
        $id_partiebis = $id_partie->query->get('id_partie');
        $id_manchebis = $id_manche->query->get('id_manche');
        
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Partie');
     
        $partie = $repository->find($id_partiebis);
        
        //Création d'une nouvelle manche 
        $manche = new Manche;
        $manche->setPartie($partie);
        $manche->setIdManche($id_manchebis);
        
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
        
        return new Response("hello");
        //Redirection vers DebutJeuAction pour créer la première manche
        $url = $this->get('router')->generate('LoveLetter_platform_Debut/Partie', array(
            'id_partie' => $partie->getId(),
            'id_manche' => 1));
        return $this->redirect($url);
    }
        
    
    public function DistributionCarteAction(Request $id_partie, Request $id_manche)
    {
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Utilisateur');

        $listUtilisateur = $repository->findAll();

        foreach ($listUtilisateur as $Utilisateur) {
          // $advert est une instance de Advert
          echo $Utilisateur->getContent();
        }
    }
    
    public function DebutJeuAction()
    {
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('LoveLetterPlatformBundle:Carte');
     
        $url = $repository->find(1);
        $url2= $repository->find(8);
        
        return $this->render('LoveLetterPlatformBundle:Jeu:plateauDeJeu.html.twig', array(
        'id'=>$id, 
        'id1' => $url->getId(), 
        'id2' => $url2->getId(),
        'url' => $url->getUrl(),
        'url2' => $url2->getUrl()));
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
