<?php
/**
 * Project:			Nimpres Server API
 * File name: 		delete_presentation.php
 * Date modified:	2011-03-17
 * Description:		Verifies the request is from the owner of the presentation, then deletes the presentation
 * 					from pres, pres_status, slides, and the file and folder on the web
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
$user = $_GET['user_id'];
$password = $_GET['user_password'];
$pid = $_GET['pres_id'];
$pres_pass = $_GET['pres_password'];

if (!empty($pid) && $pres_pass === PresentationBO::getPresPass($pid) && PresentationBO::verifyOwner($pid, $user, $password)){

	$target_folder = PRESENTATIONS_DIR;
	$target_folder = $target_folder . $pid;
	$target_path = PRESENTATIONS_DIR;
	$target_path = $target_path . $pid . '.dps';
	
	if (unlink($target_path)){
		if (PresentationBO::recursiveDelete($target_folder)){
			if(PresentationBO::deletePres($pid))
				echo 'OK';
			else
				echo 'FAIL';
		}
	}
}
else
	echo 'FAIL';
?>