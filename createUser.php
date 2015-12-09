<?php

$userID = $_POST["username"];
$passwrd = $_POST["password"];

$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$check = "SELECT * FROM users WHERE username='{$userID}'";
$runtest = mysqli_query($conn,$check);

if ($runtest->num_rows == 0){

$query = "INSERT INTO users (username, passwrd, isOn)
VALUES ('{$userID}','{$passwrd}','off')";
$result = mysqli_query($conn,$query);

if ($result === TRUE){
	echo "Welcome to the network, {$userID}! Click here to sign in";
} else {
	echo "NETWORK ERROR";
}

} else {
	echo "Sorry to tell you, but there is already another {$userID} out there. Try another username.";
};

?>