<?php

	$name=$row["PRODUCT_NAME"];

$query2="SELECT count(id) AS total FROM rating WHERE productName='$name'";
$results=mysqli_query($connection,$query2)  or exit ("Error in query: $query2. ".mysqli_query($connection,$query2));
$resu=mysqli_fetch_array($results);
$value=$resu['total'];

if ($value==0){
	 $rating='<img src="../assets/img/0.PNG" width = "170px" height = "30px"/>';
}else{
$query3="SELECT sum(rating) FROM rating  WHERE productName='$name'";
$results1=mysqli_query($connection,$query3)  or exit ("Error in query: $query3. ".mysqli_query($connection,$query3));
$resu=mysqli_fetch_array($results1);
$sum=$resu['sum(rating)'];
$average=$sum/$value;


if ($average<0.75 and $average>0){
	$rating='<img src="../assets/img/0.5.PNG" width = "170px" height = "30px"/>';
}
if ($average>=0.75 and $average<1.25){
	 $rating='<img src="../assets/img/1.PNG" width = "170px" height = "30px"/>';
}
if ($average>=1.25 and $average<1.75){
	 $rating='<img src="../assets/img/1.5.PNG" width = "170px" height = "30px"/>';
}
if ($average>=1.75 and $average<2.25){
	$rating='<img src="../assets/img/2.PNG" width = "170px" height = "30px"/>';
}
if ($average>=2.25 and $average<2.75){
	$rating= '<img src="../assets/img/2.5.PNG" width = "170px" height = "30px"/>';
}
if ($average>=2.75 and $average<3.25){
	$rating= '<img src="../assets/img/3.PNG" width = "170px" height = "30px"/>';
}
if ($average>=3.25 and $average<3.75){
	$rating='<img src="../assets/img/3.5.PNG" width = "170px" height = "30px"/>';
}
if ($average>=3.75 and $average<4.25){
	 $rating='<img src="../assets/img/4.PNG" width = "170px" height = "30px"/>';
}
if ($average>=4.25 and $average<4.75){
	 $rating='<img src="../assets/img/4.5.PNG" width = "170px" height = "30px"/>';
	
}
if ($average>=4.75){
	 $rating='<img src="../assets/img/5.PNG" width = "170px" height = "30px"/>';
}
}
?>