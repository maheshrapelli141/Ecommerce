<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 3/1/19
 * Time: 1:03 PM
 */
require_once('SessionManager.php');
$sessionManager = new SessionManager();
$sessionManager->startSession();
?>
Welcome cheif - <?php echo $sessionManager->getUsername()." - ".$sessionManager->getUserID(); ?>
