<?php

class Core_Model_DbTable_User extends Zend_Db_Table_Abstract
{
	
	public function __construct()
	{
		$options = array(
			'db'=> Zend_controller_Front::getInstance()->getParam('bootstrap')
													   ->getResource('multiDb')
													   ->getDb('main'),
			'name'=> 'user',
			'primary'=> 'user_id'
		
		);
	}
	
}