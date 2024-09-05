<?php

function sanitize($str){
	// $str = addslashes($str);	//
	$str = strip_tags($str);	// Remove tags
	$str = trim($str);	// Remove Multiple spaces
	// $str = stripslashes($str); // remove slashes
	return $str;
}

function redirect($path, $msg_key = null, $msg = null){
	if($msg_key != null){
		$_SESSION[$msg_key] = $msg;
	}
	@header('location:  '.$path);
	exit;
}

?>