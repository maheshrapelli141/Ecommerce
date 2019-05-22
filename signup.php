<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 3/1/19
 * Time: 1:24 PM
 */
?>
<script>
    $('#register').click(function () {
        $.post("php_lib.php",
            {
                username : $('#register-name'),
                email:  $('#register-email'),
                password : $('#register-password'),
                register : "true"
            },
            function (data , status) {
                alert(data+status);
                $('#main-container').load("login.php");
            }
        )
    });
</script>
<input type="text" name="name" placeholder="Username" id="register-name">
<input type="email" name="email" placeholder="Email"  id="register-email">
<input type="password" name="password" placeholder="Password"  id="register-password">
<button type="button" class="btn btn-primary"  id="register">Register</button>
