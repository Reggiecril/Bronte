<?php 

include '../connection/init.php';
session_start();

if (isset($_POST['submit'])) {
    
    $Email = $_POST['email'];
    $Password = md5($_POST['password']);
    
    
    $error_check = array();
    
    if (!empty($Email)) {
        
        $Email = stripslashes($Email);
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            
            $error_check['email'] = "Please Enter A Valid Email Address";
        }
    } else {
        
         $error_check['email'] = "Please Enter Your Email Address";
    }
    
    if (!empty($Password)) {
        
        $Password = stripslashes($Password);
        
    } else {
        
         $error_check['password'] = "Please Enter Your Password";
    }
    
    
    if (empty($error_check)){
        
        $_SESSION['email'] = $Email;
        $_SESSION['password'] = $Password;
        $_SESSION['message'] = "Thank You For Logging In";
    
        $sql = "SELECT * FROM user WHERE email='$Email' and password='$Password'";
        
        $result = mysqli_query($connection,$sql); 
        
        $count = mysqli_num_rows($result);
        
        if($count ==1) {
                
         $row = mysqli_fetch_assoc($result); 
         $_SESSION['personalID'] = $row['CUSTOMER_ID'];
         $_SESSION['authenticatedUser'] = $row['EMAIL'];
         $_SESSION['personalUser'] = $row['CUSTOMER_FIRSTNAME'];
                
                header('location: ../mainPages/index.php');
    } else {
        
        $_SESSION['email'] = $Email;
        $_SESSION['password'] = $Password;
        $_SESSION['errors'] = $error_check;
        $_SESSION['message'] = "There were errors either with the email or password! Please try again! ";
        
        header('location: ../mainPages/index.php');
    }        
       
    }
}


?> 