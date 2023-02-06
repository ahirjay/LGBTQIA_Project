<!--Page Name: index.php
    By: Yitao Cui.
    Student ID: 040981835.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Set up database configuration.
 -->

<?php
/*
 * Database credentials. Assuming you are running MySQL
 * server with default setting (user 'root' with no password)
 */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', '2slgbtqplus');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($link, 'utf-8');

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>