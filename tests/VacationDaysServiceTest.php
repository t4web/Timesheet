<?php
namespace t4web\teamshet\tests;


class VacationDaysServiceTest extends \PHPUnit_Framework_TestCase
{
    private $service;

    public function SetUp()
    {
        $this->service = new \Timesheet\Service\VacationDaysService();
    }

    /**
     * @dataProvider vacationTrue
     */
    public function testGetVacationTrue($userId, $expectedVacation)
    {
        $this->assertEquals($expectedVacation, $this->service->_getVacation($userId, 3));

    }

    /**
     * @dataProvider hospitalTrue
     */
    public function testGetHospitalTrue($userId, $expectedHospital)
    {
        $this->assertEquals($expectedHospital, $this->service->_getHospital($userId, 3));
    }

    /**
     * @dataProvider educationTrue
     */
    public function testGetEducationTrue($userId, $expectedEducation)
    {
        $this->assertEquals($expectedEducation, $this->service->_getEducation($userId, 3));
    }

    /**
     * @dataProvider leaveWithoutPayTrue
     */
    public function testGetLeaveWithoutPayTrue($userId, $expectedLeaveWithoutPay)
    {
        $this->assertEquals($expectedLeaveWithoutPay, $this->service->_getLeaveWithoutPay($userId, 3));
    }

    public function vacationTrue()
    {
        return array(
            array(1, array(1, 2, 3, 4)),
            array(2, array(5, 9, 12)),
            array(3, array(17)),
            array(4, array(12, 13)),
        );
    }

    public function hospitalTrue()
    {
        return array(
            array(1, array(3, 4)),
            array(2, array(6, 11)),
            array(3, array(3, 4, 5)),
            array(4, array()),
        );
    }

    public function educationTrue()
    {
        return array(
            array(1, array()),
            array(2, array()),
            array(3, array()),
            array(4, array(23, 24, 25, 26, 27)),
        );
    }

    public function leaveWithoutPayTrue()
    {
        return array(
            array(1, array()),
            array(2, array()),
            array(3, array(10, 11, 12)),
            array(4, array()),
        );
    }

}
