<?php
namespace T4webTimesheet;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\Controller\ControllerManager;
use Zend\EventManager\EventInterface;
use Zend\Console\Adapter\AdapterInterface as ConsoleAdapterInterface;
use T4webTimesheet\Controller\User\WorkDaysController;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface,
                        ControllerProviderInterface, ConsoleUsageProviderInterface,
                        ServiceProviderInterface
{
    public function getConfig($env = null)
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConsoleUsage(ConsoleAdapterInterface $console)
    {
        return array(
            'timesheet init' => 'Initialize module',
        );
    }

    public function getServiceConfig()
    {
        return array();
    }

    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'T4webTimesheet\Controller\User\WorkDays' => function (ControllerManager $cm) {
                    return new WorkDaysController();
                },
            ),
        );
    }
}
