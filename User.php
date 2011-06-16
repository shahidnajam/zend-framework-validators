<?php

class vkNgine_Validate_User extends Zend_Validate_Abstract
{
	const INVALID_USER_EMAIL = 'invalid';
	
	protected $_messageTemplates = array(
		self::INVALID_USER_EMAIL => "Email doesn't exists",
	);
	
	public function isValid($value)
	{	
		$modelUsers = new Model_Users();
		$user = $modelUsers->fetchWithEmail($value);
	
		if (!$user) {
			$this->_error(self::INVALID_USER_EMAIL);
			return false;
		}
		return true;
	}
	
}