<!DOCTYPE html>
<!--Author:
	Date:
	File:	  fixit3.php
	Purpose:  What's wrong here? This code should list the complete names and hourly pay of
			  all employees with the last name of Smith or Jones. The code executes but only
			  displays the results for employees named Smith.
	Hint: 	  The problem is with the syntax of the SELECT statement
-->
<html>
<head>
	<title>Fixit 3</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>
<body>
	<h1>Fixit 3 </h1>
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
	$userQuery = "SELECT firstName, lastName, hourlyWage FROM personnel WHERE lastName='Smith' OR lastName='Jones'";
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