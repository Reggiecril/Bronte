<?php 

include '../connection/init.php';

if (isset($_POST['submit'])) {
    
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    
    if (empty($Email) || empty($Password)) {
        
        echo "Please Complete All Feilds";
        
    } else {
        
        
        
        
        $Email = stripcslashes($Email);
        $Password = stripcslashes($Password);
        
        $sql = "SELECT * FROM TRADER WHERE EMAIL='$Email' and PASSWORD='$Password'";
        
        $result = mysqli_query($connection,$sql); 
        
        $count = mysqli_num_rows($result);
        
        if($count ==1) {
            
            $row = mysqli_fetch_assoc($result); 
            
            if ($row['TRADER_ID'] == 2001) {
                
                $_SESSION['butcherAuthorised'] = $row['TRADER_ID'];
                
                header('location: butcherhome.php');
            } 
            if ($row['TRADER_ID'] == 2002) {
                
                
            
                $_SESSION['greenAuthorised'] = $row['TRADER_ID'];
                
                header('location: greengrocerhome.php');
            } 
            if ($row['TRADER_ID'] == 2003) {
                
                
            
                $_SESSION['fishAuthorised'] = $row['TRADER_ID'];
                
                header('location: fishmongerhome.php');
            } 
            if ($row['TRADER_ID'] == 2004) {
                
                
            
                $_SESSION['bakeryAuthorised'] = $row['TRADER_ID'];
                
                header('location: bakeryhome.php');
            } 
            if ($row['TRADER_ID'] == 2005) {
                
                
            
                $_SESSION['deliAuthorised'] = $row['TRADER_ID'];
                
                header('location: delicatessenhome.php');
            } 
            
           
            
        } else {
            echo "Wrong Email or Password, Please Try Again!";
        }
        
    }
}


?> 