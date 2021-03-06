<?php
/**
 * Open Source Social Network
 *
 * @package   (Informatikon.com).ossn
 * @author    OSSN Core Team <info@opensource-socialnetwork.org>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */

//init ossnwall
$OssnWall = new OssnWall;

//poster guid and owner guid is same as user is posting on its own wall
$OssnWall->owner_guid = ossn_loggedin_user()->guid;
$OssnWall->poster_guid = ossn_loggedin_user()->guid;

//check if users is not posting on its own wall then change wallowner
$owner = input('wallowner');
if (isset($owner) && !empty($owner)) {
    $OssnWall->owner_guid = $owner;
}

//walltype is user
$OssnWall->name = 'user';


//getting some inputs that are required for wall post
$post = input('post');
$friends = input('friends');
$location = input('location');
$privacy = input('privacy');

//validate wall privacy 
$privacy = ossn_access_id_str($privacy);
if (!empty($privacy)) {
    $access = input('privacy');
} else {
    $access = OSSN_FRIENDS;
}
if ($OssnWall->Post($post, $friends, $location, $access)) {
    //no need to show message on success
    // ossn_trigger_message(ossn_print('post:created'), 'success');
    redirect(REF);
} else {
    ossn_trigger_message(ossn_print('post:create:error'), 'error');
    redirect(REF);
}
