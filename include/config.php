<?php
	//error_reporting(0);
	$hostname = "localhost"; 
	$username = "root"; 
	$password = "";

	$databaseName = "jobnest";

	$errorMessage = "Error Connecting database name ". $databaseName;
	$dbconnection = mysqli_connect($hostname,$username,$password,$databaseName);

	if (mysqli_connect_errno()) {
	echo("Failed to connect to my sql :------".mysqli_connect_errno());
	}
	if (!$dbconnection)
	{
			// error_log("Error Connecting server or database".$dbconnection.mysqli_error($dbconnection));
			echo("\r\n"."Couldn't Connected To Server or database : - ".$databaseName.mysqli_error($dbconnection));
	}
	try{
		$hostname = "localhost";
		$username = "root";
		$password = "";

		$databaseName = "jobnest";

		$errorMessage = "Error Connecting database name ". $databaseName;
		$databaseType = 'mysql:host='.$hostname.';dbname='.$databaseName;
		$pdoDbConnect = new PDO($databaseType,$username,$password);
		$pdoDbConnect -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$pdoDbConnect -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		$pdoDbConnect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}
	catch(PDOException $e){
		echo 'Error: '. $e->getMessage();
	}
?>
