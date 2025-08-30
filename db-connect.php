<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "cdsldb";
$conn = new mysqli("localhost", "root", "", "cdsldb");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 