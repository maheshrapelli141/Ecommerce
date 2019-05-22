<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 2/1/19
 * Time: 1:58 PM

 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('SessionManager.php');
$sessionManager = new SessionManager();
$sessionManager->startSession();

require_once('header.php');
require_once('navbar.php');
 ?>
<div class="container" id="main-container">
<?php require_once('userhome.php'); ?>
</div>
