
<?php

/*  Page Name: config.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
    Client: Charlie Dazé 
    Prototype: 2
    Purpose: Set up configuration for the database
*/

/*
* Database credentials. Assuming you are running MySQL
* server with default setting (user 'root' with no password)
*/
if (!defined('DB_SERVER')) {
    define('DB_SERVER', 'localhost');
}
if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'root');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', '2slgbtqplus');
}

/* Attempt to connect to MySQL database */
self::$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (self::$link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
