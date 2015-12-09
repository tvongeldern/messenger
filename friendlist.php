<?php
$sender = $_POST['sender'];

$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$query = "SHOW TABLES IN messages LIKE '%{$sender}%'";
$result = mysqli_query($conn,$query);

while($var = mysqli_fetch_array($result)){
echo $var[0];
};

$conn->close();

?>