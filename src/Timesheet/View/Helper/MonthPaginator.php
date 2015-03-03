<?php

namespace Timesheet\View\Helper;

use DateTime;
use Zend\View\Helper\AbstractHelper;

class MonthPaginator extends AbstractHelper {
    
    public function __invoke(DateTime $current) {
        
        $view = new MonthPaginatorViewModel();
        $view->setCurrent($current);

        return $this->getView()->render($view);
    }
}