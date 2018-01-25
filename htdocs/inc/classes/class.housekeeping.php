<?php 

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */
 
class Housekeeping
{
	function Login($userid, $pass, $secretcode, $ip)
	{
		global $_CONFIG;
		
		$user = dbSelect('*', 'users', "WHERE id = '" . $userid . "' AND password = '" . $pass . "' AND secretcode = '" . $secretcode ."' AND rank >= " . $_CONFIG['housekeeping']['rank'] . " LIMIT 1");

		$row = $user->num_rows;
		
		if($row < 1) {
            return false;
        } else {
			$_SESSION['intern']['acp'] = true;
			
			$this->hkLogs('Login', 'Einloggen erfolgreich', $userid, $ip);

			header('location: '. $_CONFIG['website']['url'] . $_CONFIG['housekeeping']['url'].'/home');
			return true;
		}
    }
	
	function hkLogs($action, $message, $userid, $userip, $targetid = '0', $details = '')
	{
		$form_data_loginlogs = array(
			'action' => $action,
			'message' => $message,
			'details' => $details,
			'user_id' => $userid,
			'user_ip' => $userip,
			'target_id' => $targetid,
			'timestamp' => time()
			);
		dbInsert('cms_hk_logs', $form_data_loginlogs);
	}
	
	function UsernameCheck($username)
	{
		$row = dbSelectNumRows('*', 'users', "WHERE username = '" . $username . "' LIMIT 1");
		if($row > 0){
			return true;
		} else {
			return false;
		}
	}
	
	function ServerSettings($st)
	{
		$query = dbSelect('*','server_settings');
		$serversettings = $query->fetch_assoc();
		return $serversettings[$st];
	}
	
	function valid_username($username)
	{
		return preg_match('#^[a-z]{1,2}[a-z0-9-_.]+$#i', $username);
	}
	
	function UserVip($userid, $dauer)
	{
		global $core;
		
		$userdb = dbSelect('*', 'users', "WHERE id = '" . $userid . "'");
		$row = $userdb->fetch_assoc();
		
		if ($row['vip'] == '0'){
			$time = time();
			$newdate = $time+60*60*24*$dauer;
			if($row['rank'] > '2'){
				$form_data_user_vip = array(
					'vip' => '1',
					'vip_time' => $newdate
				);
				dbUpdate('users', $form_data_user_vip, "WHERE id = '".$row['id']."' LIMIT 1");
			} else {
				$form_data_user_vip = array(
					'vip' => '1',
					'rank'	=> '2',
					'vip_time' => $newdate
				);
				dbUpdate('users', $form_data_user_vip, "WHERE id = '".$row['id']."' LIMIT 1");
			}
		} else {
			$plusviptime = 60*60*24*$dauer;
			$newdate = $row['vip_time']+$plusviptime;
			if($row['rank'] > '2'){
				$form_data_user_vip = array(
					'vip' => '1',
					'vip_time' => $newdate
				);
				dbUpdate('users', $form_data_user_vip, "WHERE id = '".$row['id']."' LIMIT 1");
			} else {
				$form_data_user_vip = array(
					'vip' => '1',
					'rank'	=> '2',
					'vip_time' => $newdate
				);
				dbUpdate('users', $form_data_user_vip, "WHERE id = '".$row['id']."' LIMIT 1");
			}
		}
		$core->MUS('updatevip', $row['id']);
	}
	
	function UserVipMass($vip, $online, $dauer)
	{
		global $core;
		
		if($vip == 1){
			$users = dbSelect('*', 'users', "WHERE vip = '1'");
		}elseif($online == 0){
			$users = dbSelect('*', 'users');
		}else{
			$users = dbSelect('*', 'users', "WHERE online = '1'");
		}
		
		while($row = $users->fetch_assoc()){
			if ($row['vip'] == '0'){
				$time = time();
				$newdate = $time+60*60*24*$dauer;
				if($row['rank'] > '2'){
					$form_data_user_vip = array(
						'vip' => '1',
						'vip_time' => $newdate
					);
					dbUpdate('users', $form_data_user_vip, "WHERE id = '".$row['id']."' LIMIT 1");
				} else {
					$form_data_user_vip = array(
						'vip' => '1',
						'rank'	=> '2',
						'vip_time' => $newdate
					);
					dbUpdate('users', $form_data_user_vip, "WHERE id = '".$row['id']."' LIMIT 1");
				}
			} else {
				$plusviptime = 60*60*24*$dauer;
				$newdate = $row['vip_time']+$plusviptime;
				if($row['rank'] > '2'){
					$form_data_user_vip = array(
						'vip' => '1',
						'vip_time' => $newdate
					);
					dbUpdate('users', $form_data_user_vip, "WHERE id = '".$row['id']."' LIMIT 1");
				} else {
					$form_data_user_vip = array(
						'vip' => '1',
						'rank'	=> '2',
						'vip_time' => $newdate
					);
					dbUpdate('users', $form_data_user_vip, "WHERE id = '".$row['id']."' LIMIT 1");
				}	
			}
			
			$core->MUS('updatevip', $row['id']);
		}
	}
	
