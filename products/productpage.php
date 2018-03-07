<div class="productpage-content">
<?php 
session_start();

include '../sections/nav.php';
require_once '../sections/escapeOutput.php';
$NAME=$_GET['PRODUCT_NAME'];

$query = "SELECT * FROM PRODUCT WHERE PRODUCT_NAME= '$NAME'";
$result = mysqli_query($connection,$query); 
if($result = $connection->query($query))
{
    while($row = $result->fetch_assoc())
    {
       include '../products/productform.php';
    }
    $result->free();
}
else
{
    echo "No results found";
}
?>







<?php 
    include '../sections/bottom-section.php';
    
?>