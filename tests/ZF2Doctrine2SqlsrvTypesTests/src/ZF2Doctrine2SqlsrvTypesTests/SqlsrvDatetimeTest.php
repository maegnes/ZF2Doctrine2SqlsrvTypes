<?php

namespace ZF2Doctrine2SqlsrvTypesTests;

use Doctrine\DBAL\Types\Type;
use ZF2Doctrine2SqlsrvTypes\SqlsrvDatetime;

/**
 * Test class for the own db type SqlsrvDatetime
 *
 * @package ZF2Doctrine2SqlsrvTypesTests
 * @author Magnus Buk <MagnusBuk@gmx.de>
 */
class SqlsrvDatetimeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SqlsrvDatetime
     */
    public $sqlSrvDatetime = null;

    /**
     * @var null
     */
    public $platform = null;

    /**
     * set up object and abstract platform
     */
    public function setUp()
    {
        $this->sqlSrvDatetime = Type::getType('SqlsrvDatetime');
        $this->platform = $this->getMockBuilder('Doctrine\DBAL\Platforms\AbstractPlatform')->getMockForAbstractClass();
    }

    /**
     * Test if the correct instance of our own type is returned
     */
    public function testIfCorrectInstanceisReturned()
    {
        $this->assertInstanceOf('ZF2Doctrine2SqlsrvTypes\SqlsrvDatetime', $this->sqlSrvDatetime);
    }

    /**
     * Test the correct sql declaration
     */
    public function testCorrectSqlDeclaration()
    {
        $this->assertEquals('Datetime', $this->sqlSrvDatetime->getSqlDeclaration(array(), $this->platform));
    }

    /**
     * Test the correct string to datetime conversion
     */
    public function testConvertToPHPValue()
    {
        $returnValue = $this->sqlSrvDatetime->convertToPHPValue('01.01.2015 18:10:20', $this->platform);
        $this->assertInstanceOf('DateTime', $returnValue);
        $this->assertEquals('01.01.2015 18:10:20', $returnValue->format('d.m.Y H:i:s'));
    }

    /**
     * Test the correct DateTime to string handling with invalid data
     */
    public function testConvertToPHPValueWithInvalidData()
    {
        $returnValue = $this->sqlSrvDatetime->convertToPHPValue('32.15.2014', $this->platform);
        $this->assertNull($returnValue);
        $returnValue = $this->sqlSrvDatetime->convertToPHPValue('21.12.2014 27:00:00', $this->platform);
        $this->assertNull($returnValue);
    }

    /**
     * test the correct datetime to string conversion for the database
     */
    public function testConvertToDatabaseValue()
    {
        $value = new \DateTime('01.01.2014 20:15:00');
        $returnValue = $this->sqlSrvDatetime->convertToDatabaseValue($value, $this->platform);
        $this->assertEquals('01.01.2014 20:15:00', $returnValue);
    }

    /**
     * test the correct string to DateTime handling with invalid data
     */
    public function testConvertToDatabaseValueWithInvalidData()
    {
        $this->assertNull($this->sqlSrvDatetime->convertToDatabaseValue(null, $this->platform));
        $this->assertNull($this->sqlSrvDatetime->convertToDatabaseValue('01.01.2014', $this->platform));
    }

    /**
     * Test if getName() returns the correct name
     */
    public function testGetName()
    {
        $this->assertEquals(SqlsrvDatetime::NAME, $this->sqlSrvDatetime->getName());
    }
}
