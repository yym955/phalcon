<?php
/** 
* Routers 
*  
* @version        1.0 
*/  

$di->set('router', function () {
	$router = new Phalcon\Mvc\Router();
	$router->setDefaultModule("Test");
	return $router;
});

?>