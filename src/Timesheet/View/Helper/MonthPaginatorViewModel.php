<?php
namespace T4webTimesheet\View\Helper;

use DateTime;
use DateInterval;
use Zend\View\Model\ViewModel;

class MonthPaginatorViewModel extends ViewModel {

    public function __construct($variables = null, $options = null) {
        parent::__construct($variables, $options);

        $this->template = "timesheet/helper/month-paginator";
    }

    /**
     * @var DateTime
     */
    private $startDate;

    /**
     * @var DateTime
     */
    private $current;

    /**
     * @return DateTime
     */
    public function getNext()
    {
        return $this->startDate->add(new DateInterval("P1M"));
    }

    /**
     * @param DateTime $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
        $this->startDate = clone $current;
        $this->startDate->sub(new DateInterval('P3M'));
    }

    public function isCurrent() {
        return $this->startDate == $this->current;
    }

}