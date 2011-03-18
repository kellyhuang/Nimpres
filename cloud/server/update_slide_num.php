<?php
/**
 * Project:			Nimpres Server API
 * File name: 		update_slide_num.php
 * Date modified:	2011-03-17
 * Description:		Verifies the request is coming from the owner, then updates the slide_num field in 
 * 					pres_status with the current slide number
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

//TODO change to POST
$user = $_POST['user_id'];
$password = $_POST['user_password'];
$pid = $_POST['pres_id'];
$pres_pass = $_POST['pres_password'];
$slide_num = $_POST['slide_num'];

//TODO check to see if slide num is less than or equal to the length
if (!empty($pid) && is_numeric($pid) && is_numeric($slide_num) && $slide_num >= 0 && $pres_pass === PresentationBO::getPresPass($pid) && PresentationBO::verifyOwner($pid, $user, $password)){
	if(PresentationBO::updateSlideNum($pid, $slide_num))
		echo 'OK';
	else
		echo 'FAIL';
}
else 
	echo 'FAIL';

?>