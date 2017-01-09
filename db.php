<?php

$server = 'localhost';
$user = 'root';
$password = 'root';
$db = 'school';

$conn = mysqli_connect($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
while ($student = $result->fetch_assoc()){
  echo $student['id'] . ' – ' . $student['name'] . '<br>';
}

$conn->close();

