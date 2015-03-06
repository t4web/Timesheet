<?php

namespace Timesheet\Service;

use Zend\Mvc\Controller\AbstractActionController;

class HolliDaysService extends AbstractActionController
{

    public function getHolliDays($month)
    {

        if (empty($month) || !is_numeric($month) || is_array($month) || $month > 12 || $month < 1) return array();


        $hollidays[1] = ['1' => 'Новый год',
            '2' => 'Новый год',
            '7' => 'Рождество',
            '8' => 'Рождество',
            '9' => 'Рождество',
        ];
        $hollidays[2] = [];
        $hollidays[3] = ['9' => '8 марта',];

        $hollidays[4] = ['13' => 'пасха'];

        $hollidays[5] = ['1' => 'День труда',
            '4' => 'День труда',
            '11' => 'День победы',
        ];


        $hollidays[6] = ['1' => 'Троица',
            '29' => 'День Конституции',
        ];

        $hollidays[7] = [];

        $hollidays[8] = ['24' => 'День независимости'];

        $hollidays[9] = [];
        $hollidays[10] = [];
        $hollidays[11] = [];
        $hollidays[12] = [];

        if (!array_key_exists($month, $hollidays)) return array();

        return $hollidays[$month];
    }


}
