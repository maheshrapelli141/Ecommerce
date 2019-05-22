<body>
<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 31/12/18
 * Time: 1:50 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
require('header.php');
require_once('SessionManager.php');
$sessionManager = new SessionManager();
echo "<body>";
require('navbar.php');
?>

<div class="container" id="main-container">
<?php require_once('main.php'); ?>
</div>

</body>
</html>