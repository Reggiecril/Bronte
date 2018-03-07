<?php 
	
	include '../connection/init.php';
	
	
    if (isset($_POST['Submit'])){
    	 
    	 $ID = $_POST['CUSTOMER_ID'];
		 $CUSTOMER_SURNAME = $_POST['CUSTOMER_SURNAME'];
		 $CUSTOMER_FIRSTNAME = $_POST['CUSTOMER_FIRSTNAME'];
		 $PHONE_NUMBER = $_POST['PHONE_NUMBER'];
		 $ADDRESS = $_POST['ADDRESS'];
		 $POSTCODE = $_POST['POSTCODE'];
		 $EMAIL = $_POST['EMAIL'];
		 $PASSWORD = md5($_POST['PASSWORD']);
		 
		 
		 
			$query = "INSERT INTO CUSTOMER
		    (CUSTOMER_SURNAME,CUSTOMER_FIRSTNAME,PHONE_NUMBER,ADDRESS,POSTCODE,EMAIL,PASSWORD)
		                
		    VALUES 
		    ('$CUSTOMER_SURNAME','$CUSTOMER_FIRSTNAME','$PHONE_NUMBER','$ADDRESS','$POSTCODE','$EMAIL','$PASSWORD')";
			
		
									                
		    mysqli_query($connection,$query);
		    
		    
		    header("Location: pay.php");	 
		 	
		 	
		 	
		 } else {
		 	
		 	header("Location: buynow.php");
		 }
		 
	

?>