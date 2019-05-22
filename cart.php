<script>
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
</script>
<div class="cartbox" id="cartbox">
    <div class="box">
        <?php
        /**
         * Created by PhpStorm.
         * User: mahesh
         * Date: 1/1/19
         * Time: 11:49 AM
         */

        require_once('Cart.php');
        require_once('SessionManager.php');
        $sessionManager = new SessionManager();
        $cart = new Cart();
        $result = $cart->getCartProducts($sessionManager->getUserID());
        ?>
        <div class="layer"></div>
        <div class="cart-inside" id="cart-inside">
            <a><span class="glyphicon glyphicon-remove cart-close"></span></a>
            <h3>Product in cart :</h3>
           <ul class="list-group" id="cart-list">
               <?php while($row = mysqli_fetch_array($result)){ ?>
               <li class="list-group-item" value="<?php echo $row['cart_id']; ?>"><?php echo $row['name']; ?><a><span class="glyphicon glyphicon-remove item-remove"></span></a></li>
               <?php } ?>
           </ul>
            <button type="button" name="checkout" class="btn btn-primary btn-checkout">Checkout</button>
        </div>
    </div>
</div>
