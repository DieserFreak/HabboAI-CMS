<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

class User
{
	function User()
	{
		global $remoteip;
		global $core;
		
		if(!empty($_SESSION['id'])) {
			$user = dbSelect('*','users', "WHERE id = '" . $_SESSION['id'] . "' LIMIT 1");
			$username = $user->fetch_assoc();
			
			if($this->BanCheck($username['username'], $remoteip)) {
				define("LOGGING_IN", true);
			} else {
				header('location: '. $_CONFIG['website']['url'].'/logout');
				return true;
			}
		} else {
			define("LOGGING_IN", false);
		}
	}

	function BanCheck($user, $ip)
	{
		$ban = dbSelect('*','bans', "WHERE value = '" . $user . "' AND bantype = 'user' AND expire > '".time()."' or value = '".$ip."' AND bantype = 'ip' AND expire > '".time()."' ORDER BY id DESC LIMIT 1");
		$bancheck = $ban->num_rows;

		if($bancheck < 1) {
			return true;
		} else {
			return false;
		}
	}
	
	function UserData($ud)
	{
		$user = dbSelect('*','users', "WHERE id = '" . $_SESSION['id'] . "' LIMIT 1");
		$myuser = $user->fetch_assoc();
		return $myuser[$ud];
	}
			
	function encode($passwort)
	{
		//ALT: global $_CONFIG;
        //ALT: return md5($passwort . $_CONFIG['system']['hash_secret']);
		$secret_salt = "spP39dBdh92m5a520Mospgl24Sfsqfe"; // !! Nicht ändern !!
        $salted_password = $secret_salt . $passwort;
        $password_hash = hash('sha256', $salted_password);
        return $password_hash;
    }
	
	function UserLogin($name, $pass)
	{
		global $remoteip;
		global $_CONFIG;
		
		if($_CONFIG['wartungsmodus']['open'] == 1){
			$this->query = dbSelect('*', 'users', "WHERE username = '" . $name . "' AND password = '" . $pass . "' AND rank >= " . $_CONFIG['wartungsmodus']['rank'] . " LIMIT 1");
		} else {
			$this->query = dbSelect('*', 'users', "WHERE username = '" . $name . "' AND password = '" . $pass . "' LIMIT 1");
		}
		$row = $this->query->num_rows;
		
		if($row < 1) {
            return false;
        } else {
			if($this->BanCheck($name, $remoteip)) {
				$user = $this->query->fetch_assoc();
				$_SESSION['id'] = $user['id'];
				
				$form_data_loginlogs = array(
				'user_id' => $user['id'],
				'ip' => $remoteip,
				'timestamp' => time()
				);
				dbInsert('cms_login_logs', $form_data_loginlogs);
		
				$form_data_user_update = array(
				'auth_ticket' => '',
				'ip_last' => $remoteip,
				'pw_code' => ''
				);
				dbUpdate('users', $form_data_user_update, "WHERE username = '" . $name . "' AND password = '" . $pass . "'");
				
				header('location: '. $_CONFIG['website']['url'] .'/me');
				return true;
			} else {
				return false;
			}
		}
    }

	function UserCheck($name, $pass)
	{
        $row = dbSelectNumRows('*', 'users', "WHERE username = '" . $name . "' AND password = '" . $pass . "' LIMIT 1");

		if($row < 1) {
            return false;
        } else {
			return true;
		}
	}
	
	function Logout()
	{
		global $core;
		
		if(!empty($_SESSION['id'])) {
			$core->MUS('signout', $_SESSION['id']);
			session_destroy();
			header('location: '. $_CONFIG['website']['url'].'/index?l');
			return true;
		}
	}
	
