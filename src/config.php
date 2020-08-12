<?php
// Change this variables to change your SQL configuration
$host = "192.168.0.99";
$username = "site";
$password = "site";
$dbname = "site";
/////////////////////////
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

?>