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
