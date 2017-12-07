<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // LoveLetter_platform_index
        if ($pathinfo === '/index') {
            return array (  '_controller' => 'LoveLetterPlatformBundle:Advert:index',  '_route' => 'LoveLetter_platform_index',);
        }

        // LoveLetter_platform_accueil
        if ($pathinfo === '/accueil') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\HomeController::AccueilAction',  '_route' => 'LoveLetter_platform_accueil',);
        }

        // LoveLetter_platform_AffichageJeu
        if ($pathinfo === '/Partie') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::AffichageJeuAction',  '_route' => 'LoveLetter_platform_AffichageJeu',);
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

        // LoveLetter_platform_TirerCarte
        if ($pathinfo === '/TirerCarte') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::TirerCarteAction',  '_route' => 'LoveLetter_platform_TirerCarte',);
        }

        // LoveLetter_platform_Choix
        if ($pathinfo === '/Choix') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::ChoixAction',  '_route' => 'LoveLetter_platform_Choix',);
        }

        if (0 === strpos($pathinfo, '/Garde')) {
            // LoveLetter_platform_Garde
            if ($pathinfo === '/Garde') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::GardeAction',  '_route' => 'LoveLetter_platform_Garde',);
            }

            // LoveLetter_platform_GardeChoix
            if ($pathinfo === '/GardeChoix') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::GardeChoixAction',  '_route' => 'LoveLetter_platform_GardeChoix',);
            }

        }

        // LoveLetter_platform_Pretre
        if ($pathinfo === '/Pretre') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::PretreAction',  '_route' => 'LoveLetter_platform_Pretre',);
        }

        // LoveLetter_platform_Baron
        if ($pathinfo === '/Baron') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::BaronAction',  '_route' => 'LoveLetter_platform_Baron',);
        }

        // LoveLetter_platform_Servante
        if ($pathinfo === '/Servante') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::ServanteAction',  '_route' => 'LoveLetter_platform_Servante',);
        }

        if (0 === strpos($pathinfo, '/Prince')) {
            // LoveLetter_platform_Prince
            if ($pathinfo === '/Prince') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::PrinceAction',  '_route' => 'LoveLetter_platform_Prince',);
            }

            // LoveLetter_platform_PrinceChoix
            if ($pathinfo === '/PrinceChoix') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::PrinceChoixAction',  '_route' => 'LoveLetter_platform_PrinceChoix',);
            }

        }

        if (0 === strpos($pathinfo, '/Roi')) {
            // LoveLetter_platform_Roi
            if ($pathinfo === '/Roi') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::RoiAction',  '_route' => 'LoveLetter_platform_Roi',);
            }

            // LoveLetter_platform_RoiChoix
            if ($pathinfo === '/RoiChoix') {
                return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::RoiChoixAction',  '_route' => 'LoveLetter_platform_RoiChoix',);
            }

        }

        // LoveLetter_platform_Comtesse
        if ($pathinfo === '/Comtesse') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::ComtesseAction',  '_route' => 'LoveLetter_platform_Comtesse',);
        }

        // LoveLetter_platform_Princesse
        if ($pathinfo === '/Princesse') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::PrincesseAction',  '_route' => 'LoveLetter_platform_Princesse',);
        }

        // LoveLetter_platform_TestFin
        if ($pathinfo === '/TestFin') {
            return array (  '_controller' => 'LoveLetter\\PlatformBundle\\Controller\\PartieController::TestFinAction',  '_route' => 'LoveLetter_platform_TestFin',);
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _demo_security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_demo_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
