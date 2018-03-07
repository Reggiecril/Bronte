<?php
session_start();
 if (!$_SESSION['authenticatedUser']) {
   
   header ("Location: ../mainPages/index.php");
 }
//Make connection to database
include '../connection/init.php';




//Gather from $_POST[]all the data submitted and store in variables
if(isset($_POST['submit']) )
{
 $name = $_POST['payee'];    
 $cardnumber = $_POST['cardnumber'];
 $sortcode = $_POST['sortcode'];
 $security = $_POST['back'];
 $expiry = $_POST['expirydate'];
}

			$query = "INSERT INTO PAYMENT
		    (PAYEE_NAME,CARD_NUMBER,SORT_CODE,SECURITY_CODE,EXPIRY_DATE)
		                
		    VALUES 
		    ('$name','$cardnumber','$sortcode','$security','$expiry')";
			
		
									                
		    mysqli_query($connection,$query);
		    
		    echo ("Thank You For Registering");
													
	     	header("location: thankyou.php "); 	 
?>
