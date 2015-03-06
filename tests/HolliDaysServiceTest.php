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
                array('1' => 'Новый год',
                    '2' => 'Новый год',
                    '7' => 'Рождество',
                    '8' => 'Рождество',
                    '9' => 'Рождество')),
            array(2, array()),
            array(3, array('9' => '8 марта')),
            array(4, array('13' => 'пасха')),
            array(5, array('1' => 'День труда',
                '4' => 'День труда',
                '11' => 'День победы')),
            array(6, array('1' => 'Троица',
                '29' => 'День Конституции')),
            array(7, array()),
            array(8, array('24' => 'День независимости')),
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
