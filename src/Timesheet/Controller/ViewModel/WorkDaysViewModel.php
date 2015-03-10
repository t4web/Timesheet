<?php
namespace Timesheet\Controller\ViewModel;

use DateTime;
use DateInterval;
use DatePeriod;
use Timesheet\Service\HolliDaysService;
use Zend\View\Model\ViewModel;

class WorkDaysViewModel extends ViewModel {

    /**
     * @var DateTime
     */
    private $current;

    /**
     * @var array
     */
    private $daysOff = [];

    /**
     * @return DateTime
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param DateTime $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }

    /**
     * @return array
     */
    public function getDaysOff() {

        if (!empty($this->daysOff)) {
            return $this->daysOff;
        }

        $from = new DateTime($this->current->format('Y-m-01'));
        $to = clone $from;
        $to->modify('+1 month');

        $interval = new DateInterval('P1D');
        $periods = new DatePeriod($from, $interval, $to);

        $workingDays = [1, 2, 3, 4, 5];

        foreach ($periods as $period) {
            if (!in_array($period->format('N'), $workingDays)) {
                $this->daysOff[] = $period->format('j');
            }
        }
        return $this->daysOff;
    }


    public function getHollidays($month){

        if (empty($month) || !is_numeric($month) || is_array($month) || $month > 12 || $month < 1) return array();

        $holliday = new HolliDaysService();

        $return = $holliday->getHolliDays($month);

        if (!is_array($return)) return array();

        return $return;
    }

    public function getWeekend($month, $day)
    {
        if (empty($month) || !is_numeric($month) || is_array($month) || $month > 12 || $month < 1) return false;
        if (empty($day) || !is_numeric($day) || is_array($day) || $day > 31 || $day < 1) return false;

        $dayOff = $this->getDaysOff();
        $hollidays = $this->getHollidays($month);
        $allWekends = array_unique(array_merge($dayOff, $hollidays));

        if (in_array($day, $dayOff)) {
            return 2;
        }
        if (in_array($day, $hollidays)) {
            return 1;
        }

        return false;

    }


}