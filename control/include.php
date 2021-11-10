<?php
$dbhost = "localhost";
$dbuser = "user";
$dbpass = "pass";
$db = "sampledatabase";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error)
?>