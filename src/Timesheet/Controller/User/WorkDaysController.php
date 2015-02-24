<?php

namespace Timesheet\Controller\User;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class WorkDaysController extends AbstractActionController {

    /**
     * @return ViewModel
     */
    public function defaultAction()
    {
        return new ViewModel();
    }

}
