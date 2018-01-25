<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

class Core
{
	function ServerStatus($st)
	{
		$query = dbSelect('*','server_status');
		$serverstatus = $query->fetch_assoc();
		return $serverstatus[$st];
	}
	
	function MUS($command, $data = '')
	{
		global $_CONFIG;
		
		$MUSdata = $command . chr(1) . $data;
		$socket = @socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
		@socket_connect($socket, $_CONFIG['client']['ip'], $_CONFIG['client']['mus']);
		@socket_send($socket, $MUSdata, strlen($MUSdata), MSG_DONTROUTE);
	}
	
	function lasttimeword( $datestr='' )
	{
		$now = time();
		$date = $datestr;
		$d = $now-$date;
		if( $d < 60 ) {
			$d = round($d);
			return 'vor '.($d==1?'einer Sekunde':$d.' Sekunden');
		}
		$d = $d/60;
		if( $d < 12.5 ) {
			$d = round($d);
			return 'vor '.($d==1?'einer Minute':$d.' Minuten');
		}
		switch( round($d/15) ) {
			case 1:
				return 'vor einer viertel Stunde';
			case 2:
				return 'vor einer halben Stunde';
			case 3:
				return 'vor einer dreiviertel Stunde';
		}
		$d = $d/60;
		if( $d < 6 ) {
			$d = round($d);
			return 'vor '.($d==1?'einer Stunde':$d.' Stunden');
		}
		if( $d < 36 ) {
			// ein Tag beginnt um 5 Uhr morgens
			$day_start = 5;
			if( date('j',($now-$day_start*3600)) == date('j',($date-$day_start*3600)) )
				$r = 'heute';
			elseif( date('j',($now-($day_start+24)*3600)) == date('j',($date-$day_start*3600)) )
				$r = 'gestern';
			else
				$r = 'vorgestern';
			$hour_date = intval(date('G',$date)) + (intval(date('i',$date))/60);
			$hour_now = intval(date('G',$now)) + (intval(date('i',$now))/60);
			if( $hour_date>=22.5 || $hour_date<$day_start ) {
				$r = $r=='gestern' ? 'letzte Nacht' : $r.' Nacht';
			}
			elseif( $hour_date>=$day_start && $hour_date<9 )
				$r .= ' Morgen';
			elseif( $hour_date>=9 && $hour_date<11.5 )
				$r .= ' Vormittag';
			elseif( $hour_date>=11.5 && $hour_date<13.5 )
				$r .= ' Mittag';
			elseif( $hour_date>=13.5 && $hour_date<18 )
				$r .= ' Nachmittag';
			elseif( $hour_date>=18 && $hour_date<22.5 )
				$r .= ' Abend';
			return $r;
		}
		$d = $d/24;
		if( $d < 7 ) {
			$d = round($d);
			return 'vor '.($d==1?'einem Tag':$d.' Tagen');
		}
		$d_weeks = $d/7;
		if( $d_weeks<4 ) {
			$d = round($d_weeks);
			return 'vor '.($d==1?'einer Woche':$d.' Wochen');
		}
		$d = $d/30;
		if( $d<12 ) {
			$d = round($d);
			return 'vor '.($d==1?'einem Monat':$d.' Monaten');
		}
		if( $d<18 ) {
			return 'vor einem Jahr';
		}
		if( $d<21 ) {
			return 'vor eineinhalb Jahren';
		} else {
			$d = round($d/12);
			return 'vor '.$d.' Jahren';
		}
	}
	
	function VipTimeCheck()
	{
		global $user;
		
		if($user->UserData('vip') == 1) {
			$timenow = time();
			if($user->UserData('vip_time') < $timenow){
				$form_data_user_vip = array(
					'vip' => '0',
					'vip_time' => '0'
				);
				dbUpdate('users', $form_data_user_vip, "WHERE id = '" . $user->UserData('id') . "'");
				if($user->UserData('rank') == 3){
					$form_data_user_rank = array(
						'rank' => '2'
					);
					dbUpdate('users', $form_data_user_rank, "WHERE id = '" . $user->UserData('id') . "'");
				}
				$this->MUS('updatevip', $user->UserData('id'));
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function getHCDays($my_id)
	{

		$userhc = dbSelect('*', 'user_subscriptions', "WHERE user_id = '".$my_id."' LIMIT 1");
		
		if ($userhc->num_rows < 1){
			return 0;
		}
		
		$data = $userhc->fetch_assoc();
		$different = $data['timestamp_expire'] - time();
		
		if ($different <= 0){
			return 0;
		}
		
		return ceil($different / 86400);
	}
	
	/*function VisitorsLog()
	{
		global $remoteip;
		
		if(empty($_SESSION['visitorlog'])) {
			$country = $_SERVER["HTTP_CF_IPCOUNTRY"];
			$agent = $_SERVER["HTTP_USER_AGENT"];
			$form_data_vitiors = array(
			'ip' => $remoteip,
			'location' => $country,
			'agent' => $agent,
			'date' => time()
			);
			dbInsert('cms_visitor_logs', $form_data_vitiors);
			
			$_SESSION['visitorlog'] = true;
			return true;
		} else {
			return false;
		}
	}*/
	
	function GenerateTicket()
	{
		$data = "ST-".$_SESSION['id'];

		for ($i=1; $i<=6; $i++){
			$data = $data . rand(0,9);
		}

		$data = $data . "-";

		for ($i=1; $i<=20; $i++){
			$data = $data . rand(0,9);
		}

		$data = $data . "";
		$data = $data . rand(0,5);

		return $data;
	}
}
?>