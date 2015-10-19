<?php

require_once("DatabaseHandler.php");

$designation = $_POST['designation'];
$institute = $_POST['institute'];
$from = $_POST['from'];
$to = $_POST['to'];
$databaseHandler = new DatabaseHandler();
foreach( $designation as $key => $n ) {
    $SQL = "INSERT INTO data(designation,institute,m_from,m_to) VALUES (";
    $SQL .= "'$designation[$key]','$institute[$key]','$from[$key]','$to[$key]')";
    $databaseHandler->executeInsert($SQL);
}
echo "Inserted";

