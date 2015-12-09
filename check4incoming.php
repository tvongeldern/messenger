<?php
$array = $_POST['convos'];
$sender = $_POST['sender'];
$friends = $_POST['friends'];

$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$convos = explode(',',$array);
$friends = explode(',',$friends);

for ($i = 0; $i < count($convos); $i++){
	$conversation = $convos[$i];
	$friend = $friends[$i];
	$query = 'SELECT * FROM ' . $conversation;
	$result = mysqli_query($conn,$query);
	$num = mysqli_num_rows($result) . ',';
	/*/$query2 = "SELECT isOn FROM users WHERE username='{$friend}'";
	$result2 = mysqli_query($conn,$query2);/*/
	echo $friend . '=' . $num;
};


?>