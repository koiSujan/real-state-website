<?php

function sanitizeInput($str)
{
	// $str = addslashes($str);	//
	$str = strip_tags($str);	// Remove tags
	$str = trim($str);	// Remove Multiple spaces
	// $str = stripslashes($str); // remove slashes
	return $str;
}

function redirect($path, $msg_key = null, $msg = null)
{
	if ($msg_key != null) {
		$_SESSION[$msg_key] = $msg;
	}
	@header('location:  ' . $path);
	exit;
}

function flash()
{
	if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
		echo '<div class="alert success">
			<input type="checkbox" id="alert2" />
			<label class="close" title="close" for="alert2">
				<i class="ri-close-line"></i>
			</label>
			<p class="inner">
				'.$_SESSION['success'].'
			</p>
		</div>';
		unset($_SESSION['success']);
	}
	if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
		echo '<div class="alert error">
				<input type="checkbox" id="alert3" />
				<label class="close" title="close" for="alert3">
					<i class="ri-close-line"></i>
				</label>
				<p class="inner">
					'.$_SESSION['error'].'
				</p>
			</div>
			';
		unset($_SESSION['error']);
	}
}

function uploadFile($file, $upload_dir){
	if($file['error'] == 0){
		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);	// file extension returns
		if(in_array(strtolower($ext), ALLOWED_IMAGE_EXTENSION)){
			if($file['size'] <= 5000000){

				$path = UPLOAD_PATH.$upload_dir;
				if(!is_dir($path)){
					mkdir($path, true, '777');
				}
				// Category-2018123008440012.ext
				$file_name = ucfirst($upload_dir)."-".date('Ymdhis').rand(0, 99).".".$ext;
				$success = move_uploaded_file($file['tmp_name'], $path."/".$file_name);
				if($success){
					return $file_name;
				} else {
					return false;
				}

			} else {
				return false;
			}
		} else {
			return false;
		}
	} else {
		return false;
	}
}


function debug($variable , $isDie= true){
	print_r($variable);
	if($isDie){
		die();
	}
}

function isAuth(){
	if(isset($_SESSION['auth_user'])){
		return true;
	}

	redirect('../login.php');
}

function isAdmin(){
	if(!isset($_SESSION['auth_user'])){
		redirect('../index.php');
	}
	
	if(isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == 'admin'){
		return true;
	}

	redirect('../index.php');
}

