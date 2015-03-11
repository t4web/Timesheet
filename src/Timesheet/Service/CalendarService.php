<?php

namespace Timesheet\Service;

use Timesheet\Service\HolliDaysService;
use Timesheet\Service\VacationDaysService;
use Zend\Mvc\Controller\AbstractActionController;

class CalendarService extends AbstractActionController
{
    private $_Weekend = 1; // Выходной
    private $_Holliday = 2; // гос. праздник
    private $_Vacation = 3; // отпуск
    private $_Hospital = 4; // больничный
    private $_Education = 5; // учеба
    private $_LeaveWithoutPay = 6; // за свой счет

    public function getCalendar($userId, $dayOff, $month, $day)
    {
        if (empty($month) || !is_numeric($month) || is_array($month) || $month > 12 || $month < 1) return false;
        if (empty($day) || !is_numeric($day) || is_array($day) || $day > 31 || $day < 1) return false;
        if (!is_array($dayOff)) return false;

        $hollidaysSer = new HolliDaysService();

        $vacation = new VacationDaysService();

        if (in_array($day, $dayOff)) {
            return $this->_Holliday;
        }
        if (in_array($day, $hollidaysSer->getHollidays($month))) {
            return $this->_Weekend;
        }
        if (in_array($day, $vacation->_getVacation($userId, $month))) {
            return $this->_Vacation;
        }
        if (in_array($day, $vacation->_getHospital($userId, $month))) {
            return $this->_Hospital;
        }
        if (in_array($day, $vacation->_getEducation($userId, $month))) {
            return $this->_Education;
        }
        if (in_array($day, $vacation->_getLeaveWithoutPay($userId, $month))) {
            return $this->_LeaveWithoutPay;
        }

        return false;

    }


}
