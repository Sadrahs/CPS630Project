<?php
$servername = "localhost";
$username = "root";  // Default user for XAMPP
$password = "";  // Default password is empty
$dbname = "osp_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
