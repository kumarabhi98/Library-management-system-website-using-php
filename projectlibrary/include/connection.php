<?php

	$servername = "localhost:3306";
	$dbname = "library";
	$username = "root";
	$password = "";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";


?>

