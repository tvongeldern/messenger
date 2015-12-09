<?php
$input = $_POST['input'];
$sender = $_POST['sender'];
$sender = '8amp8' . $sender . '8amp8';

$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$query = "SHOW TABLES LIKE '%{$sender}%'";
$result = mysqli_query($conn,$query);
$num = mysqli_num_rows($result);

if ($num != $input){
	echo 'you have a new message';
};

$conn->close();

?>