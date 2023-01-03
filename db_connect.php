<?php
Class dbObj{
	/* Database connection start */
	var $dbhost = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "store_management";
	var $con;
	function getConnstring() {
		$conn = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->con = $conn;
		}
		return $this->con;
	}
}

// $sname = "localhost";

// $unmae = "root";

// $password = "";

// $db_name = "store_management";

// $conn = mysqli_connect($sname, $unmae, $password, $db_name);

// if (!$conn) {

//     echo "Connection failed!";
?>

