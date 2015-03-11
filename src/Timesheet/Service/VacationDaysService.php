<?php

namespace Timesheet\Service;

use Zend\Mvc\Controller\AbstractActionController;

class VacationDaysService extends AbstractActionController
{
    public function _getVacation($userId, $month)
    {

        $vacation[1] = [3 => [1, 2, 3, 4]];
        $vacation[2] = [3 => [5, 9, 12]];
        $vacation[3] = [3 => [17]];
        $vacation[4] = [3 => [12, 13]];

        if (!array_key_exists($userId, $vacation) || !array_key_exists($month, $vacation[$userId])) return array();

        return $vacation[$userId][$month];
    }

    public function _getHospital($userId, $month)
    {


        $hospital[1] = [3 => [3, 4]];
        $hospital[2] = [3 => [6, 11]];
        $hospital[3] = [3 => [3, 4, 5]];
        $hospital[4] = [3 => []];

        if (!array_key_exists($userId, $hospital) || !array_key_exists($month, $hospital[$userId])) return array();


        return $hospital[$userId][$month];
    }

    public function _getEducation($userId, $month)
    {
        $education[1] = [3 => []];
        $education[2] = [3 => []];
        $education[3] = [3 => []];
        $education[4] = [3 => [23, 24, 25, 26, 27]];

        if (!array_key_exists($userId, $education) || !array_key_exists($month, $education[$userId])) return array();

        return $education[$userId][$month];
    }

    public function _getLeaveWithoutPay($userId, $month)
    {
        $LeaveWithoutPay[1] = [3 => []];
        $LeaveWithoutPay[2] = [3 => []];
        $LeaveWithoutPay[3] = [3 => [10, 11, 12]];
        $LeaveWithoutPay[4] = [3 => []];


        if (!array_key_exists($userId, $LeaveWithoutPay) || !array_key_exists($month, $LeaveWithoutPay[$userId])) return array();

        return $LeaveWithoutPay[$userId][$month];
    }

}
