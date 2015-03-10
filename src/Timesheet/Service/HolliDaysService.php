<?php

namespace Timesheet\Service;

use Zend\Mvc\Controller\AbstractActionController;

class HolliDaysService extends AbstractActionController
{

    public function getHolliDays($month)
    {

        if (empty($month) || !is_numeric($month) || is_array($month) || $month > 12 || $month < 1) return array();


        $hollidays[1] = [1, 2, 7, 8, 9];
        $hollidays[2] = [];
        $hollidays[3] = [9];

        $hollidays[4] = [13];

        $hollidays[5] = [1, 4, 11];

        $hollidays[6] = [1, 29];

        $hollidays[7] = [];

        $hollidays[8] = [24];

        $hollidays[9] = [];
        $hollidays[10] = [];
        $hollidays[11] = [];
        $hollidays[12] = [];

        if (!array_key_exists($month, $hollidays)) return array();

        return $hollidays[$month];
    }


}
