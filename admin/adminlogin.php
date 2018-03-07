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
        
        $sql = "SELECT * FROM Admin WHERE EMAIL='$Email' and PASSWORD='$Password'";
        
        $result = mysqli_query($connection,$sql); 
        
        $count = mysqli_num_rows($result);
        
        if($count ==1) {
            $row = mysqli_fetch_assoc($result); 
            
            $_SESSION['adminAuthorised'] = $row['EMAIL'];
            
            header('location: adminhome.php');
            
        } else {
            echo "Wrong Email or Password, Please Try Again!";
        }
        
    }
}


?> 