	function WartungsmodusRank($userid)
	{
		global $_CONFIG;

		$row = dbSelectNumRows('*', 'users', "WHERE id = '" . $userid . "' AND rank >= '" . $_CONFIG['wartungsmodus']['rank'] . "' LIMIT 1");
		if($row > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function PassRandomCode($length)
	{
		mt_srand(crc32(microtime()));

		$buchstaben = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz123456789";

		$str_lng = strlen($buchstaben)-1;
		$rand= "";

		for($i=0;$i<$length;$i++) {       
			$rand.= $buchstaben{mt_rand(0, $str_lng)};
		}
		
		return $rand;
	}
	
	function user_exists($username, $email)
	{
		$row = dbSelectNumRows('*', 'users', "WHERE username = '" . $username . "' AND mail = '" . $email . "' LIMIT 1");
		if($row > 0){
			return false;
		} else {
			return $username;
		}
	}

	function UserPassMail($user)
	{
		global $mysqli;
		global $_CONFIG;
		
		$this->query = dbSelect('*', 'users', "WHERE username = '" . $user . "' LIMIT 1"); 
		$row = $this->query->num_rows;
		
		if($row < 1) {
            return false;
        } else {
			$pwcode = $this->PassRandomCode(100);
			
			$form_data_user_update = array(
				'pw_code' => $pwcode
			);
			dbUpdate('users', $form_data_user_update, "WHERE username = '" . $user . "'");

			$user = $this->query->fetch_assoc();
			
			$empfaenger = $user['mail'];
			$betreff = $_CONFIG['website']['name'] . "Passwort vergessen";
			$from = $_CONFIG['system']['email'];
			$from .= "Content-Type: text/html\n";
			$text = "<b>Hallo " . $user['username'] . "</b>!<br /><br />Du hast dein Passwort vergessen und deshalb auch nach neue Passwort 
			gefordert. Hier findest du ein Link, da sollst du drauf gehen und dann kannst du ein neues Passwort ausfüllen.<br /><br /><b>Link:</b> 
			" . $_CONFIG['website']['url']  . "/forget/" . $user['pw_code'] . "<br /><br /><br />Wir wünschen dir noch viel Spaß 
			im " . $_CONFIG['website']['name'] . " Hotel!<br /><br /><i>Euer " . $_CONFIG['website']['name'] . " Team</i>";

			mail($empfaenger, $betreff, $text, $from);
		}
	}
	
	function ChangeMotto($userid, $motto)
	{
		global $core;
		
		$form_data_user_motto = array(
			'motto' => $motto
		);
		dbUpdate('users', $form_data_user_motto, "WHERE id = '" . $userid . "' LIMIT 1");
		
		$core->MUS('updatemotto', $userid);
	}
	
	function ChangePassword($userid, $password)
	{
		$form_data_user_pw = array(
			'password' => $password
		);
		dbUpdate('users', $form_data_user_pw, "WHERE id = '" . $userid . "' LIMIT 1");
	}
	
	function ChangeName($userid, $oldname, $newname)
	{
		
		$form_data_user_name_log = array(
			'user_id' => $userid,
			'oldname' => $oldname,
			'newname' => $newname
			);
		dbInsert('user_namechange', $form_data_user_name_log);
		
		$form_data_user_name = array(
			'username' => $newname
		);
		dbUpdate('users', $form_data_user_name, "WHERE id = '" . $userid . "' LIMIT 1");
		
		$form_data_user_rooms = array(
			'owner' => $newname
		);
		dbUpdate('rooms', $form_data_user_rooms, "WHERE owner = '" . $oldname . "'");
	}
	
	function ChangeEmail($userid, $email)
	{
		$form_data_user_mail = array(
			'mail' => $email
		);
		dbUpdate('users', $form_data_user_mail, "WHERE id = '" . $userid . "' LIMIT 1");
	}
	
	function ChangeUserStats($userid, $newsletter, $hideonline, $accepttrading, $blocknewfriends)
	{
		$form_data_user_mail = array(
			'newsletter' => $newsletter,
			'hide_online' => $hideonline,
			'accept_trading' => $accepttrading,
			'block_newfriends' => $blocknewfriends
		);
		dbUpdate('users', $form_data_user_mail, "WHERE id = '" . $userid . "' LIMIT 1");
	}
	
	function GetDailyVIP($userid)
	{
		global $_CONFIG;
		global $mysqli;
		global $core;
		$date_normal = date('d.m.Y');
		
		$mysqli->query("UPDATE users SET credits = credits+".$_CONFIG['getdaily']['vip_credits'].", activity_points = activity_points+".$_CONFIG['getdaily']['vip_pixels'].", vip_points = vip_points+".$_CONFIG['getdaily']['vip_dias'].", getmoney_date = '".$date_normal."' WHERE id = '" . $userid . "'");
		
		$form_data_user_getrespect = array(
			'DailyRespectPoints' => $_CONFIG['getdaily']['vip_respect'],
			'DailyPetRespectPoints' => $_CONFIG['getdaily']['petrespect']
		);
		dbUpdate('user_stats', $form_data_user_getrespect, "WHERE id = '" . $userid . "'");
		
		$core->MUS('updatecredits', $userid);
		$core->MUS('updatepixels', $userid);
		$core->MUS('updatepoints', $userid);
	}
	
	function GetDaily($userid)
	{
		global $_CONFIG;
		global $mysqli;
		global $core;
		$date_normal = date('d.m.Y');
		
		$mysqli->query("UPDATE users SET credits = credits+".$_CONFIG['getdaily']['credits'].", activity_points = activity_points+".$_CONFIG['getdaily']['pixels'].", vip_points = vip_points+".$_CONFIG['getdaily']['dias'].", getmoney_date = '".$date_normal."' WHERE id = '" . $userid . "'");
		
		$form_data_user_getrespect = array(
			'DailyRespectPoints' => $_CONFIG['getdaily']['respect'],
			'DailyPetRespectPoints' => $_CONFIG['getdaily']['petrespect']
		);
		dbUpdate('user_stats', $form_data_user_getrespect, "WHERE id = '" . $userid . "'");
		
		$core->MUS('updatecredits', $userid);
		$core->MUS('updatepixels', $userid);
		$core->MUS('updatepoints', $userid);
	}
	
	function BuyBadge($userid, $badgeid)
	{
		global $mysqli;
		global $core;
		
		$badgedb = dbSelect('*', 'cms_badgeshop', "WHERE id = '" . $badgeid . "' LIMIT 1");
		$badge = $badgedb->fetch_assoc();
		
		if($badge['limited'] == 1){
			$mysqli->query("UPDATE cms_badgeshop SET limited_selled = limited_selled+1 WHERE id = '" . $badge['id'] . "'");
		}
		
		/*$form_data_badge = array(
			'user_id' => $userid,
			'badge_id' => $badge['badge']
			);
		dbInsert('user_badges', $form_data_badge);*/
		$core->MUS('givebadge', $userid.' '.$badge['badge']);
			
		$mysqli->query("UPDATE users SET credits = credits-".$badge['cost_taler'].", vip_points = vip_points-".$badge['cost_dias']." WHERE id = '" . $userid . "'");
		
		$core->MUS('updatecredits', $userid);
		$core->MUS('updatepoints', $userid);
	}
	
	function CheckUserInOwnRoom($userid)
	{
		global $mysqli;
		
		$UserVisits = dbSelect('*', 'user_roomvisits', "WHERE user_id = '" . $userid . "' ORDER BY entry_timestamp DESC LIMIT 1");
		$LastVisit = $UserVisits->fetch_assoc();
		
		$UsersRoom = dbSelect('*', 'rooms', "WHERE id = '" . $LastVisit['room_id'] . "' LIMIT 1");
		$RoomData = $UsersRoom->fetch_assoc();

		$Users = dbSelect('*', 'users', "WHERE id = '" . $userid . "' LIMIT 1");
		$UserData = $Users->fetch_assoc();
		
		if($LastVisit['exit_timestamp'] < 1 && $RoomData['owner'] == $UserData['username']){
			return true;
		} else {
			return false;
		}
	}
	
	function CratePoll($userid, $question, $a, $b, $c, $d, $e)
	{
		global $mysqli;
		global $core;
		
		$userdb = dbSelect('*', 'users', "WHERE id = '" . $userid . "' LIMIT 1");
		$userd = $userdb->fetch_assoc();
		
		$data_question = array(
			'question' => $question,
			'owner' => $userd['username']
			);
		dbInsert('infobus_questions', $data_question);
		
		$questionsdb = dbSelect('*', 'infobus_questions', "WHERE owner = '" . $userd['username'] . "' ORDER BY id DESC LIMIT 1");
		$questiond = $questionsdb->fetch_assoc();
		
		// Antwort A
		if(strlen($a) > 0){
			$data_answer = array(
			'question_id' => $questiond['id'],
			'answer_text' => $a
			);
		dbInsert('infobus_answers', $data_answer);
		}
		// Antwort B
		if(strlen($b) > 0){
			$data_answer = array(
			'question_id' => $questiond['id'],
			'answer_text' => $b
			);
		dbInsert('infobus_answers', $data_answer);
		}
		// Antwort C
		if(strlen($c) > 0){
			$data_answer = array(
			'question_id' => $questiond['id'],
			'answer_text' => $c
			);
		dbInsert('infobus_answers', $data_answer);
		}
		// Antwort D
		if(strlen($d) > 0){
			$data_answer = array(
			'question_id' => $questiond['id'],
			'answer_text' => $d
			);
		dbInsert('infobus_answers', $data_answer);
		}
		// Antwort E
		if(strlen($e) > 0){
			$data_answer = array(
			'question_id' => $questiond['id'],
			'answer_text' => $e
			);
		dbInsert('infobus_answers', $data_answer);
		}
		
		$core->MUS('infobuspoll', $questiond['id']);
		
		$mysqli->query("UPDATE users SET vip_points = vip_points-2 WHERE id = '" . $userid . "'");
		$core->MUS("updatepoints", $userid);
	}
}

?>