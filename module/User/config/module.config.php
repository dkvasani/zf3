<?php

namespace User;

use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'controllers' => [
        'factories' => [
            Controller\RegistrationController::class => Controller\Factory\RegistrationControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\UserManager::class => Service\Factory\UserManagerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'user' => [
                'type' => 'Literal',
                'options' => [
                    // Change this to something specific to your module
                    'route' => '/user/register',
                    'defaults' => [
                        'controller' => Controller\RegistrationController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                // You can place additional routes that match under the
                // route defined above here.
                ],
            ],
            'user-review' => [
                'type' => 'Literal',
                'options' => [
                    // Change this to something specific to your module
                    'route' => '/user/review',
                    'defaults' => [
                        'controller' => Controller\RegistrationController::class,
                        'action' => 'review',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                // You can place additional routes that match under the
                // route defined above here.
                ],
            ],
            'demo' => [
                'type' => 'Literal',
                'options' => [
                    // Change this to something specific to your module
                    'route' => '/user/demo',
                    'defaults' => [
                        'controller' => Controller\RegistrationController::class,
                        'action' => 'demo',
                        'isauth' => true,
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                // You can place additional routes that match under the
                // route defined above here.
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'User' => __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ],
];
