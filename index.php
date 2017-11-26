<?php

session_start();
ob_start();

date_default_timezone_set('Asia/Yerevan');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cnf = require_once './config.php';
$db = require_once './db.php';
require_once './methods.php';

// 
// $operator = Request::get('/account/~/phone-number/904017376019');
// echo '<pre>';
// print_r($callLog);
// print_r($operator);
// exit;



$action = isset($_GET['action']) ? $_GET['action'] : '';
$me = isset($_SESSION['user']) ? $_SESSION['user'] : '';

require_once $cnf['views'] . '/header.php';

switch ($action) {
	case 'operators':
		require_once $cnf['views'] . '/operators.php';
		break;

	case 'logout':
		unset($_SESSION['user']);
		header('Location: index.php');
		exit;
		break;

	case 'get_data':
		
		header('Location: index.php');
		exit;
		break;
	
	default:
		if(!empty($me)) {
			$operators = $db->selectAll("SELECT * FROM `calls_log` LIMIT 50");
		}
		require_once $cnf['views'] . '/index.php';
		break;
}

require_once $cnf['views'] . '/footer.php';