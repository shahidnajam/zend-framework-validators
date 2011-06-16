<?php
class vkNgine_Validate_Document_Extension extends Zend_Validate_Abstract
{
	public function isValid($value)
	{
		$this->_setValue($value);
				
		preg_match('/\.([^\.]*$)/', $value, $extension);
		if (is_array($extension) && sizeof($extension) > 0)
		{
			$fileExt = strtolower($extension[1]);			
		} 		
		
		$extensions = array('jpg, jpeg, gif, png, bmp, doc, docx, xls, xlsx, ppt, pptx, pdf');
		
		if(in_array($fileExt, $extensions)) {		
			return true;
		}
		return false;
	}
}
?>