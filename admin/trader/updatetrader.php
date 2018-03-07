<?php
session_start();
 if (!$_SESSION['adminAuthorised']) {
   
   header ("Location: ../../mainPages/index.php");
 }
//Make connection to database
include '../../connection/init.php';

include '../../sections/head.php';

//Gather data sent from AmendProducts.php page
$ID = $_POST['hiddenID'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$password = $_POST['password'];
$department = $_POST['department'];

//Produce an update query to update product record for the id provided
$query = "UPDATE TRADER set TRADER_FIRSTNAME = '$firstname', TRADER_SURNAME = '$lastname' ,PHONE_NUMBER = '$phonenumber', ADDRESS ='$address', POSTCODE = '$postcode', EMAIL = '$email', PASSWORD = '$password', TRADER_DEPARTMENT = '$department' WHERE TRADER_ID = '$ID'";
//echo $query;
//exit();

//run query 
$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 

 
//Redirect to ManageProducts.php page
header("Location: ../admintrader.php") ;

?>
