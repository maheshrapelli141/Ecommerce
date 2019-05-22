<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 3/1/19
 * Time: 12:15 PM
 */

require('Product.php');
require_once('SessionManager.php');
$sessionManager = new SessionManager();
$products = new Product();
$productsList = $products->getAllProducts();
?>
<script>
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
    $('#login-first').click(function () {
        $('#main-container').load("login.php");
    });
</script>
<div class="row">
    <?php while($eachProduct = mysqli_fetch_array($productsList)){  ?>
        <div class="col-sm-3">
            <div class="card">
                <img src="test/<?php echo $eachProduct['image']; ?>" height="100" width="100">
                <h3><?php echo $eachProduct['name']; ?></h3>
                <p><?php echo $eachProduct['description']; ?></p>
                <?php if(isset($_SESSION['email'])){ ?>
                <button class="btn btn-default btn-addtocart" value="<?php echo $eachProduct['product_id']; ?>">Add to Cart</button>
                <?php } else { ?>
                <button class="btn btn-default" id="login-first" value="<?php echo $eachProduct['product_id']; ?>">Login First</button>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
