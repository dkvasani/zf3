<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User;

use Zend\Mvc\MvcEvent;
use Zend\Session\SessionManager;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
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
