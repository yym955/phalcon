<?php
/** 
* web���л�������
*  ���ݿ� ���� 
* @version        1.0 
*/ 


define("DB_PREFIX",$config['db_prefix']);//��ǰ׺
$di->set('db', function() use ($config){
	
	$connection = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
		"host" 	   => $config['db_host'],
		"username" => $config['db_username'],
		"password" => $config['db_password'],
		"dbname"   => $config['db_dbname'],
		"charset"  => $config['db_charset'],
		"options"  => array( //���ݿ��������
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
			PDO::ATTR_CASE => PDO::CASE_NATURAL,
		)
		//PDO::ATTR_CASE
		//PDO::CASE_LOWER -- ǿ��������Сд
		//PDO::CASE_NATURAL -- ��������ԭʼ�ķ�ʽ
		//PDO::CASE_UPPER -- ǿ������Ϊ��д
	));

	return $connection;
});
?>