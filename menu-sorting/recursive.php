<?php
/**
 * Created by PhpStorm.
 * User: hmtmcse
 * Date: 9/3/16
 * Time: 7:32 PM
 */

$servername = "localhost";
$username = "mis";
$password = "mis";
$dbname = "menu";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, parent_id as parentId  FROM items";
$result = mysqli_query($conn, $sql);
$results = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row..

    while($row = mysqli_fetch_assoc($result)) {

        $results[] = $row;
    }
} else {
    echo "0 results";
}
mysqli_close($conn);


$tree = null;
foreach($results as $result)
{
    $thisref = &$refs->{$result['id']};
    foreach($result as $k => $v)
    {
        $thisref->{$k} = $v;
    }
    if ($result['parentId'] == 0) {
        $tree->{$result['id']} = &$thisref;
    } else {
        $refs->{$result['parentId']}->children->{$result['id']} = &$thisref;
    }
}

echo "<pre>";
print_r($tree);