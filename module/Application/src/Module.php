<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\MvcEvent;
use Zend\Session\SessionManager;

class Module
{

    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     *
     * @param MvcEvent $event Zf3 MVC Event
     */
    public function onBootstrap(MvcEvent $event)
    {
        $application = $event->getApplication();
        $serviceManager = $application->getServiceManager();

        // The following line instantiates the SessionManager and automatically
        // makes the SessionManager the 'default' one.
        $sessionManager = $serviceManager->get(SessionManager::class);
    }

    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'User\Controller\Registration' => function(ControllerManager $cm) {
                    $sm = $cm->getServiceLocator();
                    $depA = $sm->get('LoginLogoutService');
                    $controller = new RegistrationController($depA);
                    return $controller;
                },
            ),
        );
    }
}
