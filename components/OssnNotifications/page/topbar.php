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

//declear empty variables;
$friends_c = '';
//init classes
$notification = new OssnNotifications;
$messages = new OssnMessages;

$count_notif = $notification->countNotification(ossn_loggedin_user()->guid);
$count_messages = $messages->countUNREAD(ossn_loggedin_user()->guid);

$friends = ossn_loggedin_user()->getFriendRequests();
if (count($friends) > 0 && !empty($friends)) {
    $friends_c = count($friends);
}
?>
<li id="ossn-notif-friends">
    <a onClick="Ossn.NotificationFriendsShow(this);" class="ossn-notifications-friends" href="javascript::;">
                       <span>
                      <?php if ($friends_c > 0) { ?>
                          <div class="ossn-icon ossn-icons-topbar-friends-new ossn-icons-topbar"></div>
                          <span class="ossn-notification-container"><?php echo $friends_c; ?></span>
                      <?php } else { ?>
                          <div class="ossn-icon ossn-icons-topbar-friends ossn-icons-topbar"></div>
                          <span class="ossn-notification-container ossn-notif-hide"></span>
                      <?php } ?>
                       </span>
    </a>
</li>

<li id="ossn-notif-messages">
    <a onClick="Ossn.NotificationMessagesShow(this)" href="javascript::;" class="ossn-notifications-messages">
                       <span>
                        <?php if ($count_messages > 0) { ?>
                            <div class="ossn-icon ossn-icons-topbar-messages-new ossn-icons-topbar"></div>
                            <span class="ossn-notification-container"><?php echo $count_messages; ?></span>
                        <?php } else { ?>
                            <div class="ossn-icon ossn-icons-topbar-messages ossn-icons-topbar"></div>
                            <span class="ossn-notification-container ossn-notif-hide"></span>

                        <?php } ?>
                       </span>
    </a></li>
<li id="ossn-notif-notification">
    <a onClick="Ossn.NotificationShow(this)" class="ossn-notifications-notification" href="javascript::;">
                       <span>
                       <?php if ($count_notif > 0) { ?>
                           <div class="ossn-icon ossn-icons-topbar-notifications-new ossn-icons-topbar"></div>
                           <span class="ossn-notification-container"><?php echo $count_notif; ?></span>
                       <?php } else { ?>
                           <div class="ossn-icon ossn-icons-topbar-notification ossn-icons-topbar"></div>
                           <span class="ossn-notification-container ossn-notif-hide"></span>
                       <?php } ?>
                       </span>
    </a>
</li>