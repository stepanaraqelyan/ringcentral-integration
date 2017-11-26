<?php

require_once './helpers/curl.php';

if(isset($_REQUEST['op_type'])) {
	$err = '';
	switch ($_REQUEST['op_type']) {
		case 'login':
			
			(isset($_POST['username']) && !empty($_POST['username'])) ? $username = htmlspecialchars($_POST['username']) : $err .= 'Invalid username<br />';
			(isset($_POST['password']) && !empty($_POST['password'])) ? $password = $_POST['password'] : $err .= 'Invalid password<br />';

			if(empty($err)) {
				$user = $db->select("SELECT * FROM `users` WHERE `username` = '" . $username . "'");
				if(!$user) $err .= 'Invalid username/password';
				else {
					if(!password_verify($password, $user->password)) $err.= 'Invalid password';
					else {
						unset($user->password);
						$_SESSION['user'] = $user;
					}
				}
			}
			break;
		
		case 'get_data':
			$last48Hours = date('Y-m-d', (time() - 3600 * 48));
			$callLog = Request::get('/account/~/call-log?dateFrom=' . $last48Hours);
			$sql = "INSERT INTO `calls_log` (`id`, `call_date`, `operator_id`, `inbound_number`, `outbound_number`, `duration`) VALUES";
			foreach($callLog->records as $k => $cl) {
				$id = $cl->id;
				$call_date = $cl->startTime;
				$operator_id = 1;
				$inbound_number = isset($cl->to) && isset($cl->to->phoneNumber) ? $cl->to->phoneNumber : '';
				$outbound_number = isset($cl->from) && isset($cl->from->phoneNumber) ? $cl->from->phoneNumber : '';
				$duration = isset($cl->duration) ? $cl->duration : 0;
				$sql .= ($k == 0) ? ' ' : ', ';
				$sql .= "('".$id."', '".$call_date."', '".$operator_id."', '".$inbound_number."', '".$outbound_number."', '".$duration."')";
			}
			$db->insert($sql);
			header('Location: index.php');
			exit;
			break;

		default:
			header('Location: index.php');
			exit;
			break;
	}
}