	function UserBadge($userid, $typ, $badge)
	{
		if($typ == 0){
			$check = dbSelect('*','user_badges', "WHERE user_id = '" . $userid . "' AND badge_id = '" . $badge . "' LIMIT 1");
			if($check->num_rows < 1){
				$core->MUS('givebadge', $userid.' '.$badge);
			}
		} else {
			$check = dbSelect('*','user_badges', "WHERE user_id = '" . $userid . "' AND badge_id = '" . $badge . "' LIMIT 1");
			if($check->num_rows > 0){
				$delete = dbDelete('user_badges', "WHERE user_id = '" . $userid . "' AND badge_id = '" . $badge . "'");
			}
		}
	}
	
	function UserBadgeMass($typ, $badge)
	{
		$users = dbSelect('*', 'users');
		while($row = $users->fetch_assoc()){
			if($typ == 0){
				$check = dbSelect('*','user_badges', "WHERE user_id = '" . $row['id'] . "' AND badge_id = '" . $badge . "' LIMIT 1");
				if($check->num_rows < 1){
					$core->MUS('givebadge', $row['id'].' '.$badge);
				}
			} else {
				$check = dbSelect('*','user_badges', "WHERE user_id = '" . $row['id'] . "' AND badge_id = '" . $badge . "' LIMIT 1");
				if($check->num_rows > 0){
					$delete = dbDelete('user_badges', "WHERE user_id = '" . $row['id'] . "' AND badge_id = '" . $badge . "'");
				}
			}
		}
	}
	
	function UserAddBan($typ, $value, $reason, $timer, $added_by)
	{
		global $mysqli;
		global $core;
		
		$expire = $timer+time();
		if($typ == 'user'){
			// User
			$userdb = dbSelect('*','users', "WHERE username = '" . $value . "' LIMIT 1");
			$userdata = $userdb->fetch_assoc();
			
			$form_data_ban = array(
				'bantype' => 'user',
				'value' => $value,
				'reason' => $reason,
				'expire' => $expire,
				'added_by' => $added_by,
				'added_date' => date("l, F d, Y", time())
			);
			dbInsert('bans', $form_data_ban);
			
			$query = $mysqli->query("UPDATE user_info SET bans = bans + '1' WHERE user_id = '".$userdata['id']."'");
				
			$form_data_user_vip = array(
				'auth_ticket' => ''
			);
			dbUpdate('users', $form_data_user_vip, "WHERE username = '" . $value . "' LIMIT 1");
			
			$core->MUS('signout', $userdata['id']);
		} else {
			// IP
			$userdb = dbSelect('*','users', "WHERE ip_last = '" . $value . "'");
			while($userdata = $userdb->fetch_array()){
				$check_ban = dbSelect('*','bans', "WHERE value = '" . $userdata['username'] . "' AND expire > '" . time() . "' LIMIT 1");
				if($check_ban->num_rows < 1){
					$form_data_ban = array(
						'bantype' => 'user',
						'value' => $userdata['username'],
						'reason' => $reason,
						'expire' => $expire,
						'added_by' => $added_by,
						'added_date' => date("l, F d, Y", time())
					);
					dbInsert('bans', $form_data_ban);
					
					$query = $mysqli->query("UPDATE user_info SET bans = bans + '1' WHERE user_id = '".$userdata['id']."'");
						
					$form_data_user_vip = array(
						'auth_ticket' => ''
					);
					dbUpdate('users', $form_data_user_vip, "WHERE id = '" . $value . "' LIMIT 1");
					
					$core->MUS('signout', $userdata['id']);
				}
			}
			
			$form_data_ban_ip = array(
				'bantype' => 'ip',
				'value' => $value,
				'reason' => $reason,
				'expire' => $expire,
				'added_by' => $added_by,
				'added_date' => date("l, F d, Y", time())
			);
			dbInsert('bans', $form_data_ban_ip);
		}
		
		$core->MUS("reloadbans");
	}
	
