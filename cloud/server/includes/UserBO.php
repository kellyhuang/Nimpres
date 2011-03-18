<?php
/**
 * Project:			Nimpres Server API
 * File name: 		
 * Date modified:	2011-03-17
 * Description:		
 * 
 * License:			Copyright (c) 2011 (Matthew Brooks, Jordan Emmons, William Kong)
					
					Permission is hereby granted, free of charge, to any person obtaining a copy
					of this software and associated documentation files (the "Software"), to deal
					in the Software without restriction, including without limitation the rights
					to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
					copies of the Software, and to permit persons to whom the Software is
					furnished to do so, subject to the following conditions:
					
					The above copyright notice and this permission notice shall be included in
					all copies or substantial portions of the Software.
					
					THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
					IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
					FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
					AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
					LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
					OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
					THE SOFTWARE.
 */

ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);
require_once('./includes/init.php');

	class UserBO{
			
		public static function createUser($id = '', $password = ''){

			$newUserDTO= new UserDTO;

			$newUserDTO->id = $id;
			$newUserDTO->password = $password;

			if (UserDO::createUser($newUserDTO))
				return TRUE;
			else
				return FALSE;
			
		}
		
		public static function validateLogin($id = '', $password = ''){
			
			$newUserDTO = UserDO::getUserById($id);
			
			if ($newUserDTO->password === $password){
				//UserDO::clearFails($newUserDTO);
				return TRUE;
			}
			else{
				//UserDO::incrementFails($newUserDTO);
				return FALSE;
			}
			
			
		}
	
	}
?>