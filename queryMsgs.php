<?php

$convoName = $_POST["conversation"];
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];

$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$query = "SELECT * FROM {$convoName}";
$reply = mysqli_query($conn, $query);

if(empty($reply)) {
                $query = "CREATE TABLE {$convoName} (
							sender varchar(25),
							message varchar(250),
							timeSent TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                          )";
                $reply = mysqli_query($conn, $query);
};

$query2 = "SELECT isOn FROM users WHERE username='{$receiver}'";
$result2 = mysqli_query($conn,$query2);
while ($row = mysqli_fetch_array($result2)){
	echo $row[0];
}

$conn->close();



?>