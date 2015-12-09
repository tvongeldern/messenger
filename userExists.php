<?php
$user = $_POST['user'];
$sender = $_POST['sender'];

$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};


$query = "SELECT * FROM users WHERE username='{$user}' AND username!='{$sender}'";
$result = mysqli_query($conn,$query);


if ($result->num_rows > 0){
	echo $user;
} else {
	echo 'false';
};


?>