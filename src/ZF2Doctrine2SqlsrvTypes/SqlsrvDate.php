<?php
namespace ZF2Doctrine2SqlsrvTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Own Date type for the SqlsrvDate connection
 *
 * @package ZF2Doctrine2SqlsrvTypes
 * @author  Magnus Buk <MagnusBuk@gmx.de>
 */
class SqlsrvDate extends Type
{
    /**
     *
     */
    const NAME = 'SqlsrvDate';

    /**
     * @param array            $fieldDeclaration
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'Date';
    }

    /**
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return \DateTime|null
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (strtotime($value)) {
            return new \DateTime($value);
        }
        return null;
    }

    /**
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return null|string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof \DateTime) {
            return $value->format('d.m.Y');
        }
        return null;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }
}
