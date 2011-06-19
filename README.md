Some of my Validator classes for Zend Framework
=============================================

#### Usage ####
	- Create /Validate folder in /Library of your application, then dump this files there.
	  Depending of your applications name change vkNgine_
	   
#### Example structure ####
	- /library/vkNgine/Validate/[FILE_NAME]
	
#### Information: ####
		 - MatchValue.php - vkNgine_Validate_MatchValue()
		   - Can be used to match two values		 
		   
		 - NotEmptyDate.php - vkNgine_Validate_NotEmptyDate()
		   - I think it's pretty straightforward what it does
		   
		 - Url.php - vkNgine_Validate_Url()
		   - I think it's pretty straightforward what it does

		 - User.php - vkNgine_Validate_User()
		   - Make sures user exist
		 
		 - NotUser.php - vkNgine_Validate_NotUser()
		   - Make sures user doesn't exist
		  
		 - ValidDateRange.php - vkNgine_Validate_ValidDateRange()
		   - Can be used for from and to date fields, to say for example allow one full day only	 
	  
		 - Extension.php - vkNgine_Validate_Document_Extension()
		   - Useful for upload fuctions, so you get the extension of the file.
		 
		 - Password.php - vkNgine_Validate_User_Password()
		   - Validating a user password, it can be used for different things if model there changed
	  
Volkan Yavuz
Software Engineer