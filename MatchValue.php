<?php

class vkNgine_Validate_MatchValue extends Zend_Validate_Abstract
{
	const NOT_MATCH = 'notMatch';
	
	protected $_messageTemplates = array(
		self::NOT_MATCH => "Values do not match",
	);
	
	protected $_matchField = null;
	
	public function __construct($matchField, $messages = null)
	{
		$this->setMatchField($matchField);
		
		if (!empty($messages))
		{
			$this->setMessages($messages);
		}
	}
	
	public function setMatchField($field)
	{
		$this->_matchField = $field;
	}
	
	public function getMatchField()
	{
		return $this->_matchField;
	}
		
	public function isValid($value, $context = null)
	{
		$value = (string) $value;
		$this->_setValue($value);
		
		$toMatch = null;
		
		if (is_array($context) && isset($context[$this->getMatchField()]))
		{
			$toMatch = $context[$this->getMatchField()];
		}
		elseif (is_string($context))
		{
			$toMatch = $context;
		}
		
		if ($toMatch && 0 === strcmp($value, $toMatch))
		{
			return true;
		}
		
		$this->_error(self::NOT_MATCH);
		return false;
	}
}
?>