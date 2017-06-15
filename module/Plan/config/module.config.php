<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 13/06/2017
 * Time: 11:22
 */

namespace Plan;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'update' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/update/',
                    'defaults' => [
                        'controller'    => UpdateController::class,
                    ],
                ],
            ],
            'plan' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/plan/[/:planid/:page]',
                    'constraints' => [
                        'planid'     => '[a-zA-Z0-9_-]*',
                        'page'   => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller'    => PlanController::class,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            UpdateController::class => Factory\Controller\Update::class,
            PlanController::class => Factory\Controller\Plan::class,
        ],
    ],

    'service_manager' => [
        'factories' => [
            Service\Plan::class => Factory\Service\Plan::class,
        ],
    ],

    'strategies' => array(
        'ViewJsonStrategy',
    ),

    'doctrine' => [
        'driver' => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            __NAMESPACE__ .'_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Plan/Entity'],
            ],

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default'             => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
    ],
];