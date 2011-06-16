<?php

class vkNgine_Validate_NotUser extends Zend_Validate_Abstract
{	
	protected $excludeAddress = null;
	
	const REGISTERED_USER_EMAIL = 'invalid';
	
	protected $_messageTemplates = array(
		self::REGISTERED_USER_EMAIL => "Email already registered",
	);
	
	public function __construct($excludeAddress = null)
	{
		$this->excludeAddress = $excludeAddress;
	}		
	
	public function isValid($value)
	{	
		// the exclude address is always allowed
		if ($value==$this->excludeAddress) {
			return true;
		}		
		
		$modelUsers = new Model_Users();
		$user = $modelUsers->fetchWithEmail($value);
	
		if ($user) {
			$this->_error(self::REGISTERED_USER_EMAIL);
			return false;
		}
		return true;
	}
	
}