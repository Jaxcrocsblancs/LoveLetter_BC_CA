<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // LoveLetter_platform_index
        if ($pathinfo === '/index') {
            return array (  '_controller' => 'LoveLetterPlatformBundle:Advert:index',  '_route' => 'LoveLetter_platform_index',);
        }

        // LoveLetter_platform_accueil
        if ($pathinfo === '/accueil') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\HomeController::AccueilAction',  '_route' => 'LoveLetter_platform_accueil',);
        }

        // LoveLetter_platform_jeu
        if (0 === strpos($pathinfo, '/Partie') && preg_match('#^/Partie(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'LoveLetter_platform_jeu')), array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::DebutJeuAction',  'id' => 0,));
        }

        // LoveLetter_platform_initialisation
        if ($pathinfo === '/Initialisation') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::RemplisageTableCarteAction',  '_route' => 'LoveLetter_platform_initialisation',);
        }

        if (0 === strpos($pathinfo, '/Utilisateur')) {
            // LoveLetter_platform_UtilisateurCreerPartie
            if ($pathinfo === '/UtilisateurCreerPartie') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::UtilisateurCreerPartieAction',  '_route' => 'LoveLetter_platform_UtilisateurCreerPartie',);
            }

            // LoveLetter_platform_UtilisateurRejoinsPartie
            if ($pathinfo === '/UtilisateurRejoinsPartie') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::UtilisateurRejoinsPartieAction',  '_route' => 'LoveLetter_platform_UtilisateurRejoinsPartie',);
            }

        }

        // LoveLetter_platform_CreationPartie
        if (0 === strpos($pathinfo, '/LancementPartie') && preg_match('#^/LancementPartie/(?P<nom>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'LoveLetter_platform_CreationPartie')), array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::CreationPartieAction',));
        }

        if (0 === strpos($pathinfo, '/D')) {
            // LoveLetter_platform_DebutManche
            if ($pathinfo === '/DebutManche') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::DebutMancheAction',  '_route' => 'LoveLetter_platform_DebutManche',);
            }

            // LoveLetter_platform_DistributionCarte
            if ($pathinfo === '/DistributionCarte') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::DistributionCarteAction',  '_route' => 'LoveLetter_platform_DistributionCarte',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
