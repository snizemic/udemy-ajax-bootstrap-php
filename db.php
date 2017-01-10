<?php

$server = 'localhost';
$user = 'root';
$password = 'root';
$db = 'school';

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}