<?php
namespace Apps\Test\Controllers;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
         // @See http://www.myleftstudio.com/reference/db.html
		 $result = $this->db->query("SELECT * FROM ".DB_PREFIX."activity ORDER BY id");
		 $robots = $result->fetchAll();
		 foreach ($robots as $robot) { 
			 echo $robot['activityCode']; 
		}
    }
}