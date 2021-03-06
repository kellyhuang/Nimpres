<?php
/**
 * Project:			Nimpres Server API
 * File name: 		get_slide_file.php
 * Date modified:	2011-03-18
 * Description:		Sends an image file based on the pid and slide num associated with a filename in slides table
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

$user = $_GET['user_id'];
$password = $_GET['user_password'];
$pid = $_GET['pres_id'];
$pres_pass = $_GET['pres_password'];
$slide_num = $_GET['slide_num'];

if (!empty($pid) && !empty($user) && isset($_GET['pres_password']) && !empty($password) && $pres_pass === PresentationBO::getPresPass($pid) && userBO::validateLogin($user, $password)){
	$filename=PresentationBO::getFilenameByID($pid, $slide_num);
	
	if (!empty($filename)){
		header('Content-Type: image/jpeg');
		readfile(PRESENTATIONS_DIR.$pid.'/'.$filename);
	}
	else 
		echo 'FAIL1';
}
else
	echo 'FAIL2';
?>