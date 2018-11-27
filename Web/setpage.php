<?php
	$servername = "sql7.freesqldatabase.com";
	$username = "sql7267198";
	$password = "zzN1qyBNmf";
	$dbname = "sql7267198";
	/*
	$servername = "db4free.net";
	$username = "progmaxi";
	$password = "db4free3971";
	$dbname = "progmaxi";
	*/
	/*
	$servername = "c102um.forpsi.com";
	$username = "f74453";
	$password = "sql39711793";
	$dbname = "f74453";
	*/
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
		die("Sory, neco se deje s databazi, viz zde: " . $conn->connect_error);
	} 

	if ( isset($_POST['PC11']) )
	{
		$conn->query("UPDATE `table` SET `value`=1 WHERE `id`='PC11'");
	}
	else if ( isset($_POST['PC12']) )
	{
		$conn->query("UPDATE `table` SET `value`=1 WHERE `id`='PC12'");
	}
	else if ( isset($_POST['PC13']) )
	{
		$conn->query("UPDATE `table` SET `value`=1 WHERE `id`='PC13'");
	}
	else if ( isset($_POST['PC21']) )
	{
		$conn->query("UPDATE `table` SET `value`=1 WHERE `id`='PC21'");
	}
	else if ( isset($_POST['PC22']) )
	{
		$conn->query("UPDATE `table` SET `value`=1 WHERE `id`='PC22'");
	}
	else if ( isset($_POST['PC23']) )
	{
		$conn->query("UPDATE `table` SET `value`=1 WHERE `id`='PC23'");
	}
	else if ( isset($_POST['PC31']) )
	{
		$conn->query("UPDATE `table` SET `value`=1 WHERE `id`='PC31'");
	}
	else if ( isset($_POST['PC32']) )
	{
		$conn->query("UPDATE `table` SET `value`=1 WHERE `id`='PC32'");
	}
	else if ( isset($_POST['PC33']) )
	{
		$conn->query("UPDATE `table` SET `value`=1 WHERE `id`='PC33'");
	}
	else if ( isset($_POST['RESET']) )
	{
		$conn->query("UPDATE `table` SET `value`=0 WHERE `id`='PC11'");
		$conn->query("UPDATE `table` SET `value`=0 WHERE `id`='PC12'");
		$conn->query("UPDATE `table` SET `value`=0 WHERE `id`='PC13'");
		$conn->query("UPDATE `table` SET `value`=0 WHERE `id`='PC21'");
		$conn->query("UPDATE `table` SET `value`=0 WHERE `id`='PC22'");
		$conn->query("UPDATE `table` SET `value`=0 WHERE `id`='PC23'");
		$conn->query("UPDATE `table` SET `value`=0 WHERE `id`='PC31'");
		$conn->query("UPDATE `table` SET `value`=0 WHERE `id`='PC32'");
		$conn->query("UPDATE `table` SET `value`=0 WHERE `id`='PC33'");
	}
	else
	{
		echo "ALE ALE...nejaky errurek se vyskytl !!!";
		echo "<BR>";
		echo "<BR>";
	}
	$conn->close();
	header("location: index.php");
?>