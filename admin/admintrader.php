<?php
session_start();
 if (!$_SESSION['adminAuthorised']) {
   
   header ("Location: ../mainPages/index.php");
 }

include '../connection/init.php';
include '../sections/head.php';

?>

<div class="container">
 <div class="row">
  

  <div class="col-lg-12 col-md-12 col-xs-12">
       <h3 class="table-links"> All Traders </h3>
      
	<?php

   
//run query to select all records from product table
$query = "SELECT * FROM TRADER";

$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 


//Use a while loop to iterate through your $result array and display
//each field wrapped in appropriate HTML table tags.
echo "<table border =1><tr><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Address</th><th>Post Code</th><th>Email</th><th>Password</th><th>Trader Department</th><th>Amend</th><th>Delete</th></tr>";
	while ($row = mysqli_fetch_assoc($result)){
	               
						echo  "</td><td>" . $row["TRADER_FIRSTNAME"]. 
						       "</td><td>" . $row["TRADER_SURNAME"].
						       "</td><td>" . $row["PHONE_NUMBER"].
						       "</td><td>". $row["ADDRESS"].
						       "</td><td>" . $row["POSTCODE"].
						       "</td><td>" . $row["EMAIL"].
						       "</td><td>" . $row["PASSWORD"].
						       "</td><td>" . $row["TRADER_DEPARTMENT"].
						      "</td><td>" . '<a href="trader/amendaccount.php?id='. $row['TRADER_ID'].'">Amend</a>'.
						      "</td><td>" . '<a href="trader/delete.php?id='. $row['TRADER_ID'].'">Delete</a>'.
						      "</td></tr> " ;
						      
			}
			echo "</table> </br>";
			
			
?>
  
	

  </div>
  
  
 </div>
</div>


<div class="container">  
<h3 class="table-links"> Add A New trader </h3>
    <form name="form1" method="post" action="trader/inserttrader.php">
        <table border="0">
            <tr> 
                <td>First Name</td>
                <td><input type="text" name="fname"></td>
            </tr>
            <tr> 
                <td>Last Name</td>
                <td><input type="text" name="lname"></td>
            </tr>
            <tr> 
                <td>Phone Number</td>
                <td><input type="text" name="phonenum"></td>
            </tr>
            <tr> 
                <td>Address</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr> 
                <td>Post Code</td>
                <td><input type="text" name="postcode"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            
            <tr> 
                <td>Trader Department</td>
                <td><input type="text" name="department"></td>
            </tr>
           
            <tr>
              <td colspan="5"><input type="submit" class="buynow-button" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
    <hr class="line">
            <a href="../login/logout.php"><h2 class="tabs-title"> Logout </h2></a>
              <hr class="line">
</div>


