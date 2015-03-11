<?php
namespace Timesheet\Controller\ViewModel;

use DateTime;
use DateInterval;
use DatePeriod;
use Timesheet\Service\CalendarService;
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


    public function getCalendar($userId, $month, $day)
    {
        $calendar = new CalendarService();

        return $calendar->getCalendar($userId, $this->getDaysOff(), $month, $day);
    }


}