<?php
namespace Apps\Test;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Db\Adapter\Pdo\Mysql as Database;
class Module implements ModuleDefinitionInterface
{
    /**
     * Registers the module auto-loader
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces(
            [
                'Apps\Test\Controllers' => APP_PATH.'/Apps/Test/controllers/',
                'Apps\Test\Models'      => APP_PATH.'/Apps/Test/models/',
                'Apps\Test\Plugins'     => APP_PATH.'/Apps/Test/plugins/',
            ]
        );
        $loader->register();
    }
    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        // Registering a dispatcher
        $di->set('dispatcher', function () {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('Apps\Test\Controllers\\');
            return $dispatcher;
        });
        // Registering the view component
        $di->set('view', function () {
            $view = new View();
            $view->setViewsDir(APP_PATH.'/Apps/Test/Views/');
            return $view;
        });
        /*
        $di->set('db', function () {
            return new Database(
                [
                    "host" => "localhost",
                    "username" => "root",
                    "password" => "secret",
                    "dbname" => "invo"
                ]
            );
        });*/
    }
}