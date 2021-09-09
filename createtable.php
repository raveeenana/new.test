<?php
	$con=mysqli_connect("localhost","root","");
	if(!$con){
		die("Could not connect:".mysqli_error($con));
	}
	
	$create_db=mysqli_query($con,"CREATE DATABASE plane_reservation_db");

	if($create_db){
		echo "Database created<br>";
	}
	else{
		die( "error creating db: ".mysqli_error($con));

	}

    mysqli_select_db($con,"plane_reservation_db");

	$sql1="
CREATE TABLE form_submissions(
	inquery_id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR (60), 
	email VARCHAR(70),
	date_submited DATE, 
	question TEXT,
	status ENUM('pending','replied') DEFAULT 'pending',
	admin_reply TEXT,
	PRIMARY KEY (inquery_id))";

    $sql2="CREATE TABLE available_flights(
	trip_id INT NOT NULL AUTO_INCREMENT,
	flight_no CHAR(5),
	startfrom VARCHAR(30), 
	departure DATE,
	departure_time TIME,
	destination VARCHAR(30),
	e_class_price DOUBLE(8,2),
	b_class_price DOUBLE(8,2),
	PRIMARY KEY (trip_id)
)";

    $sql3="CREATE TABLE reservations(
	reservation_id INT NOT NULL AUTO_INCREMENT,
	user_id CHAR(20),
	ticket_date DATE,
	ticket_time TIME,
	flight_no CHAR(5),
	startfrom VARCHAR(30),
	destination VARCHAR(30),
	fclass ENUM('business','economy'),
	price DOUBLE(8,2),
	seat_row INT,
	seat_l CHAR(1),
	status ENUM('Pending','Paid','Canceled'),
	PRIMARY KEY (ticket_date,flight_no,seat_row,seat_l),
	UNIQUE (reservation_id)
)";

    $sql4="
CREATE TABLE user_accounts(
	user_name CHAR(20) PRIMARY KEY, 
	name VARCHAR(150),
	gender ENUM('male','female'),
	email VARCHAR(50),
	tel_no CHAR(14),
	password VARCHAR(30)
)";

    $sql5="CREATE TABLE admin_accounts(
	user_name CHAR(20) PRIMARY KEY, 
	password VARCHAR(30),
	name VARCHAR (50)
)";
	$result1=mysqli_query($con,$sql1);
	$result2=mysqli_query($con,$sql2);
	$result3=mysqli_query($con,$sql3);
	$result4=mysqli_query($con,$sql4);
	$result5=mysqli_query($con,$sql5);
	if(!$result1 || !$result2 || !$result3 || !$result4 || !$result5){
		echo "Cannot create Table. Error occurs : ".mysqli_error($con);
	}
    else{
        echo "Tables created successfully";
    }
	mysqli_close($con);
?>
