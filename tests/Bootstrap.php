<?php

namespace ZF2Doctrine2SqlsrvTypesTests;

use Doctrine\DBAL\Types\Type;

class Bootstrap
{
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
/**
 * Start bootstrapping
 */
Bootstrap::init();