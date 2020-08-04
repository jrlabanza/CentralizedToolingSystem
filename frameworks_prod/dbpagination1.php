<?php
session_start();
if(!isset($_SESSION['line'])){
	$_SESSION['line']='';
}
class DBController {
	// private $host = "phsm01ws012";
	// private $user = "cents";
	// private $password = "cents_user01";
	private $host = "localhost";
	private $user = "root";
	private $password = "root_admin01";
	private $database = "cents";
	private $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
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
