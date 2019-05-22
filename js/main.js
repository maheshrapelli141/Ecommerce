$(document).ready(function(){
    $('#cart').click(function () {
        $("#cartbox").fadeIn(200);
    });
    $('.layer').click(function () {
        $("#cartbox").fadeOut(200);
    });
    $('.cart-close').click(function () {
        $("#cartbox").fadeOut(200);
    });
    $('.item-remove').click(function () {
        var str = $(this).parents("li").index();
        var target = $('#cart-list li').eq(str);
        $.post("php_lib.php",
            {
                value : target.attr('value'),
                removeFromCart : "true"
            },
            function (data , status) {
                target.remove();
            }
        );

    });
    $('.btn-addtocart').click(function () {
        $.post("php_lib.php",
            {
                value : $(this).attr('value'),
                addtoCart : "true"
            },
            function (data , status) {
                $('#cart-section').load("cart.php");
            }
            );
    });
    $('#login').click(function () {
        $('#main-container').load("login.php");
    });
    $('#logout-button').click(function () {
        $.post("php_lib.php",
            {
                logout: "true"
            },
            function (data , status) {
                window.location.replace("index.php");
            }
        )
    });
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
    $('#products').click(function () {
        $('#main-container').load("products.php");
    });
    $('#home').click(function () {
        $('#main-container').load("main.php");
    });
    $('#userhome').click(function () {
        $('#main-container').load("userhome.php");
    });
    $('#login-first').click(function () {
        $('#main-container').load("login.php");
    });
    $('#signup').click(function () {
        $('#main-container').load("signup.php");
    });
});