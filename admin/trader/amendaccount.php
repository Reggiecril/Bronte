<?php
session_start();
 if (!$_SESSION['adminAuthorised']) {
   
   header ("Location: ../../mainPages/index.php");
 }
//Make connection to database
include '../../connection/init.php';
include '../../sections/head.php';

//Gather id sent from admin page
$id = $_GET['id'];
//echo $id;
//exit;

//Produce query to select the product record for the id provided
$query = "SELECT *
FROM TRADER 
WHERE TRADER_ID = '$id'";
//echo $query;

//run query and store result
$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 

//extract row from result using mysqli_fetch_assoc()and store $row
$row = mysqli_fetch_assoc($result);
?>

<div class="container">
 <div class="row">
  
 
  <div class="col-lg-12 col-md-12 col-sm-12">
       <h3 class="table-links"> Amend Trader </h3>

<form method="post" action="updatetrader.php">
<fieldset>
	<input type="hidden" name="hiddenID" value="<?php echo $id; ?>" /> 
	
	<label for="title">First Name: </label>
	<input type="text" name="firstname" value="<?php echo $row['TRADER_FIRSTNAME']; ?>"/> <br />
		
	<label for="title">Last Name: </label>
	<input type="text" name="lastname" value="<?php echo $row['TRADER_SURNAME']; ?>"/> <br />
			
	<label for="description">Phone Number: </label>
	<input type=`"text" name="phonenumber" value="<?php echo $row['PHONE_NUMBER']; ?>"/> <br />
	
	<label for="category">Address: </label>
	<input type=`"text" name="address" value="<?php echo $row['ADDRESS'];?>"/> <br />
	
	<label for="description">Post Code: </label>
	<input type=`"text" name="postcode" value="<?php echo $row['POSTCODE']; ?>"/> <br />
	
	<label for="description">Email: </label>
	<input type=`"text" name="email" value="<?php echo $row['EMAIL']; ?>"/> <br />
	
	<label for="description">Password: </label>
	<input type=`"text" name="password" value="<?php echo $row['PASSWORD']; ?>"/> <br />
	
	<label for="description">Department: </label>
	<input type=`"text" name="department" value="<?php echo $row['TRADER_DEPARTMENT']; ?>"/> <br />
		

		
	<input type="submit" value="Submit" name="loginSubmit" class="buynow-button" />
		
	</fieldset>
	</form>
	</div>
</div>
</div>

