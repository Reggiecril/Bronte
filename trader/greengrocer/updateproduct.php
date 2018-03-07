<?php
session_start();
 if (!$_SESSION['greenAuthorised']) {
   
   header ("Location: ../../mainPages/index.php");
 }
//Make connection to database
include '../../connection/init.php';

include '../../sections/head.php';

//Gather data sent from AmendProducts.php page
$ID = $_POST['hiddenID'];
$name = $_POST['product_name'];
$product_type = $_POST['product_type'];
$description = $_POST['product_desc'];
$price = $_POST['product_price'];
$image = $_POST['image_filename'];
$stock = $_POST['available_stock'];

//Produce an update query to update product record for the id provided
$query = "UPDATE PRODUCT set PRODUCT_NAME = '$name', PRODUCT_TYPE = '$product_type' ,PRODUCT_DESCRIPTION = '$description', PRODUCT_PRICE ='$price', IMAGE_FILENAME = '$image', AVAILABLE_STOCK = '$stock' WHERE PRODUCT_ID = '$ID'";
//echo $query;
//exit();

//run query 
$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 

 
//Redirect to ManageProducts.php page
header("Location: ../greengrocerhome.php") ;

?>
