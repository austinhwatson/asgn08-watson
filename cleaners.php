<!DOCTYPE html>
<!--	Author: 
		Date:	
		File:	cleaners.php
		Purpose:MySQL Exercise
-->

<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>
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

$userQuery = "";  // QUERY NEEDED

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0) 
{
	print("No records found with query $userQuery");
}
else 
{ 
	print("<h1>CLEANING STAFF</h1>");

	// CODE HERE..
	
	print ("<p>The lowest hourly wage of cleaning staff is $".
				number_format($lowestWage, 2)."</p>");
}

mysqli_close($connect);   // close the connection
 
?>

</body>
</html>
