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
         * 这里设置第三方自动加载的模块
         */
        $loader
            ->registerDirs([__DIR__ . '/../Apps/Library/'])
            ->register();
        // 注册路由
		/**
		 * 引入配置
		 */
		$config = include  APP_PATH . "/Config/Config.php";

		/**
		 * 引入基础功能
		 */
		require APP_PATH . "/Config/Commons.php";
		/**
		 * 引入功能业务注入
		 */
		require APP_PATH . "/Config/Business.php";
		/**
		 * 引入路由注入
		 */
		require APP_PATH . "/Config/Routers.php";


        $this->setDI($di);
    }
    public function main()
    {
        $this->registerServices();
		$modules = require APP_PATH . "/Config/Modules.php";
        // 注册业务模块
        $this->registerModules($modules);
        echo $this->handle()->getContent();
    }
}
$application = new Application();
$application->main();