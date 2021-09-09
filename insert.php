<?php
	include "conn.php";

    $admvals="INSERT INTO admin_accounts VALUES ('admin01', 'adm01', 'Devage Sahan'),('admin02', 'adm02', 'Thiranjaya Devage')"; 
	$query1=mysqli_query($con,$admvals);
    if($query1){
        echo "<p>Successfully inserted Data to admin_accout table</p>";
    }
    else{
        echo "<p>Error inserting Data to admin_accout table".mysqli_error($con)."</p>";
    }

    $uservals="INSERT INTO user_accounts VALUES ('sahan', 'Sahan Thiranjaya', 'male', 'ddsthiranjaya@gmail.com', '(+94)768029867', 'userpwd'),('ashan', 'Ashan Jayasekara', 'male', 'ashan123@gmail.com', '(+94)123123123', 'userpwd'),('kamala', 'Kamala Jayathunga', 'female', 'kamala123@gmail.com', '(+94)77722332', 'userpwd')";

    $query2=mysqli_query($con,$uservals);
    if($query2){
        echo "<p>Successfully inserted Data to user_accout table</p>";
    }
    else{
        echo "<p>Error inserting Data to user_accout table".mysqli_error($con)."</p>";
    }

    $shedulevals="INSERT INTO available_flights VALUES (NULL, 'A2-03', 'Sri Lanka', '2018-10-15', '05:16:00', 'India', 60000, 95000),(NULL, 'A1-21', 'Sri Lanka', '2018-10-24', '05:16:00', 'USA', 120000, 175000),(NULL, 'C1-11', 'China', '2018-10-15', '05:16:00', 'Sri Lanka', 80000, 100000)";
    $query3=mysqli_query($con,$shedulevals);
    if($query3){
        echo "<p>Successfully inserted Data to available_flights table</p>";
    }
    else{
        echo "<p>Error inserting Data to available_flights".mysqli_error($con)."</p>";
    }

	mysqli_close($con);

?>