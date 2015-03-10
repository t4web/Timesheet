<?php
// vendor/bin/phpunit
namespace t4web\teamshet\tests;

class HolliDaysServiceTest extends \PHPUnit_Framework_TestCase
{

    private $service;

    public function setUp()
    {
        $this->service = new \Timesheet\Service\HolliDaysService();
    }

    /**
     * @dataProvider providerTrue
     */
    public function testHollidaysServiceTrue($month, $expectedHollidays)
    {

        $this->assertEquals($expectedHollidays, $this->service->getHolliDays($month));

    }

    /**
     * @dataProvider ProviderFalse
     */
    public function testHollidaysServiceFalse($month)
    {

        $this->assertEmpty($this->service->getHolliDays($month));

    }

    public function providerTrue()
    {
        return array(
            array(1,
                array(1,
                    2,
                    7,
                    8,
                    9)),
            array(2, array()),
            array(3, array(9)),
            array(4, array(13)),
            array(5, array(1,
                4,
                11)),
            array(6, array(1,
                29)),
            array(7, array()),
            array(8, array(24)),
            array(9, array()),
            array(10, array()),
            array(11, array()),
            array(12, array()),

        );
    }

    public function providerFalse()
    {
        return array(
            array(''),
            array(13),
            array(-1),
            array(0),
            array(0.1),
            array('str'),
            array(array()),
            array(array(1,2,3)),
        );
    }

}
