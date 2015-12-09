<?php
$message = $_POST["message"];
$sender = $_POST["sender"];
$convoName = $_POST["conversation"];

$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};



$sqlmsg = "INSERT INTO {$convoName} (sender, message)
VALUES ('{$sender}',\"". htmlspecialchars($message) ."\")";
$result = mysqli_query($conn,$sqlmsg);

$conn->close();
?>