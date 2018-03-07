<?php
include '../connection/init.php';
if(isset($_POST['WriteReviewSubmit'])){
	

	//gather data from form
	$productName=$_POST['productName'];
	$rating=$_POST['rating'];
	$recommend=$_POST['Recommend'];
	$review=$_POST['ReviewTextarea'];
	$opinion=$_POST['Opinion'];
	$photo=$_POST['fileToUpload'];
	$Username=$_POST['Username'];
	$Yes='0';
	$No='0';
	if (!empty($_POST['rating']) && !empty($_POST['Recommend']) && !empty($_POST['ReviewTextarea'])){
		//prepare query
	$query= "INSERT INTO rating
	(productName,date,rating,recommend,review,opinion,photo,username,Yes,No)
	VALUES
	('$productName', NOW(), '$rating', '$recommend' , '$review', '$opinion' , '$photo', '$Username' ,'$Yes' ,'$No')";
	
	//run query to INSERT new record
	mysqli_query($connection,$query);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION['errorcheck']='* can not be empty';
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	}
	?>	