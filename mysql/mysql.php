<?php

$DB_NAME = "user_info";
$DB_HOST = "localhost";
$DB_PASSWORD = "";
$DB_USER = "root";


$connection = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD) or die(mysql_error());


mysql_close($connection);

$result = mysql_query("SELECT * FROM example") or die(mysql_error());


echo "<table border='1'>";
echo "<tr> <th>Name</th> <th>Age</th> </tr>";
while($row = mysql_fetch_array( $result )) {
    echo "<tr><td>";
    echo $row['name'];
    echo "</td><td>";
    echo $row['age'];
    echo "</td></tr>";
}

echo "</table>";