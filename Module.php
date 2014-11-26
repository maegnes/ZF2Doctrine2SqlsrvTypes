<?php

namespace ZF2Doctrine2SqlsrvTypes;

use Doctrine\DBAL\Types\Type;
use Zend\Mvc\MvcEvent;

/**
 * Module.php for the main application module
 *
 * @package ZF2Doctrine2SqlsrvTypes
 * @author Magnus Buk MagnusBuk@gmx.de
 */
class Module
{

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * Add the custom DBAL types
     *
     * @access public
     * @param MvcEvent $e
     * @return void
     */
    public function onBootstrap(MvcEvent $e)
    {
        if (!Type::hasType('SqlsrvDatetime')) {
            Type::addType('SqlsrvDatetime', 'ZF2Doctrine2SqlsrvTypes\SqlsrvDatetime');
        }
        if (!Type::hasType('SqlsrvDate')) {
            Type::addType('SqlsrvDate', 'ZF2Doctrine2SqlsrvTypes\SqlsrvDatetime');
        }
    }
}
