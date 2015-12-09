<?php
$conversation = $_POST['conversation'];
$messageCt = $_POST['messageCt'];
$sender = $_POST['sender'];

$servername = "localhost";
$username = "root";
$password = "0ls6z15UDf";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$query = 'SELECT * FROM ' . $conversation;
$result = mysqli_query($conn,$query);
$num = mysqli_num_rows($result);

if ($num > $messageCt){
	$newMsg = $num - $messageCt;
	$query2 = "SELECT * FROM (SELECT * FROM {$conversation} ORDER BY {$conversation}.`timeSent` DESC LIMIT {$newMsg})xxx ORDER BY `timeSent` ASC";
	$result2 = mysqli_query($conn,$query2);
	
	while($row = $result2->fetch_assoc()) {
		if ($row["sender"] == $sender){
        echo "<td class='myMessage'>" . $row["message"]. "<br></td>";
		} else if ($row['sender'] != $sender){
			echo "<td class='theirMessage'>" . $row["message"]. "<br></td>";
		}
    }
};

if ($num < $messageCt){
	echo $num . ' + ' . $messageCt;
}

?>