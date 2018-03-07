<?php
session_start();
 if (!$_SESSION['authenticatedUser']) {
   
   header ("Location: ../mainPages/index.php");
 }

include '../connection/init.php';
include '../sections/head.php';
include '../sections/nav.php';
 
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
        $result = mysqli_query($connection, "UPDATE CUSTOMER SET CUSTOMER_FIRSTNAME='$name', CUSTOMER_SURNAME='$lastname', PHONE_NUMBER='$phonenumber' ,EMAIL='$email', ADDRESS='$address', POSTCODE='$postcode', PASSWORD='$password' WHERE EMAIL = '".$_SESSION['authenticatedUser']."'");
        
       echo '<h3 class="table-links"> Thank you for updating your information! <a href="useraccount.php">Go Back to your account </a></h3>';
    }
}
?>
<?php
 
$id = $_GET['CUSTOMER_ID']; 
//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM CUSTOMER WHERE EMAIL = '".$_SESSION['authenticatedUser']."'");
 
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
<h3 class="table-links"> Update Your Account </h3>
    <form name="form1" method="post" action="">
        <table border="0">
            <tr> 
                <td>First Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Last Name</td>
                <td><input type="text" name="lastname" value="<?php echo $lastname;?>"></td>
            </tr>
            <tr> 
                <td>Phone Number</td>
                <td><input type="text" name="phonenumber" value="<?php echo $phonenumber;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $address;?>"></td>
            </tr>
            <tr> 
                <td>Post Code</td>
                <td><input type="text" name="postcode" value="<?php echo $postcode;?>"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $password;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['CUSTOMER_ID'];?>></td>
                <td><input type="submit" class="buynow-button" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <a href="deleteaccount.php"><h3 class="table-links"> Delete Account  </h3></a>
</div>


<?php

include '../sections/bottom-section.php';

?>