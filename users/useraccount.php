<?php 
session_start();
 if (!$_SESSION['authenticatedUser']) {
   
   header ("Location: ../mainPages/index.php");
 }

include '../sections/nav.php';

$query = "SELECT * FROM CUSTOMER WHERE EMAIL = '".$_SESSION['authenticatedUser']."'";
$result = mysqli_query($connection,$query); 
if($result = $connection->query($query))
{
    while($row = $result->fetch_assoc())
    {
       
        
        echo'<div class="container">
        <h3 class="table-links"> Your Account </h3>
			<table align="center" cellpadding="10" cellspacing="1" class="table">
<tbody>

<tr>
<th style="text-align: center;"><strong>First Name</strong></th>
<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">'.$row['CUSTOMER_FIRSTNAME'].'</td>
</tr>

<tr>
<th style="text-align: center;"><strong>Last Name</strong></th>
<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">'.$row['CUSTOMER_SURNAME'].'</td>
</tr>

<tr>
<th style="text-align: center;"><strong>Phone Number</strong></th>
<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">'.$row['PHONE_NUMBER'].'</td>
</tr>

<tr>
<th style="text-align: center;"><strong>Email Address</strong></th>
<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">'.$row['EMAIL'].'</td>
</tr>

<tr>
<th style="text-align: center;"><strong>Password</strong></th>
<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">'.$row['PASSWORD'].'</td>
</tr>

<tr>
<th style="text-align: center;"><strong>Address</strong></th>
<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">'.$row['ADDRESS'].'</td>
</tr>

<tr>
<th style="text-align: center;"><strong>Post Code</strong></th>
<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">'.$row['POSTCODE'].'</td>
</tr>

</tbody>
</table>
</div>';
    }
    $result->free();
}
else
{
    echo "No results found";
}
?>
<div class="container">
  <a href="amendaccount.php"><h3 class="table-links"> Update Details  </h3></a>
<a href="deleteaccount.php"><h3 class="table-links"> Delete Account  </h3></a>  
    
</div>


<?php 

include '../sections/bottom-section.php';

?>