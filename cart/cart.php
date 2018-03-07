<?php

include '../sections/nav.php';
session_start();


require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
	
switch($_GET["action"]) {
	case "add": 
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE PRODUCT_NAME='" . $_GET["PRODUCT_NAME"] . "'");
			$itemArray = array($productByCode[0]["PRODUCT_NAME"]=>array('PRODUCT_DESCRIPTION'=>$productByCode[0]["PRODUCT_DESCRIPTION"], 'PRODUCT_NAME'=>$productByCode[0]["PRODUCT_NAME"], 'quantity'=>$_POST["quantity"], 'PRODUCT_PRICE'=>$productByCode[0]["PRODUCT_PRICE"]));
			
			if(!empty($_SESSION["cart_item"])) {
				
				if(in_array($productByCode[0]["PRODUCT_NAME"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["PRODUCT_NAME"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
		
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["PRODUCT_NAME"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
						
			}
			echo'<a href="../mainPages/shop.php"><h3 class="table-links"> Start Shopping  </h3></a>';
		}
		
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
		
	break;
	
}

}

?>




<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
   
    
?>	

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			
			<h3 class="table-links"> Your Basket </h3>
			<table align="center" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:center;"><strong>Product Name</strong></th>
<th style="text-align:center;"><strong>Description</strong></th>
<th style="text-align:center;"><strong>Quantity</strong></th>
<th style="text-align:center;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){

		?>
				<tr>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><?php echo $item["PRODUCT_NAME"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><?php echo $item["PRODUCT_DESCRIPTION"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td class="price" style="text-align:center;border-bottom:#F0F0F0 1px solid;"><?php echo "&pound;".$item["PRODUCT_PRICE"].".00" ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="cart.php?action=remove&PRODUCT_NAME=<?php echo $item["PRODUCT_NAME"]; ?>" class="btnRemoveAction"><span class="glyphicon glyphicon-remove" style="color:red"></span></a></td>
				</tr>
				<?php
        $item_total += ($item["PRODUCT_PRICE"]*$item["quantity"]);
		}
		?>

<tr>
<td class="price-total" colspan="5" align=right><strong>Total:</strong> <?php echo "&pound;".$item_total.".00" ?></td>
</tr>
</tbody>
</table>

<a href="buynow.php?action=display<?php $_SESSION["cart_item"] ?>&action=add&PRODUCT_NAME=<?php echo $product_array[$key]["PRODUCT_NAME"]; ?>"><h3 class="table-links"> Buy Now  </h3></a>
<a href="index.php?content=mainPage/testclasses.php"><h3 class="table-links"> Continue shopping  </h3></a>

  <?php
}
?>

		</div>
	</div>
</div>


<?php 

include '../sections/bottom-section.php';

?>