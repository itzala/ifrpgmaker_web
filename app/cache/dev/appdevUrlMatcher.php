<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // _wdt
        if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_info
            if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::infoAction',)), array('_route' => '_profiler_info'));
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_phpinfo
            if ($pathinfo === '/_profiler/phpinfo') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::phpinfoAction',  '_route' => '_profiler_phpinfo',);
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

            // _profiler_redirect
            if (rtrim($pathinfo, '/') === '/_profiler') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_profiler_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => '_profiler_search_results',  'token' => 'empty',  'ip' => '',  'url' => '',  'method' => '',  'limit' => '10',  '_route' => '_profiler_redirect',);
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
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // contraintes_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\ContraintesBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'contraintes_homepage'));
        }

        if (0 === strpos($pathinfo, '/personnage')) {
            // personnage
            if (rtrim($pathinfo, '/') === '/personnage') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'personnage');
                }

                return array (  '_controller' => 'PersoBundle:Personnage:index',  '_route' => 'personnage',);
            }

            // personnage_show
            if (preg_match('#^/personnage/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'PersoBundle:Personnage:show',)), array('_route' => 'personnage_show'));
            }

            // personnage_new
            if ($pathinfo === '/personnage/new') {
                return array (  '_controller' => 'PersoBundle:Personnage:new',  '_route' => 'personnage_new',);
            }

            // personnage_create
            if ($pathinfo === '/personnage/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_personnage_create;
                }

                return array (  '_controller' => 'PersoBundle:Personnage:create',  '_route' => 'personnage_create',);
            }
            not_personnage_create:

            // personnage_edit
            if (preg_match('#^/personnage/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'PersoBundle:Personnage:edit',)), array('_route' => 'personnage_edit'));
            }

            // personnage_update
            if (preg_match('#^/personnage/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_personnage_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'PersoBundle:Personnage:update',)), array('_route' => 'personnage_update'));
            }
            not_personnage_update:

            // personnage_delete
            if (preg_match('#^/personnage/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_personnage_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'PersoBundle:Personnage:delete',)), array('_route' => 'personnage_delete'));
            }
            not_personnage_delete:

        }

        // dialogue_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\DialogueBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'dialogue_homepage'));
        }

        // actions_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActionsBundle:Default:index',)), array('_route' => 'actions_homepage'));
        }

        // site_accueil
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'site_accueil');
            }

            return array (  '_controller' => 'IfRPGMaker\\SiteBundle\\Controller\\SiteController::indexAction',  '_route' => 'site_accueil',);
        }

        if (0 === strpos($pathinfo, '/histoire')) {
            if (0 === strpos($pathinfo, '/histoire/event')) {
                // liste_evenement
                if ($pathinfo === '/histoire/event/index') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\EvenementController::indexAction',  '_route' => 'liste_evenement',);
                }

                // new_evenement
                if ($pathinfo === '/histoire/event/new') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\EvenementController::newAction',  '_route' => 'new_evenement',);
                }

                // edit_evenement
                if ($pathinfo === '/histoire/event/edit') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\EvenementController::editAction',  '_route' => 'edit_evenement',);
                }

                // delete_evenement
                if ($pathinfo === '/histoire/event/delete') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\EvenementController::deleteAction',  '_route' => 'delete_evenement',);
                }

            }

            if (0 === strpos($pathinfo, '/histoire/choix')) {
                // liste_choix
                if ($pathinfo === '/histoire/choix/index') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\ChoixController::indexAction',  '_route' => 'liste_choix',);
                }

                // new_choix
                if ($pathinfo === '/histoire/choix/new') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\ChoixController::newAction',  '_route' => 'new_choix',);
                }

                // edit_choix
                if ($pathinfo === '/histoire/choix/edit') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\ChoixController::editAction',  '_route' => 'edit_choix',);
                }

                // delete_choix
                if ($pathinfo === '/histoire/choix/delete') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\ChoixController::deleteAction',  '_route' => 'delete_choix',);
                }

                // choix_show
                if (preg_match('#^/histoire/choix/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\ChoixController::showAction',)), array('_route' => 'choix_show'));
                }

            }

            if (0 === strpos($pathinfo, '/histoire/description')) {
                // description
                if (rtrim($pathinfo, '/') === '/histoire/description') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'description');
                    }

                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\DescriptionController::indexAction',  '_route' => 'description',);
                }

                // description_show
                if (preg_match('#^/histoire/description/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\DescriptionController::showAction',)), array('_route' => 'description_show'));
                }

                // description_new
                if ($pathinfo === '/histoire/description/new') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\DescriptionController::newAction',  '_route' => 'description_new',);
                }

                // description_create
                if ($pathinfo === '/histoire/description/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_description_create;
                    }

                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\DescriptionController::createAction',  '_route' => 'description_create',);
                }
                not_description_create:

                // description_edit
                if (preg_match('#^/histoire/description/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\DescriptionController::editAction',)), array('_route' => 'description_edit'));
                }

                // description_update
                if (preg_match('#^/histoire/description/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_description_update;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\DescriptionController::updateAction',)), array('_route' => 'description_update'));
                }
                not_description_update:

                // description_delete
                if (preg_match('#^/histoire/description/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_description_delete;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\DescriptionController::deleteAction',)), array('_route' => 'description_delete'));
                }
                not_description_delete:

            }

            if (0 === strpos($pathinfo, '/histoire/intro')) {
                // intro
                if (rtrim($pathinfo, '/') === '/histoire/intro') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'intro');
                    }

                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\IntroController::indexAction',  '_route' => 'intro',);
                }

                // intro_show
                if (preg_match('#^/histoire/intro/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\IntroController::showAction',)), array('_route' => 'intro_show'));
                }

                // intro_new
                if ($pathinfo === '/histoire/intro/new') {
                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\IntroController::newAction',  '_route' => 'intro_new',);
                }

                // intro_create
                if ($pathinfo === '/histoire/intro/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_intro_create;
                    }

                    return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\IntroController::createAction',  '_route' => 'intro_create',);
                }
                not_intro_create:

                // intro_edit
                if (preg_match('#^/histoire/intro/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\IntroController::editAction',)), array('_route' => 'intro_edit'));
                }

                // intro_update
                if (preg_match('#^/histoire/intro/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_intro_update;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\IntroController::updateAction',)), array('_route' => 'intro_update'));
                }
                not_intro_update:

                // intro_delete
                if (preg_match('#^/histoire/intro/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_intro_delete;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\IntroController::deleteAction',)), array('_route' => 'intro_delete'));
                }
                not_intro_delete:

            }

            // histoire_index
            if ($pathinfo === '/histoire/liste') {
                return array (  '_controller' => 'IfRPGMaker\\HistoireBundle\\Controller\\HistoireController::indexAction',  '_route' => 'histoire_index',);
            }

        }

        // fos_user_security_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
        }

        // fos_user_security_check
        if ($pathinfo === '/login_check') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
        }

        // fos_user_security_logout
        if ($pathinfo === '/logout') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/register')) {
            // fos_user_registration_register
            if (rtrim($pathinfo, '/') === '/register') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
            }

            // fos_user_registration_check_email
            if ($pathinfo === '/register/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
            }
            not_fos_user_registration_check_email:

            // fos_user_registration_confirm
            if (0 === strpos($pathinfo, '/register/confirm') && preg_match('#^/register/confirm/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirm;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',)), array('_route' => 'fos_user_registration_confirm'));
            }
            not_fos_user_registration_confirm:

            // fos_user_registration_confirmed
            if ($pathinfo === '/register/confirmed') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirmed;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
            }
            not_fos_user_registration_confirmed:

        }

        if (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ($pathinfo === '/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',)), array('_route' => 'fos_user_resetting_reset'));
            }
            not_fos_user_resetting_reset:

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        // joueurs_index
        if ($pathinfo === '/joueurs/liste') {
            return array (  '_controller' => 'IfRPGMaker\\UserBundle\\Controller\\JoueurController::indexAction',  '_route' => 'joueurs_index',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
