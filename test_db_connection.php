<?php
$hostname = 'localhost';
$username = 'root';    // Ganti dengan username database Anda
$password = 'heikal';  // Ganti dengan password database Anda
$database = 'percetakan';  // Ganti dengan nama database Anda
$port = 3307;
$mysqli = new mysqli($hostname, $username, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
echo 'Connected successfully.';
$mysqli->close();
?>
