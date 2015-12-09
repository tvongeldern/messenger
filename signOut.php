<?php
$user = $_POST['sender'];


$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$query2 = "UPDATE users SET isOn='off' WHERE username='{$user}'";
$result2 = mysqli_query($conn,$query2);

$conn->close();

?>