<?php
// admin/db.php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'your_database_name';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
