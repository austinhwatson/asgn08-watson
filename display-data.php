<?php
include_once("private/db-connect-info.php");
    
//connect to the database
$connect = mysqli_connect($server, $user, $pw, $db, $port );

if(!$connect) {
    die("Error: cannot connect to the database $db on server $server using user name $user
    (".mysqli_connect_errno() . "," . mysqli_connect_errno().")");
    
}

//write a query
$userQuery = "SELECT firstName, lastName FROM personnel";
//store the result
$result = mysqli_query($connect, $userQuery);

if (!$result)
{
    die("Could not run query ($userQuery) from $db: ". mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0)
{
    print("No record found with query $userQuery");
}
else
{
    print("<h1 LIST OF EMPLOYEES</h1>");
    print("<table border = \"1\">");
    print("<tr><th>First Name</th><th>Last Name</th></tr>");
    while ($row = mysqli_fetch_assoc($result))
    {
        print ("<tr><td>".$row['firstName']."</td><td>".$row['lastName']."</td></tr>");
    }
    print("</table");
}

//close the connection
mysqli_close($connect);

?>
