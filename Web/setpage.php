<?php

	$servername = "localhost";
	$username = "remoterwzcz4137";
	$password = "T4UMJcX";
	$dbname = "remoterwzcz4137";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
		die("Sory, neco se deje s databazi, viz zde: " . $conn->connect_error);
	} 

	if ( isset($_POST['OK1']) )
	{
		$conn->query("UPDATE state SET value=1 WHERE id='OK1'");
		echo "BUTTON 1";
		echo "<BR>";
		echo "<BR>";
	}
	else if ( isset($_POST['OK2']) )
	{
		$conn->query("UPDATE state SET value=1 WHERE id='OK2'");
		echo "BUTTON 2";
		echo "<BR>";
		echo "<BR>";
	}
	else if ( isset($_POST['OK3']) )
	{
		$conn->query("UPDATE state SET value=1 WHERE id='OK3'");
		echo "BUTTON 3";
		echo "<BR>";
		echo "<BR>";
	}
	else if ( isset($_POST['RESET']) )
	{
		echo "RESET";
		echo "<BR>";
		echo "<BR>";
		$conn->query("UPDATE state SET value=0 WHERE id='OK1'");
		$conn->query("UPDATE state SET value=0 WHERE id='OK2'");
		$conn->query("UPDATE state SET value=0 WHERE id='OK3'");
	}
	else
	{
		echo "ALE ALE...nejaky errurek se vyskytl !!!";
		echo "<BR>";
		echo "<BR>";
	}
	header("location: index.php");
?>