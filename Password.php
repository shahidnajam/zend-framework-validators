<?php

class vkNgine_Validate_User_Password extends Zend_Validate_Abstract
{
	const INVALID_USER_PASSWORD = 'invalid';
	
	protected $_messageTemplates = array(
		self::INVALID_USER_PASSWORD => "Old Password does not match our records",
	);
		
	public function __construct($userId)
	{
		$this->userId = $userId;		
	}	
	
	public function isValid($value)
	{	
		$modelUsers = new Model_Users();
		$user = $modelUsers->fetch($this->userId);
		
		if ($user['password'] != md5($value)) {
			$this->_error(self::INVALID_USER_PASSWORD);
			return false;
		}
		return true;
	}
	
}