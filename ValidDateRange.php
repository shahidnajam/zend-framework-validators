<?php

class vkNgine_Validate_ValidDateRange extends Zend_Validate_Abstract
{
	const INVALID_DATERANGE = 'invalid';
	
	protected $_messageTemplates = array(
		self::INVALID_DATERANGE => "Invalid date range",
	);
	
	protected $_rangeName = null;
	protected $_allowOneDay = false;
	
	public function __construct($rangeName, $allowOneDay = false, $messages = null)
	{
		$this->_rangeName = $rangeName;
		$this->_allowOneDay = $allowOneDay;
		
		if (!empty($messages))
		{
			$this->setMessages($messages);
		}
	}
	
	public function isValid($value, $context = null)
	{
		$value = (string) $value;
		$this->_setValue($value);
		
		$fromField	= $this->_rangeName. '_from';
		$toField	= $this->_rangeName . '_to';
		
		if (is_array($context))
		{
			if (isset($context[$fromField]) && isset($context[$toField]))
			{
				$from	= strtotime($context[$fromField]);
				$to		= strtotime($context[$toField]);
				
				if ($to > $from ||
					($this->_allowOneDay && ($from == $to)))
				{
					return true;
				}
				else
				{
					$this->_error(self::INVALID_DATERANGE);
					return false;
				}
			}
		}
		
		$this->_error(self::NOT_MATCH);
		return false;
	}
}

?>