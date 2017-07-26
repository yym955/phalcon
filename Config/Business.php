<?php
/** 
* 业务依赖
* @version        1.0 
*/
$di->set('asdas', function() use ($di){
	$service = new \Yappam\Metadata\Ccpa\Service\PlaceService(); 
	$service->setModel($di->get("placeModel"));
	return $service;
});
?>