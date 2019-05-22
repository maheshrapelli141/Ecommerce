<?php
echo "<div id='cart-section'>";
    require('cart.php');
    echo "</div>";
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php if(!isset($_SESSION['email'])){ ?>
                <li id="home"><a href="#">Home</a></li>
                <?php } else { ?>
                <li id="userhome"><a href="#">Home</a></li>
                <?php } ?>
                <li id="products"><a href="#products">Products</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['email'])){ ?>
                <li id="signup"><a href="#signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li id="login"><a href="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } else { ?>
                <li><a href="#" id="cart"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                <li><a href="#" id="logout-button"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
