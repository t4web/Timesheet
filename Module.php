<?php
namespace Timesheet;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\Controller\ControllerManager;
use Zend\EventManager\EventInterface;
use Zend\Console\Adapter\AdapterInterface as ConsoleAdapterInterface;
use Timesheet\Controller\User\WorkDaysController;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface,
                        ControllerProviderInterface, ConsoleUsageProviderInterface,
                        ServiceProviderInterface, BootstrapListenerInterface
{
    public function onBootstrap(EventInterface $e)
    {
        $navigator = $e->getApplication()->getServiceManager()->get('Navigation\Menu\Navigator');
        $navigator->addEntry('Timesheet', 'timesheet-work-days', 'menu-icon fa fa-calendar');
    }

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
                'Timesheet\Controller\User\WorkDays' => function (ControllerManager $cm) {
                    return new WorkDaysController();
                },
            ),
        );
    }
}
