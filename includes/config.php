<?php
$host_name = "localhost";
$database = "imagegenerator";
$username = "root";
$password = "root";

$connection = mysqli_connect($host_name, $username, $password, $database);

if (!$connection) {
    echo "Error: Unable to connect to MySQL.<br>";
    echo "<br>Debugging errno: " . mysqli_connect_errno();
    echo "<br>Debugging error: " . mysqli_connect_error();
   // exit;
}
?>