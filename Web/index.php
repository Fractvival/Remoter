<div style="width:500px; margin:auto;">
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
$sql = "SELECT `id`,`value` FROM `table` WHERE 1";
$result = $conn->query($sql);
?>
<BR>
<HR>
<CENTER><H2><B>PC REMOTER</B></H2></CENTER>
<HR>
<BR>
<CENTER>
<form action="/setpage.php" method="POST">
<?php
if ($result->num_rows == 9 ) 
{
	echo "<B><CODE>OVLADANI 1:</CODE></B><BR>";
	$PC11 = mysqli_query($conn,"SELECT `value` FROM `table` WHERE `id`='PC11'");
	$PC11 = mysqli_fetch_array($PC11);
	if ($PC11[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC11' SIZE=120 VALUE='ZAPNOUT'>&nbsp; &nbsp;";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC11' SIZE=120 VALUE='ZAPNOUT' DISABLED>&nbsp; &nbsp;";
	}
	$PC12 = mysqli_query($conn,"SELECT `value` FROM `table` WHERE `id`='PC12'");
	$PC12 = mysqli_fetch_array($PC12);
	if ($PC12[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC12' SIZE=120 VALUE='VYPNOUT'>&nbsp; &nbsp;";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC12' SIZE=120 VALUE='VYPNOUT' DISABLED>&nbsp; &nbsp;";
	}
	$PC13 = mysqli_query($conn,"SELECT `value` FROM `table` WHERE `id`='PC13'");
	$PC13 = mysqli_fetch_array($PC13);
	if ($PC13[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC13' SIZE=120 VALUE='RESTART'>";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC13' SIZE=120 VALUE='RESTART' DISABLED>";
	}
	echo "<BR>";
	echo "<BR>";
	echo "<B><CODE>OVLADANI 2:</CODE></B><BR>";
	$PC21 = mysqli_query($conn,"SELECT `value` FROM `table` WHERE `id`='PC21'");
	$PC21 = mysqli_fetch_array($PC21);
	if ($PC21[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC21' SIZE=120 VALUE='ZAPNOUT'>&nbsp; &nbsp;";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC21' SIZE=120 VALUE='ZAPNOUT' DISABLED>&nbsp; &nbsp;";
	}
	$PC22 = mysqli_query($conn,"SELECT `value` FROM `table` WHERE `id`='PC22'");
	$PC22 = mysqli_fetch_array($PC22);
	if ($PC22[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC22' SIZE=120 VALUE='VYPNOUT'>&nbsp; &nbsp;";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC22' SIZE=120 VALUE='VYPNOUT' DISABLED>&nbsp; &nbsp;";
	}
	$PC23 = mysqli_query($conn,"SELECT `value` FROM `table` WHERE `id`='PC23'");
	$PC23 = mysqli_fetch_array($PC23);
	if ($PC23[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC23' SIZE=120 VALUE='RESTART'>";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC23' SIZE=120 VALUE='RESTART' DISABLED>";
	}
	echo "<BR>";
	echo "<BR>";
	echo "<B><CODE>OVLADANI 3:</CODE></B><BR>";
	$PC31 = mysqli_query($conn,"SELECT `value` FROM `table` WHERE `id`='PC31'");
	$PC31 = mysqli_fetch_array($PC31);
	if ($PC31[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC31' SIZE=120 VALUE='ZAPNOUT'>&nbsp; &nbsp;";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC31' SIZE=120 VALUE='ZAPNOUT' DISABLED>&nbsp; &nbsp;";
	}
	$PC32 = mysqli_query($conn,"SELECT `value` FROM `table` WHERE `id`='PC32'");
	$PC32 = mysqli_fetch_array($PC32);
	if ($PC32[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC32' SIZE=120 VALUE='VYPNOUT'>&nbsp; &nbsp;";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC32' SIZE=120 VALUE='VYPNOUT' DISABLED>&nbsp; &nbsp;";
	}
	$PC33 = mysqli_query($conn,"SELECT `value` FROM `table` WHERE `id`='PC33'");
	$PC33 = mysqli_fetch_array($PC33);
	if ($PC33[0] == 0)
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC33' SIZE=120 VALUE='RESTART'>";
	}
	else
	{
		echo "<INPUT TYPE='SUBMIT' NAME='PC33' SIZE=120 VALUE='RESTART' DISABLED>";
	}
	echo "<BR>";
	echo "<BR>";
	echo "<BR>";
	echo "<INPUT TYPE='SUBMIT' NAME='RESET' SIZE=120 VALUE='OBNOVIT STAVY'>";
	echo "<BR>";
	echo "<BR>";
	echo "<HR>";
}
else
{
	echo "<BR>";
	echo "<BR>";
	echo "<HR>";
	echo "<B>PC REMOTER</B>";
	echo "<BR>";
	echo "<BR>";
	echo "<BR>";
	echo "<B><CODE>HODNOTY V DATABAZI NESOUHLASI !</CODE></B><BR>";
	echo "<BR>";
	echo "<BR>";
	echo "<HR>";
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