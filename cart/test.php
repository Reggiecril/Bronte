<?php



$_SESSION ['product_name'] = $_POST['PRODUCT_NAME'];



include '../connection/init.php';

$query = "SELECT * FROM PRODUCT WHERE PRODUCT_TYPE = 'Meat'";
if (isset($_POST['submit'])){
    $orderby = $_POST['orderby'];
    $category = $_POST['category'];
    $search = $_POST['search'];
    if($category!=='all'){
        $query=$query." AND PRODUCT_NAME = '$category'";
    }
    if($category!=='all'&&(!empty($search))){
        $query=$query." AND PRODUCT_DESCRIPTION LIKE'%$search%'";
    }
     if($category=='all'&&(!empty($search))){
        $query=$query." AND PRODUCT_DESCRIPTION LIKE'%$search%'";
    }
    if(!empty($orderby)){
        $query=$query." ORDER BY PRODUCT_NAME $orderby";
    }
//  echo $query;
  //exit;
    
$_SESSION['query']=$query;


    }


?>


<?php 

include '../sections/nav.php';

?> 
<div class="container">
 <div class="row">
  
  
  <div class="col-lg-12 col-md-12 col-sm-12">
   <img src="../assets/img/butcher-cover.png" class="centered-img"></img>
  </div>
  
 </div>
 
</div>
<?php
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


</div>
<div class="container">
 <div class="row">
  
  <div class="col-lg-3 col-md-3 col-sm-3">
   
  <div class=" panel-default my-panel hidden-sm hidden-xs">
    <div class="panel-heading">
      <h3 class="panel-title">Filter <span class="caret"></span></h3>
    </div>
    <div class="panel-body">
      <div class="form-group">
        <form method="post" action="">
   
         	<label class="filter-label" for="search"> Order By: </label>
           <input type="radio" name="orderby" <?php if (isset($orderby) && $orderby=="A-Z") echo "checked";?> value="ASC"> A-Z 
           <br><br>
           <input type="radio" name="orderby" <?php if (isset($orderby) && $orderby=="Z-A") echo "checked";?> value="DESC"> Z-A
           <span class="error"> <?php echo $orderby;?></span>
           <br>
           <br>
         
          <label class="filter-label" for="search"> Category: </label>
          <br>
          <select name="category">
           <option value="all">Choose A Category</option>
          	<option value="Chicken">Chicken</option>
           <option value="Lamb">Lamb</option>
           <option value="Veal">Veal</option>
          </select>
          <br>
          <br>
         
        	<label class="filter-label" for="search"> Search: </label>
        	<br>
        	<input type="text" name="search" placeholder='Search...'/>
        	<br><br> 
        	
        	<input type="submit" name="submit" value="Submit" class="filter-button" onClick=Confirm(); />
      
        </form>
      </div>  
     
   </div>
   </div>
   
   <div class=" panel-default my-panel hidden-lg hidden-md">
    <div class="panel-heading">
      <a data-toggle="collapse" href="#collapse-panel"><h3 class="panel-title">Filter <span class="caret"></span></h3><a/>
    </div>
    <div id="collapse-panel" class="panel-collapse collapse">
    <div class="panel-body">
      <div class="form-group">
        <form method="post" action="">
   
         	<label class="filter-label" for="search"> Order By: </label>
           <input type="radio" name="orderby" <?php if (isset($orderby) && $orderby=="A-Z") echo "checked";?> value="ASC">A-Z
           <input type="radio" name="orderby" <?php if (isset($orderby) && $orderby=="Z-A") echo "checked";?> value="DESC">Z-A
           <span class="error"> <?php echo $orderby;?></span>
           <br>
           <br>
         
          <label class="filter-label" for="search"> Category: </label>
           <select name="category" class="c-form-profession form-control" id="c-form-profession">
           <option value="all">Choose A Category</option>
          	<option value="Chicken">Chicken</option>
           <option value="Lamb">Lamb</option>
           <option value="Veal">Veal</option>
          </select>
          <br>
          <br>
         
        	<label class="filter-label" for="search"> Search: </label>
        	<input type="text" name="search" placeholder='Search...'/>
        	<br><br> 
        	
        	<input type="submit" name="submit" value="Submit" class="filter-button" onClick=Confirm(); />
      
        </form>
      </div>  
     
   </div>
   </div>
   </div>
   
   
   </div>
  
  <div class="col-lg-9 col-md-9 col-sm-9">
   <div class="row">
      
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM PRODUCT WHERE PRODUCT_TYPE = 'Meat' ORDER BY PRODUCT_ID ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&PRODUCT_NAME=<?php echo $product_array[$key]["PRODUCT_NAME"]; ?>">
			    <?php 
			    	
              		$container_class = 'container-fluid';  // Parent container class name
              		$row_class = 'row';    // Row class name
              		$col_class = 'col-xs-4'; // Column class name
      			
      			    
			        
			    	$img ='<img class="centered-img" src="../assets/img/'.($product_array[$key]["IMAGE_FILENAME"]).'" />';
			    
			        echo '<div class="'.$col_class.'">'.$img.'
      				<h5 class="product-title">'.$product_array[$key]["PRODUCT_NAME"].'<br><br></h5>
      				<h5 class="product-desc">'.$product_array[$key]["PRODUCT_DESCRIPTION"].'<br><br></h5>
      				<h5 class="product-price">£'.$product_array[$key]["PRODUCT_PRICE"].'.00<br><br></h5>
      				<input type="text" name="quantity" value="1" size="2" />
      				<input type="submit" value="Add to basket" class="buynow-button" />
      				</div>';
      				
      				
      				
     
      			?>
      		</form>	
		</div>
		
	<?php
			}
	}
	?>
    </div>
  </div>
  
 </div>
</div>


<?php 
 
  include '../sections/bottom-section.php'; 
 
?>

