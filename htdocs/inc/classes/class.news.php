<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

class News
{
	function NewsView($newsid)
	{
		global $mysqli;
		if(empty($_SESSION['newsviews'][$newsid])) {
			$query = $mysqli->query("UPDATE cms_news SET views = views + 1 WHERE id = '" . $newsid . "' LIMIT 1");
			$_SESSION['newsviews'][$newsid] = 'true';
			return true;
		} else {
			return false;
		}
	}
	
	function NewsUserData($userdata) 
	{
  
		$user_row = dbSelect('*', 'users', "WHERE id = '" . $_SESSION["id"] . "' LIMIT 1");
		$user_userdata = $user_row->fetch_assoc();
		
		$userdata = str_replace("%username%", $user_userdata['username'], ($userdata));
		$userdata = str_replace("%taler%", $user_userdata['credits'], ($userdata));
		$userdata = str_replace("%pixel%", $user_userdata['activity_points'], ($userdata));
		$userdata = str_replace("%vippunkte%", $user_userdata['vip_points'], ($userdata));
		
		return $userdata;
	}
	
	function SurveyAnswer($newsid, $userid, $answerid, $answertext)
	{
		global $_CONFIG;
		
		$form_data_answer = array(
		'news_id' => $newsid,
		'user_id' => $userid,
		'answer_id' => $answerid,
		'answer_text' => $answertext,
		'timestamp' => time()
		);
		dbInsert('cms_news_survey_results', $form_data_answer);
		header('location: '. $_CONFIG['website']['url'].'/news/'.$newsid);
	}
}

?>