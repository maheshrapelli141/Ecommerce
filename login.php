<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 2/1/19
 * Time: 1:30 PM
 */
?>
<script>
    $('#login-button').click(function () {
        $.post("php_lib.php",
            {
                email : $('#login-email').val(),
                password : $('#login-password').val(),
                login : "true"
            },
            function (data , status) {
                if($.trim(data) =='1'){
                    window.location.replace("welcome.php");
                }
                else if($.trim(data) =='0'){
                    $('#main-container').load("login.php");
                }
            }
        );
    });
</script>
    <input type="text" name="email" id="login-email">
    <input type="password" name="password" id="login-password">
    <button type="button" id="login-button">Login</button>
