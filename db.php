<?php
$dbHost     = "localhost";
$dbUsername = "c2224779_root";
$dbPassword = "Hoa@111200";
$dbName     = "c2224779_Ghibliweb";

// Create database connection
$connection = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName,8000);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>