<?php

return array(

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'display_exceptions' => true,
        'display_not_found_reason' => true,
    ),

    'router' => array(
        'routes' => array(
            'timesheet-work-days' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/timesheet[/:month]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Timesheet\Controller\User',
                        'controller'    => 'WorkDays',
                        'action'        => 'default',
                    ),
                ),
            ),
        ),
    ),

    'view_helpers' => array(
        'invokables' => array(
            'monthPaginator' => 'Timesheet\View\Helper\MonthPaginator',
        ),
    ),

);
