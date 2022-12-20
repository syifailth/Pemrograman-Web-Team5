<?php
$host = 'sql108.byethost4.com';
$db = 'b4_33234874_coba5';
$usr = 'b4_33234874';
$pwd = 'notenote5';

// parameter = hostname, username, password, database
$conn = mysqli_connect($host, $usr, $pwd, $db); //true|false

if (!$conn) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}