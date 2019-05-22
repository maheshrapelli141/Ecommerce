<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 1/1/19
 * Time: 2:05 AM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once('../Product.php');
require_once('../DB.php');

$product = new Product();
if(isset($_POST['addProduct'])){

    $name = $_POST['name'];
	$cost = $_POST['cost'];
	$sell = $_POST['sell'];	
	$stock = $_POST['stock'];
    $description = $_POST['description'];
    $target_dir = "uploads/";
	$file =  $_FILES["image"]["name"];
    $target_file = $target_dir.basename($_FILES["image"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $image =  basename( $_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
	$db = new DB();
	//$imgData = file_get_contents($_FILES['image']['name']);

	/*       $sql = "INSERT INTO products(name,description,image,cost_price,sell_price,stock) values('$name','$description','$target_file','$cost','$sell','$stock')";*/
	$sql = "INSERT INTO `products`( `name`, `description`, `image`, `cost_price`, `selling_price`, `stock`) VALUES ('$name','$description','$image	',$cost,$sell,$stock)";
	echo $sql;    	
	if(mysqli_query($db->getConnect(),$sql))
		echo "Success";
	else 
		echo "Failed";
    } else {
        echo "Sorry, there was an error uploading your file.===". basename( $_FILES["image"]["name"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Product Name"><br>
    <input type="text" name="cost" placeholder="Product Cost"><br>
    <input type="text" name="sell" placeholder="Product Sell"><br>
    <input type="text" name="stock" placeholder="Product Stock"><br>
    <textarea rows="7" cols="15" name="description" placeholder="Description"></textarea><br>
    <input type="file" name="image"/><br>
    <input type="submit" name="addProduct" value="UPLOAD"/><br>
</form>
<?php
$result = $product->getProduct(38);
if($row = mysqli_fetch_array($result)){
	echo "ID : ".$row['product_id'];
    echo "<img src='uploads/".$row['image']."' height='50px' width='50px'>";
}
?>
</body>
</html>