	function UserUnban($typ, $value, $reason, $added_by)
	{
		global $core;
		
		if($typ == 'user'){
			// User
			$form_data_unban = array(
				'expire' => time(),
				'unban_reason' => $reason.' (<i>entbannt von '. $added_by .'</i>)'
			);
			dbUpdate('bans', $form_data_unban, "WHERE value = '" . $value . "' LIMIT 1");
		} else {
			// IP
			$userdb = dbSelect('*','users', "WHERE ip_last = '" . $value . "'");
			while($userdata = $userdb->fetch_array()){
				$check_ban = dbSelect('*','bans', "WHERE value = '" . $userdata['username'] . "' AND expire < '" . time() . "' LIMIT 1");
				if($check_ban->num_rows < 1){
					$form_data_unban = array(
						'expire' => time(),
						'unban_reason' => $reason.' (<i>entbannt von '. $added_by .'</i>)'
					);
					dbUpdate('bans', $form_data_unban, "WHERE value = '" . $userdata['username'] . "' LIMIT 1");
				}
			}
			
			
			$form_data_unban_ip = array(
				'expire' => time(),
				'unban_reason' => $reason.' (<i>entbannt von '. $added_by .'</i>)'
			);
			dbUpdate('bans', $form_data_unban_ip, "WHERE value = '" . $value . "' LIMIT 1");
		}
		
		$core->MUS("reloadbans");
	}
	
	function EmuTaskStaffchat($text)
	{
		global $core;
		
		$core->MUS('sa', $text);
	}
	
	function EmuTaskHotelalert($text)
	{
		global $core;
		
		$core->MUS('ha', $text);
	}
	
	function EmuTaskUserDisconnect($userid)
	{
		global $core;
		
		$core->MUS('signout', $userid);
	}
	
	function EmuTaskSendUser($userid, $roomid)
	{
		global $core;
		
		$core->MUS('senduser', $userid.' '.$roomid);
	}
	
	function EmuTaskUnloadRoom($roomid)
	{
		global $core;
		
		$core->MUS('unloadroom', $roomid);
	}
	
	function EmuTaskGiveItem($art, $itemid, $pageid, $message = 'Geschenk vom Staff!', $limit = '0',  $userid = '')
	{
		global $core;
		
		if(!empty($userid)){
			$all = $userid.' '.$itemid.' '.$pageid.' '.$message;
			$core->MUS('giveitem', $all);
		} else {
			if($art == '1'){
				// Alle User online
				$usersdb = dbSelect('*','users', "WHERE online = 1 AND rank < 4");
				while($userdata = $usersdb->fetch_array()){
					$all = $userdata['id'].' '.$itemid.' '.$pageid.' '.$message;
					$core->MUS('giveitem', $all);
				}
			} elseif($art == '2'){
				// Alle User Online - Zufall
				$usersdb = dbSelect('*','users', "WHERE online = 1 AND rank < 4 ORDER BY RAND() LIMIT ".$limit);
				while($userdata = $usersdb->fetch_array()){
					$all = $userdata['id'].' '.$itemid.' '.$pageid.' '.$message;
					$core->MUS('giveitem', $all);
				}
			}
		}
	}
	
	function EmuTaskUserRoomsUnload($uname)
	{
		global $core;
		
		$roomsdb = dbSelect('*','rooms', "WHERE owner = '" . $uname . "'");
		while($roomdata = $roomsdb->fetch_array()){
			$core->MUS('unloadroom', $roomdata['id']);
		}
	}
	
	function VoucherRandom($code) {
		$characters = "1234567890abdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$key = $characters{rand(0,71)};
		for($i=1;$i<$code;$i++){
			$key .= $characters{rand(0,71)};
		}
		return $key;
	}
	
	function currency($userid, $action, $credits, $activity_points, $vip_points)
	{
		global $mysqli;
		global $core;
		
		if($action == 0){
			// Geben
			$mysqli->query("UPDATE users SET credits = credits+".$credits.", activity_points = activity_points+".$activity_points.", vip_points = vip_points+".$vip_points." WHERE id = '" . $userid . "'");
		} else {
			// Abziehen
			$mysqli->query("UPDATE users SET credits = credits-".$credits.", activity_points = activity_points-".$activity_points.", vip_points = vip_points-".$vip_points." WHERE id = '" . $userid . "'");
		}
		
		$core->MUS('updatecredits', $userid);
		$core->MUS('updatepixels', $userid);
		$core->MUS('updatepoints', $userid);
	}
}

?>