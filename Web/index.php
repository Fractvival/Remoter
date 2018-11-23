<div style="width:300px; margin:auto;">
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
$sql = "SELECT id, value FROM state";
$result = $conn->query($sql);
?>
<BR>
<CENTER><H2><B>REMOTER</B></H2></CENTER>
<BR>
<CENTER>
<form action="/setpage.php" method="POST">
<?php
if ($result->num_rows == 3 ) 
{
	echo "<B><CODE>OVLADANI 1:</CODE></B><BR>";
	$OK1 = mysqli_query($conn,"SELECT value FROM state WHERE id ='OK1'");
	$DATA1 = mysqli_fetch_array($OK1);
	if ($DATA1[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='OK1' SIZE=120 VALUE='POSLAT SIGNAL'>";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='OK1' SIZE=120 VALUE='KVITOVANI' DISABLED>";
	}
	echo "<BR>";
	echo "<BR>";
	echo "<B><CODE>OVLADANI 2:</CODE></B><BR>";
	$OK2 = mysqli_query($conn,"SELECT value FROM state WHERE id ='OK2'");
	$DATA2 = mysqli_fetch_array($OK2);
	if ($DATA2[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='OK2' SIZE=120 VALUE='POSLAT SIGNAL'>";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='OK2' SIZE=120 VALUE='KVITOVANI' DISABLED>";
	}
	echo "<BR>";
	echo "<BR>";
	echo "<B><CODE>OVLADANI 3:</CODE></B><BR>";
	$OK3 = mysqli_query($conn,"SELECT value FROM state WHERE id ='OK3'");
	$DATA3 = mysqli_fetch_array($OK3);
	if ($DATA3[0] == 0)
	{
		echo "<INPUT TYPE='submit' NAME='OK3' SIZE=120 VALUE='POSLAT SIGNAL'>";
	}
	else
	{
		echo "<INPUT TYPE='submit' NAME='OK3' SIZE=120 VALUE='KVITOVANI' DISABLED>";
	}
	echo "<BR>";
	echo "<BR>";
	echo "<BR>";
	echo "<INPUT TYPE='SUBMIT' NAME='RESET' SIZE=120 VALUE='RESETOVAT'>";
	echo "<BR>";
	echo "<BR>";
}
else
{
	echo "<BR>";
	echo "<BR>";
	echo "<B>REMOTER</B>";
	echo "<BR>";
	echo "<CODE>PROGMaxi software 2018</CODE>";
	echo "<BR>";
	echo "<BR>";
	echo "<B><CODE>HODNOTY V DATABAZI NESOUHLASI !</CODE></B><BR>";
	echo "<BR>";
	echo "<BR>";
}
$conn->close();
?>
</form> 
<BR>
<BR>
<CODE><B>by Pieck4444 2018</B></CODE><BR>
<H2>&#9786;</H2>
</CENTER>
</div>