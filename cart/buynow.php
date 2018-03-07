<?php 

include '../connection/init.php';
include '../sections/head.php';
include '../sections/footer.php';
session_start();


require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM PRODUCT WHERE PRODUCT_NAME='" . $_GET["PRODUCT_NAME"] . "'");
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
			
			<h3 class="table-links"> Your Final Basket </h3>
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


  <?php
}
?>

			
		</div>
	</div>
	
	 <?php
                
                if (isset($_SESSION['authenticatedUser'])) {
                  
                  
                  
                } else {
                  
                
                  	echo '<div class="panel-default my-panel">
    <div class="panel-heading">
      <a href="#collapse-panel-login" data-toggle="collapse"><h3 class="panel-title"> Already Got An Account? <span class="caret"></span></h3></a>
    </div>
    <div id="collapse-panel-login" class="panel-collapse collapse">
    <div class="panel-body">
      <div class="form-group">
         <form method="POST" action="cartlogin.php">
        
        		<label for="email">Email address:</label>
        		<input type="email" placeholder="Enter email" name="email" required="required"/>
        		<span class="error">* Required</span>
      		 
    		  	<label for="password">Password:</label>
    			  <input type="password" placeholder="Password" name="password" required="required"/>
    			  <span class="error">* Required</span>
    			  
    		 
            <input type="submit" name="submit" class="buynow-button" />
    
        </form>
      </div>  
     
   </div>
   </div>
   </div>';
   
   
   echo '<div class=" panel-default my-panel">
    <div class="panel-heading">
      <a data-toggle="collapse" href="#collapse-panel-guest"><h3 class="panel-title"> create An Account <span class="caret"></span></h3></a>
    </div>
     <div id="collapse-panel-guest" class="panel-collapse collapse">
    <div class="panel-body">
      <div class="form-group">
        <form method="POST" action="cartsignup.php" autocomplete="off">
                        
                        <label for="CUSTOMER_FIRSTNAME">First Name:</label>
                        <input type="text" name="CUSTOMER_FIRSTNAME" placeholder="First Name" required="required" /> 
                        <span class="error">* Required </span>
                        
                        <label for="CUSTOMER_SURNAME">Surname:</label>
                        <input type="text" name="CUSTOMER_SURNAME" placeholder="Surname" required="required"/> 
                        <span class="error">* Required </span>
                        
                        <label for="PHONE_NUMBER">Phone Number: </label>
                        <input type="tel" pattern="^\d{11}" name="PHONE_NUMBER" placeholder="07123456789" required="required" /> 
                        <span class="error">* Required </span>
                        
                        <label for="ADDRESS">Address:</label>
                        <input type="text" name="ADDRESS" placeholder="Address" required="required" /> 
                        <span class="error">* Required </span>
                        
                        <label for="POSTCODE">Post Code:</label>
                        <input type="text" name="POSTCODE" placeholder="Postcode" required="required"/> 
                        <span class="error">* Required </span>
                        
                        <label for="EMAIL"> Email:</label>
                        <input type="email" name="EMAIL" placeholder="Email" autocomplete="off" required="required"/> 
                        <span class="error">* Required </span>
                        
                        <label for="PASSWORD">Password:</label>
                        <input type="password" name="PASSWORD" placeholder="Password" autocomplete="off" required="required" /> 
                        <span class="error">* Required </span>
                        

                        <input type="submit" value="Submit" name="Submit" class="buynow-button"  />
                       
                    </form>
      </div>  
     
   </div>
   </div>';
                  
                } 
               ?>
	

	
</div>

   
   
   
   
   
</div>


<div class="container">

<a href="pay.php?action=display<?php $_SESSION["cart_item"] ?>&action=add&PRODUCT_NAME=<?php echo $product_array[$key]["PRODUCT_NAME"]; ?>"><h3 class="table-links"> Buy Now  </h3></a>    
    
</div>



