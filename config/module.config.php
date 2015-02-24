<?php

return array(

    'view_manager' => array(
        'display_exceptions' => true,
        'display_not_found_reason' => true,
    ),

    'router' => array(
        'routes' => array(
            'employees-list' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/timesheet',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Timesheet\Controller\User',
                        'controller'    => 'WorkDays',
                        'action'        => 'default',
                    ),
                ),
            ),
        ),
    ),

);
