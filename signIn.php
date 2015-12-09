<?php
$userID = $_POST['username'];
$passwrd = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$query = "SELECT * FROM users WHERE username='{$userID}'";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		if ($row['username'] == $userID){
			if ($row['passwrd'] == $passwrd){
				echo $userID;
				$query2 = "UPDATE users SET isOn='on' WHERE username='{$userID}'";
				$result2 = mysqli_query($conn,$query2);
			} else {
				echo 'false';
			}
		}
	}
} else {
	echo "false";
};

$conn->close();

?>