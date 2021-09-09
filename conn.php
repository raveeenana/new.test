<?php
	$con=mysqli_connect("localhost","root","");
	if(!$con){
		die("Could not connect:".mysqli_error($con));
	}
	mysqli_select_db($con,"plane_reservation_db");
?>