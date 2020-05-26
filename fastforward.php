<?php
/** fastforward.php
 * Created by Ricky Apuzzo III
 *
 * Here is what your URL would look like: http://websitename.com/fastforward.php?VideoID=1&StartAt=22&Version=1
 * Here is what a URL would look like when sending User to a help page, if the version did NOT match any videoID: http://websitename.com/videoto.php?VideoID=1&StartAt=22&Version=3
 * Assign values passed to URI, held in global variable GET, to applicable local script variables.
 * The variables below are assigned values from the link/query the User clicked on. 
 *
 *	$videoId = (string) $_GET['VideoID']; // type-casted to string, however, (int) should be used if only numbers are expected, for added security. Set by query.
 *	$startAt = (int) $_GET['StartAt']; // specific place-in-time to start youtube video, as set by query.
 *	$version = (int) $_GET['Version']; // type-casted to int as a version should be a number. Set by query.
 *	
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
	$arrayOfVideos = array(1=>'https://youtu.be/c_fUcDsgSjA',
						   2=>'https://youtu.be/MnR9AVs6Q_c');
/**
 * If VideoID is NOT empty
 */ 
if ($videoId != '') {
	
	// If the version does NOT exist as a videoId number in the arrayOfVideos then send User to help page.
	if (!array_key_exists($version,$arrayOfVideos)) {
		
			// this will redirect the User to the defined help page.
			header("Location: $helpUrl"); 
			exit();
			
	} else {
		
			// this will redirect the User to the defined video, by ID, found matching in arrayOfVideos.
			header('Location: '.$arrayOfVideos[$videoId].'?t='.$startAt.'s');
			exit();

	}
}

//WHEN ALL ELSE FAILS SEND USER TO ERROR PAGE.
header("Location: $errorPage");
exit();	