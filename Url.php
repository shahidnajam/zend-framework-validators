<?php
class vkNgine_Validate_Url extends Zend_Validate_Abstract
{
	const INVALID_URL = 'invalidUrl';
	
	protected $_messageTemplates = array(
		self::INVALID_URL => "'%value%' is not a valid URL.",
	);
	
	public function isValid($value)
	{
		if(stristr($value, 'http://')) {
			$value = str_replace('http://', '', $value);
		}
		
		$valueString = (string) $value;
		$this->_setValue($valueString);
		
		if(!self::isValidURL('http://' . $value))
		{	
			$this->_error(self::INVALID_URL);
			return false;
		}
		return true;
	}
	
	private function isValidURL($url)
	{
		return vkNgine_Url::isValid($url);
	}
}