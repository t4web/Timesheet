<?php

namespace T4webTimesheet\Controller\User;

use DateTime;
use Zend\Mvc\Controller\AbstractActionController;
use T4webTimesheet\Controller\ViewModel\WorkDaysViewModel;

class WorkDaysController extends AbstractActionController {

    /**
     * @return WorkDaysViewModel
     */
    public function defaultAction()
    {
        $current = $this->params('month', date('Y-m'));

        $view = new WorkDaysViewModel();
        $view->setCurrent(DateTime::createFromFormat('Y-m', $current));
        return $view;
    }

}
