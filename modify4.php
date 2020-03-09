<!DOCTYPE html>
<!--Author:
	Date:
	File:	  modify4.php 
	Purpose:  This program lists the first and last names and hourly wage of all sales employees.
		  Modify this so that it multiplies each sales person's hourly wage by 1.05 and then displays the result in a paragraph as follows:
		  "XXX YYY's hourly wage would become $Z.ZZ."
		  where XXX is the employee's first name, YYY is the employee's last name, and $Z.ZZ is the new wage amount.
	Hint: 	  You just need to add the calculation and modify the print statement. You do not have to update the hourly wage in the personnel table.
-->
<html>
<head>
	<title>Modify 4</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>
<body>
	<h1>Modify 4 </h1>
<?php

$server = "localhost";
$user = "wbip";
$pw = "wbip123";
$db = "test";

$connect=mysqli_connect($server, $user, $pw, $db);

if( !$connect)
{
	die("ERROR: Cannot connect to database $db on server $server
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}
else
{
	$userQuery = "SELECT firstName, lastName, hourlyWage FROM personnel WHERE jobTitle='sales' ";
	$result = mysqli_query($connect, $userQuery);

	if (!$result)
	{
		die("Could not successfully run query ($userQuery) from $db: " . mysqli_error($connect) );
	}

	if (mysqli_num_rows($result) == 0)
	{
		print("No records found with query $userQuery");
	}
	else
	{
		 print("<h1>Proposed 5% Wage Increases for Sales Staff</h1>");
		 while ($row = mysqli_fetch_assoc($result))
		{
			print (	"<p>".$row['firstName']." ".$row['lastName']."'s hourly wage is $".
			number_format($row['hourlyWage'], 2)."</p>");
		}

	}
     mysqli_close($connect);   // close the connection
}
?>
</body>
</html>