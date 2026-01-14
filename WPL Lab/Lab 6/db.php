<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "timenest1";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}
?>
