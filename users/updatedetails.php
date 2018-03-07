<?php
session_start();
 if (!$_SESSION['authenticatedUser']) {
   
   header ("Location: ../mainPages/index.php");
 }
	
	include '../connection/init.php';
	
	
    if (isset($_POST['Submit'])){
    	 
    	 
		 $CUSTOMER_SURNAME = $_POST['CUSTOMER_SURNAME'];
		 $CUSTOMER_FIRSTNAME = $_POST['CUSTOMER_FIRSTNAME'];
		 $PHONE_NUMBER = $_POST['PHONE_NUMBER'];
		 $ADDRESS = $_POST['ADDRESS'];
		 $POSTCODE = $_POST['POSTCODE'];
		 $EMAIL = $_POST['EMAIL'];
		 $PASSWORD = $_POST['PASSWORD'];
		 
			$query="UPDATE CUSTOMER
                SET CUSTOMER_SURNAME = '$CUSTOMER_SURNAME', CUSTOMER_FIRSTNAME = '$CUSTOMER_FIRSTNAME', PHONE_NUMBER = '$PHONE_NUMBER', ADDRESS = '$ADDRESS'
                , POSTCODE = '$POSTCODE', EMAIL = '$EMAIL', PASSWORD = '$PASSWORD'
                WHERE EMAIL = '".$_SESSION['authenticatedUser']."'";
			
		
									                
		    mysqli_query($connection,$query);
													
	     	header("location:../mainPages/index.php"); 	 
		 	
		 	
		 	
		 } else {
		 	
		 	echo 'Please Try Again';
		 }
		 
	

?>