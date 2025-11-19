<?php
// Database configuration for PNGTechCo

$host    = "localhost";                 // or Hostinger DB host
$db_name = "pngtechco_db";             // change to your DB name
$db_user = "pngtechco_user";           // change to your DB user
$db_pass = "YOUR_DB_PASSWORD_HERE";    // change to your DB password

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
