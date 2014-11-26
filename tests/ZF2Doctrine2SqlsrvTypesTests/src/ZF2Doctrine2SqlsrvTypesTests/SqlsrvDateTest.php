<?php

namespace ZF2Doctrine2SqlsrvTypesTests;

use Doctrine\DBAL\Types\Type;
use ZF2Doctrine2SqlsrvTypes\SqlsrvDate;

/**
 * Test class for the own db type SqlsrvDate
 *
 * @package ZF2Doctrine2SqlsrvTypesTests
 * @author Magnus Buk <MagnusBuk@gmx.de>
 */
class SqlsrvDateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SqlsrvDate
     */
    public $sqlSrvDate = null;

    /**
     * @var null
     */
    public $platform = null;

    /**
     * set up object and abstract platform
     */
    public function setUp()
    {
        $this->sqlSrvDate = Type::getType('SqlsrvDate');
        $this->platform = $this->getMockBuilder('Doctrine\DBAL\Platforms\AbstractPlatform')->getMockForAbstractClass();
    }

    /**
     * Test if the correct instance of our own type is returned
     */
    public function testIfCorrectInstanceisReturned()
    {
        $this->assertInstanceOf('ZF2Doctrine2SqlsrvTypes\SqlsrvDate', $this->sqlSrvDate);
    }

    /**
     * Test the correct sql declaration
     */
    public function testCorrectSqlDeclaration()
    {
        $this->assertEquals('Date', $this->sqlSrvDate->getSqlDeclaration([], $this->platform));
    }

    /**
     * Test the correct string to datetime conversion
     */
    public function testConvertToPHPValue()
    {
        $returnValue = $this->sqlSrvDate->convertToPHPValue('01.01.2015', $this->platform);
        $this->assertInstanceOf('DateTime', $returnValue);
        $this->assertEquals('01.01.2015', $returnValue->format('d.m.Y'));
    }

    /**
     * Test the correct DateTime to string handling with invalid data
     */
    public function testConvertToPHPValueWithInvalidData()
    {
        $returnValue = $this->sqlSrvDate->convertToPHPValue('32.15.2014', $this->platform);
        $this->assertNull($returnValue);
    }

    /**
     * test the correct datetime to string conversion for the database
     */
    public function testConvertToDatabaseValue()
    {
        $value = new \DateTime('01.01.2014');
        $returnValue = $this->sqlSrvDate->convertToDatabaseValue($value, $this->platform);
        $this->assertEquals('01.01.2014', $returnValue);
    }

    /**
     * test the correct string to DateTime handling with invalid data
     */
    public function testConvertToDatabaseValueWithInvalidData()
    {
        $this->assertNull($this->sqlSrvDate->convertToDatabaseValue(null, $this->platform));
        $this->assertNull($this->sqlSrvDate->convertToDatabaseValue('01.01.2014', $this->platform));
    }

    /**
     * Test if getName() returns the correct name
     */
    public function testGetName()
    {
        $this->assertEquals(SqlsrvDate::NAME, $this->sqlSrvDate->getName());
    }
}
