<?php
$dbhost ="localhost";
$dbuser="root";
$dbpass="";
$dbname="db";


$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno())
{
    die("database connection fail".mysqli_connect_error());
}
?>