<?php
/** fastforward.php
 * Created by Ricky Apuzzo III
 *
 * Here is what your URL would look like: http://websitename.com/fastforward.php?VideoID=1&StartAt=22&Version=1
 * Here is what a URL would look like when sending User to a help page, if the version did NOT match any videoID: http://websitename.com/videoto.php?VideoID=1&StartAt=22&Version=3
 * Assign values passed to URI, held in global variable GET, to applicable local script variables.
 * The variables below are assigned values from the link/query the User clicked on. 
 */
 	$videoId = (string) $_GET['VideoID']; // type-casted to string, however, (int) should be used if only numbers are expected, for added security. Set by query.
 	$startAt = (string) $_GET['StartAt']; // specific place-in-time to start youtube video, as set by query.
 	$version = (int) $_GET['Version']; // type-casted to int as a version should be a number. Set by query.
 /**	
 * Hard-code link to help page.
 */
	$helpUrl = 'http://google.com/help'; // change this to your help page.
/**
 * Hard-code link to error page.
 */
	$errorPage = 'https://www.google.com/search?q=error'; // change this to your error page.
/** 
 * Hard-code Youtube video links by adding them into this arrayOfVideos.
 * The number pointing to the URL represents the VideoID to match. 
 */
	$arrayOfVideos = array(1=>'https://youtu.be/6avJHaC3C2U',
						   2=>'https://youtu.be/6avJHaC3C2U');

/**
 * Let's check if video start is in seconds or minutes.
 * You can specify minutes using a colon, for example,
 * Ten minutes and 30 seconds would look like 10:30
 * 
 * The URL query would look like StartAt=10:30
 */
	function isStartTimeInSecondsOrMinutes($startAt)
	{
		if (strstr($startAt,':') === false) {
			return 'seconds';
		} 
		return 'minutes';
	}

	function getMinutes($startAt)
	{
		return strstr($startAt,':') === false ? 0 : strstr($startAt,':',true);
	}

	function getSeconds($startAt)
	{
		return strstr($startAt,':') === false ? 0 : substr(strstr($startAt,':'),1);
	}

	function convertStartTimeToSeconds($startAt)
	{
		if (isStartTimeInSecondsOrMinutes($startAt) === 'minutes') {
			$minutes = getMinutes($startAt);
			$seconds = getSeconds($startAt);
			return ($minutes * 60) + $seconds;
		}
		return $startAt;
	}

	if ($videoId != '') {
		// If the version does NOT exist as a videoId number in the arrayOfVideos then send User to help page.
		if (!array_key_exists($version,$arrayOfVideos)) {
			// this will redirect the User to the defined help page.
			header("Location: $helpUrl"); 
			exit();
		} else {
			// this will redirect the User to the defined video, by ID, found matching in arrayOfVideos.
			header('Location: '.$arrayOfVideos[$videoId].'?t='.convertStartTimeToSeconds($startAt).'s');
			exit();
		}
	}
	//WHEN ALL ELSE FAILS SEND USER TO ERROR PAGE.
	header("Location: $errorPage");
	exit();	