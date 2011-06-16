<?php

class vkNgine_Validate_NotEmptyDate extends Zend_Validate_Abstract
{
	const EMPTY_PART = 'emptyPart';
	const EMPTY_YEAR = 'emptyYear';
	
	protected $_messageTemplates = array(
		self::EMPTY_PART => "Date is required",
		self::EMPTY_YEAR => "Full date is required, please provide a year"
	);
	
	protected $_allowEmptyYear = false;
	
	public function __construct($allowEmptyYear = false, $messages = null)
	{
		$this->setAllowEmptyYear($allowEmptyYear);
		
		if (!empty($messages))
		{
			$this->setMessages($messages);
		}
	}
	
	public function setAllowEmptyYear($allow)
	{
		$this->_allowEmptyYear = (bool) $allow;
	}
	
	public function getAllowEmptyYear()
	{
		return (bool) $this->_allowEmptyYear;
	}
	
	public function isValid($value)
	{
		$valueString = (string) $value;
		$this->_setValue($valueString);
		
		$parts = explode('-', $valueString);
		
		// empty month or day
		if ((int)$parts[1] <= 0 || (int)$parts[2] <= 0)
		{
			$this->_error(self::EMPTY_PART);
			return false;
		}
		elseif (!$this->getAllowEmptyYear() && (int)$parts[0] <= 0)  // empty year
		{
			$this->_error(self::EMPTY_YEAR);
			return false;
		}
		
		return true;
	}
}

?>