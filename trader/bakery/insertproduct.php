<?php
session_start();
 if (!$_SESSION['bakeryAuthorised']) {
   
   header ("Location: ../../mainPages/index.php");
 }
//Make connection to database
include '../../connection/init.php';


//Gather from $_POST[]all the data submitted and store in variables
if(isset($_POST['submit']) )
{
  $name = $_POST['productname'];
  $type = $_POST['producttype'];
  $description = $_POST['productdescription'];
  $price = $_POST['productprice'];
  $image = $_POST['imagefilename'];
  $quantity = $_POST['productquantity'];
  $stock = $_POST['productstock'];
  $minorder = $_POST['minorder'];
  $maxorder = $_POST['maxorder'];
  $alergy = $_POST['alergy'];
  $trader = $_POST['traderid'];
  $shared = $_POST['shared'];
}

//Construct INSERT query using variables holding data gathered
$query = "INSERT INTO PRODUCT (PRODUCT_NAME,PRODUCT_TYPE,PRODUCT_DESCRIPTION,PRODUCT_PRICE,IMAGE_FILENAME,QUANTITY_PER_ITEM,AVAILABLE_STOCK,MIN_ORDER,MAX_ORDER,ALLERGY_INFO,TRADER_ID,SHARED) 
VALUES ('$name', '$type','$description','$price','$image','$quantity','$stock','$minorder','$maxorder','$alergy','$trader','$shared');"; 


//run $query
$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 

//return to calling page(stored in the server variables)
	header("Location: ../bakeryhome.php");
		
?>
