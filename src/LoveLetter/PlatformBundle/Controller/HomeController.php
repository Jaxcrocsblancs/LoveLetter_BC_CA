<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace LoveLetter\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use LoveLetter\PlatformBundle\Entity\Utilisateur;


class HomeController extends Controller
{
    public function AccueilAction()
    {
        return $this->render('LoveLetterPlatformBundle:Advert:accueil.html.twig');
    }
    
    public function addAction(){
         // On crée un objet Advert
         // create a task and give it some dummy data for this example
        $Utilisateur = new Utilisateur();

        $form = $this->createFormBuilder($Utilisateur)
                ->add('pseudo')
                ->add('mdp')
                ->getForm();
/*
        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder($utilisateur);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
          ->add('pseudo')
          ->add('mots de passe')
        ;
        // Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();
*/
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
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