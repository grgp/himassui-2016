<?php
function connectDB(){
	$servername = "localhost";
	$username = "himassui_akbar";
	$password = "asepwhite";
	$dbname = "himassui_test";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	return $conn;
}
?>