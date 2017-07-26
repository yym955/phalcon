<?php
error_reporting(E_ALL);
define("APP_PATH","..");
use Phalcon\Loader;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application as BaseApplication;
class Application extends BaseApplication
{
    /**
     * 
     */
    protected function registerServices()
    {
        $di = new FactoryDefault();
        $loader = new Loader();
        /**
         * �������õ������Զ����ص�ģ��
         */
        $loader
            ->registerDirs([__DIR__ . '/../Apps/Library/'])
            ->register();
        // ע��·��
		/**
		 * ��������
		 */
		$config = include  APP_PATH . "/Config/Config.php";

		/**
		 * �����������
		 */
		require APP_PATH . "/Config/Commons.php";
		/**
		 * ���빦��ҵ��ע��
		 */
		require APP_PATH . "/Config/Business.php";
		/**
		 * ����·��ע��
		 */
		require APP_PATH . "/Config/Routers.php";


        $this->setDI($di);
    }
    public function main()
    {
        $this->registerServices();
		$modules = require APP_PATH . "/Config/Modules.php";
        // ע��ҵ��ģ��
        $this->registerModules($modules);
        echo $this->handle()->getContent();
    }
}
$application = new Application();
$application->main();