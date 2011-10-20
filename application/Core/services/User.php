<?php

final class Core_Service_User
{
	public function create(Core_Model_User $user)
	{
		
	}
	
	public function update(Core_Model_User $user)
	{
		
	}
	
	public function read($userId)
	{
		
	}
	
	public function delete(Core_Model_User $user)
	{
		
	}
	
	public function authenticate($login, $password)
	{
		//return false; -> juste cette ligne dans la fonction permet de savoir si le service fonctionne
		
		$authAdapter = new Zend_Auth_Adapter_DbTable();
		$authAdapter->setTableName('user')
					->setIdentityColumn('user_login')
					->setCredentialColumn('user_password')
					->setIdentity($login)
					->setCredential($password);
					//->setCredential(md5('sel' .$password));
		$auth = Zend_Auth::getInstance();
		
		$authResult = $auth->authenticate($authAdapter);			
		
		if($authResult->isValid()) { // le isValid dit si l'indentité est bonne ou pas
			$authData = $authAdapter->getResultRowObject(null, 'user_password');
			$auth->getStorage()->write($authData);
			return true;	
		}else{
			return false;
		}
		
	}
	
	public function logout()
	{
		return Zend_Auth::getInstance()->clearIdentity();
	}
}