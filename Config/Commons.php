<?php
/** 
* web运行基础配置
*  数据库 缓存 
* @version        1.0 
*/ 


define("DB_PREFIX",$config['db_prefix']);//表前缀
$di->set('db', function() use ($config){
	
	$connection = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
		"host" 	   => $config['db_host'],
		"username" => $config['db_username'],
		"password" => $config['db_password'],
		"dbname"   => $config['db_dbname'],
		"charset"  => $config['db_charset'],
		"options"  => array( //数据库参数配置
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
			PDO::ATTR_CASE => PDO::CASE_NATURAL,
		)
		//PDO::ATTR_CASE
		//PDO::CASE_LOWER -- 强制列名是小写
		//PDO::CASE_NATURAL -- 列名按照原始的方式
		//PDO::CASE_UPPER -- 强制列名为大写
	));

	return $connection;
});
?>