<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

@session_start();

// Anti Flood Protection
/*if($_SESSION['last_session_request'] > time() - 2){
    // users will be redirected to this page if it makes requests faster than 2 seconds
    header("location: /error");
    exit;
}*/
$_SESSION['last_session_request'] = time();


// Zeitzone
date_default_timezone_set('Europe/Berlin');
if(@ini_get('date.timezone') == null && function_exists("date_default_timezone_get")){ @date_default_timezone_set("Europe/Berlin"); }

// Ordnerpath definieren
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"]; 

require (ROOT . "/inc/mysql.inc.php");
require (ROOT . "/inc/config.inc.php");

// MySQL timeout connection
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 500);

// Urlpath definieren
$url = $_CONFIG['website']['url'];

// IP defninieren
$remoteip = $_SERVER['REMOTE_ADDR']; // HTTP_X_FORWARDED_FOR

// Debug
if($_CONFIG['system']['debug'] == true) {
	error_reporting(E_ALL);
} else {
	error_reporting(0);
}

// Alle Klassen aufrufen
function __autoload($class_name) {
    require ROOT . "/inc/classes/class." . strtolower($class_name). ".php"; 
}

// Klassen ausführen
$user = new User();
$core = new Core();
$tpl = new Template();
$filter = new Filter();
$news = new News();
$housekeeping = new Housekeeping();

// Funktionen aufrufen
require (ROOT . "/inc/functions/functions.user.php");

// Template
require (ROOT . "/inc/template.inc.php");

// Autoalert
if($_CONFIG['autoalert']['status'] == 1){
	if($_CONFIG['autoalert']['timestamp'] < time()){
		// $core->MUS('ha', $_CONFIG['autoalert']['text']);
		$timestamp_update = array(
			'option' => time()+$_CONFIG['autoalert']['interval']
		);
		dbUpdate('cms_config', $timestamp_update, "WHERE config = 'autoalert-timestamp' LIMIT 1");
	}
}
?>