<?php

namespace ZF2Doctrine2SqlsrvTypesTests;

use Doctrine\DBAL\Types\Type;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Bootstrap class for the unit tests
 *
 * @package ZF2Doctrine2SqlsrvTypesTests
 * @author Magnus Buk <MagnusBuk@gmx.de>
 */
class Bootstrap
{
    /**
     * Add the DBAL Types for usage in the unit tests
     *
     * @access public
     * @return void
     */
    public static function init()
    {
        if (!Type::hasType('SqlsrvDatetime')) {
            Type::addType('SqlsrvDatetime', 'ZF2Doctrine2SqlsrvTypes\SqlsrvDatetime');
        }
        if (!Type::hasType('SqlsrvDate')) {
            Type::addType('SqlsrvDate', 'ZF2Doctrine2SqlsrvTypes\SqlsrvDate');
        }
    }
}

// Start bootstrapping
Bootstrap::init();