<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 1/1/19
 * Time: 12:10 PM
 */
require_once('Cart.php');
require_once('User.php');
require_once('SessionManager.php');

$cart = new Cart();
$user = new User();
$sessionmanager = new SessionManager();

if(isset($_POST['addtoCart'])){
    if(isset($_SESSION['email'])){
        $cart->addToCart($sessionmanager->getUserID(),$_POST['value']);
        echo "Success";
    }
}
if(isset($_POST['removeFromCart'])){
    $cart->removeFromCart($_POST['value']);
    echo "Success";
}
if(isset($_POST['login'])){
    if($user->loginCheck($_POST['email'],$_POST['password'])){
        $result = $user->getUserByEmail($_POST['email']);
        $sessionmanager->createSession($result['user_id'],$result['username'],$result['email']);
        echo "1";
    }
    else
        echo "0";
}
if(isset($_POST['logout'])){
    $sessionmanager->destroySession();
    echo "1";
}
if(isset($_POST['register'])){
    if($user->addUser($_POST['username'],$_POST['email'],$_POST['password'])){
        echo "Success";
    } else {
        echo "Failed";
    }

}
?>

