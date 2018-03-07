<?php 

include '../connection/init.php';


session_start();

$query = "SELECT * FROM PRODUCT WHERE PRODUCT_TYPE = 'Meat'";
if (isset($_POST['submit'])){
    $orderby = $_POST['orderby'];
    $category = $_POST['category'];
    $search = $_POST['search'];
    if($category!=='all'){
        $query=$query." AND PRODUCT_NAME = '$category'";
    }
    if($category!=='all'&&(!empty($search))){
        $query=$query." AND PRODUCT_DESCRIPTION LIKE'%$search%'";
    }
     if($category=='all'&&(!empty($search))){
        $query=$query." AND PRODUCT_DESCRIPTION LIKE'%$search%'";
    }
    if(!empty($orderby)){
        $query=$query." ORDER BY PRODUCT_NAME $orderby";
    }
 //echo $query;
 //exit;
    
$_SESSION['query']=$query;

header ("Location: ../mainPages/butchers.php");

    }


?>