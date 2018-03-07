<?php
session_start();
 if (!$_SESSION['adminAuthorised']) {
   
   header ("Location: ../mainPages/index.php");
 }
//Make connection to database
include '../connection/init.php';
include '../sections/head.php';

//Gather id sent from admin page
$id = $_GET['id'];
//echo $id;
//exit;

//Produce query to select the product record for the id provided
$query = "SELECT *
FROM PRODUCT 
WHERE PRODUCT_ID = '$id'";
//echo $query;

//run query and store result
$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 

//extract row from result using mysqli_fetch_assoc()and store $row
$row = mysqli_fetch_assoc($result);
?>

<div class="container">
 <div class="row">
  
 
  <div class="col-lg-12 col-md-12 col-sm-12">
       <h3 class="table-links"> Amend Product </h3>

<form method="post" action="updateproduct.php">
<fieldset>
	<input type="hidden" name="hiddenID" value="<?php echo $id; ?>" /> 
	
	<label for="title">Product Name: </label>
	<input type="text" name="product_name" value="<?php echo $row['PRODUCT_NAME']; ?>"/> <br />
		
	<label for="title">Product Type: </label>
	<input type="text" name="product_type" value="<?php echo $row['PRODUCT_TYPE']; ?>"/> <br />
			
	<label for="description">Product Description: </label>
	<input type=`"text" name="product_desc" value="<?php echo $row['PRODUCT_DESCRIPTION']; ?>"/> <br />
	
	<label for="category">Product Price: </label>
	<input type=`"text" name="product_price" value="<?php echo $row['PRODUCT_PRICE'];?>"/> <br />
	
	<label for="description">Image Filename: </label>
	<input type=`"text" name="image_filename" value="<?php echo $row['IMAGE_FILENAME']; ?>"/> <br />
	
	<label for="description">Available Stock: </label>
	<input type=`"text" name="available_stock" value="<?php echo $row['AVAILABLE_STOCK']; ?>"/> <br />
		

		
	<input type="submit" value="Submit" name="loginSubmit" class="buynow-button" />
		
	</fieldset>
	</form>
	</div>
</div>
</div>

