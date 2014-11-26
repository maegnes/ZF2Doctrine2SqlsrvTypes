<?php

namespace ZF2Doctrine2SqlsrvTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Own DateTime type for the SqlsrvDatetime connection
 *
 * @package ZF2Doctrine2SqlsrvTypes
 * @author  Magnus Buk MagnusBuk@gmx.de
 */
class SqlsrvDatetime extends Type
{

    const NAME = 'SqlsrvDatetime';

    /**
     * @param array            $fieldDeclaration
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'Datetime';
    }

    /**
     * Converts the database value back to a php datetime object
     *
     * @access public
     *
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return \DateTime|mixed|null
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (strtotime($value)) {
            return new \DateTime($value);
        }
        return null;
    }

    /**
     * Returns the DateTime object to a SqlSrv friendly string (d.m.Y H:i:s)
     *
     * @access public
     *
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return mixed|null|string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof \DateTime) {
            return $value->format('d.m.Y H:i:s');
        }
        return null;
    }

    /**
     * Returns the name of the DBAL type
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }
}
