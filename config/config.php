<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if(session_status() === PHP_SESSION_NONE) {
  session_start();
}

ob_start();

define("ENV" , "DEV");
define('SITE_URL', "http://real-state.local/");
define('UPLOAD_URL', SITE_URL.'/uploads/');
define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT']."/uploads/");
define('ALLOWED_IMAGE_EXTENSION', array('jpg','jpeg','png','svg','bmp','gif'));
