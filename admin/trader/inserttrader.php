<?php
session_start();
 if (!$_SESSION['adminAuthorised']) {
   
   header ("Location: ../../mainPages/index.php");
 }
//Make connection to database
include '../../connection/init.php';


//Gather from $_POST[]all the data submitted and store in variables
if(isset($_POST['submit']) )
{
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $phonenumber = $_POST['phonenum'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $department = $_POST['department'];
}

//Construct INSERT query using variables holding data gathered
$query = "INSERT INTO TRADER (TRADER_FIRSTNAME,TRADER_SURNAME,PHONE_NUMBER,ADDRESS,POSTCODE,EMAIL,PASSWORD,TRADER_DEPARTMENT) 
VALUES ('$firstname', '$lastname','$phonenumber','$address','$postcode','$email','$password','$department');"; 


//run $query
$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 

//return to calling page(stored in the server variables)
	header("Location: ../admintrader.php");
		
?>
