<?php
class DBController {

	
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect('localhost','root','','bronte');
		return $conn;
	}
	
	function runQuery($query) {
		
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {

			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>