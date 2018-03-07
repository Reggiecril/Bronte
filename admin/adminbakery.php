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
  
 
  <div class="col-lg-12 col-md-12 col-sm-12">
   <div class="row">
       <h3 class="table-links"> All Products </h3>
      
	<?php

   
//run query to select all records from product table
$query = "SELECT * FROM PRODUCT WHERE PRODUCT_TYPE='Savoury'";

$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 


//Use a while loop to iterate through your $result array and display
//each field wrapped in appropriate HTML table tags.
echo "<table border =1><tr><th>Name</th><th>Description</th><th>Price</th><th>Available Stock</th><th>Image</th><th>Amend</th><th>Delete</th></tr>";
	while ($row = mysqli_fetch_assoc($result)){
	               
						echo "<tr><td>" . $row["PRODUCT_NAME"]. 
						      "</td><td>" . $row["PRODUCT_DESCRIPTION"]. 
						       "</td><td>" . $row["PRODUCT_PRICE"].
						       "</td><td>". $row["AVAILABLE_STOCK"].
						      "</td><td>" . '<img src="../assets/img/' . $row['IMAGE_FILENAME'] .'"  />'.
						      "</td><td>" . '<a href="amendproduct.php?id='. $row['PRODUCT_ID'].'">Amend</a>'.
						      "</td><td>" . '<a href="delete.php?id='. $row['PRODUCT_ID'].'">Delete</a>'.
						      "</td></tr> " ;
						      
			}
			echo "</table> </br>";
			
			
?>
  
	
    </div>
  </div>
  
 </div>
</div>
<?php 
if(isset($_POST['update']))
{    
   
    $id = $_POST['id'];
    $name= $_POST['name'];
    $lastname= $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $email= $_POST['email'];
    $address= $_POST['address'];
    $postcode = $_POST['postcode'];
    $password = $_POST['password'];
    
    // checking empty fields
    if(empty($name) || empty($lastname) || empty($phonenumber) || empty($email) || empty($address) || empty($postcode)|| empty($password)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($lastname)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }
        
        if(empty($phonenumber)) {
            
            echo "<font color='red'>Phone Number field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($address)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($postcode)) {
            
            echo "<font color='red'> Post code field is empty.</font><br/>";
        }
        if(empty($password)) {
            
            echo "<font color='red'> Password field is empty.</font><br/>";
        }
    } else {    
        //updating the table
        $result = mysqli_query($connection, "SELECT * FROM PRODUCT WHERE PRODUCT_TYPE = 'Savoury'");
        
       
    }
}
?>
<?php
 
$id = $_GET['CUSTOMER_ID']; 
//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM PRODUCT WHERE PRODUCT_TYPE = 'Savoury'");
 
while($res = mysqli_fetch_array($result))
{
    $name=$res['CUSTOMER_FIRSTNAME'];
    $lastname= $res['CUSTOMER_SURNAME'];
    $phonenumber = $res['PHONE_NUMBER'];
    $email=$res['EMAIL'];
    $address=$res['ADDRESS']; 
    $postcode = $res['POSTCODE'];
    $password = $res['PASSWORD'];
    
}
?>

<div class="container">  
<h3 class="table-links"> Add A New Product </h3>
    <form name="form1" method="post" action="insertproduct.php">
        <table border="0">
            <tr> 
                <td>Product Name</td>
                <td><input type="text" name="productname"></td>
            </tr>
            <tr> 
                <td>Product Type</td>
                <td><input type="text" name="producttype" placeholder="Savoury"></td>
            </tr>
            <tr> 
                <td>Product Description</td>
                <td><input type="text" name="productdescription"></td>
            </tr>
            <tr> 
                <td>Product Price</td>
                <td><input type="text" name="productprice"></td>
            </tr>
            <tr> 
                <td>Image Name</td>
                <td><input type="text" name="imagefilename" placeholder="imagename.jpg"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="text" name="productquantity"></td>
            </tr>
            <tr> 
                <td>Stock</td>
                <td><input type="text" name="productstock"></td>
            </tr>
            
            <tr> 
                <td>Minumum Order</td>
                <td><input type="text" name="minorder"></td>
            </tr>
            <tr> 
                <td>Maximum Order</td>
                <td><input type="text" name="maxorder"></td>
            </tr>
            <tr> 
                <td>Alergy Information</td>
                <td><input type="text" name="alergy"></td>
            </tr>
            <tr> 
                <td>Trader ID</td>
                <td><input type="text" name="traderid" placeholder="2004"></td>
            </tr>
            <tr> 
                <td>Shared</td>
                <td><input type="text" name="shared" placeholder="0"></td>
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