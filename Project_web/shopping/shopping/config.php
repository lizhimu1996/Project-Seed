<?php
	$conn = new mysqli("localhost","root","","ense374");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>