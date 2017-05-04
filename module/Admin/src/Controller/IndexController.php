<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        return [];
    }

    public function loginAction()
    {
        $sessionContainer = new Container('UserRegistration', $sessionManager);
        $sessionContainer = $container->get('ContainerNamespace');
        return [];
    }
}
