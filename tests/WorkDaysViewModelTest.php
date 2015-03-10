<?php

namespace t4web\teamshet\tests;


class WorkDaysViewModelTest extends \PHPUnit_Framework_TestCase {

    private $controller;

    public function SetUp()
    {
        $this->controller = new \Timesheet\Controller\ViewModel\WorkDaysViewModel();
        $this->controller = $this->getMock(
            'Timesheet\Controller\ViewModel\WorkDaysViewModel',
            array('getDaysOff'),
            array()
        );
    }


    /**
     * @dataProvider trueProvider
     */
    public function testViewGetDaysOffTrue($month, $expectedHollidays)
    {
        $this->assertEquals($expectedHollidays, $this->controller->getHolliDays($month));

    }

    /**
     * @dataProvider falseProvider
     */

    public function testViewGetDaysOffFalse($month)
    {
        $this->assertEmpty($this->controller->getHolliDays($month));
    }

    /**
     * @dataProvider GetWeekendProviderTrue
     */

    public function testViewGetWeekendTrue($day, $expectedHollidays)
    {
        $this->controller->expects($this->once())
            ->method('getDaysOff')
            ->will($this->returnValue(array(2, 3, 9, 10, 16, 17, 23, 24, 30, 31))); // май 2015
        $this->assertEquals($expectedHollidays, $this->controller->getWeekend(5, $day));

    }

    /**
     * @dataProvider GetWeekendProviderDayFalse
     */

    public function testViewGetWeekendDayFalse($day)
    {
        $this->assertFalse($this->controller->getWeekend(5, $day));
    }



    public function trueProvider()
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

    public function falseProvider()
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

    public function GetWeekendProviderTrue()
    {
        return array(
            array(1, 1),
            array(2, 2),
            array(3, 2),
            array(4, 1),
            array(5, false),
            array(6, false),
            array(7, false),
            array(8, false),
            array(9, 2),
            array(10, 2),
            array(11, 1),
            array(12, false),
            array(13, false),
            array(14, false),
            array(15, false),
            array(16, 2),
            array(17, 2),
            array(18, false),
            array(19, false),
            array(20, false),
            array(21, false),
            array(22, false),
            array(23, 2),
            array(24, 2),
            array(25, false),
            array(26, false),
            array(27, false),
            array(28, false),
            array(29, false),
            array(30, 2),
            array(31, 2),

        );
    }

    public function GetWeekendProviderDayFalse()
    {
        return array(
            array(''),
            array(32),
            array(-1),
            array(0),
            array(0.1),
            array('str'),
            array(array()),
            array(array(1, 2, 3)),
        );
    }


}
