<?php

$room = $_POST['room'];

if(strlen($room)>15 or strlen($room)<3)
{
	$message= "Please choose a name between 3 to 15 charactors";
	echo '<script language = "javascript">';
	echo 'alert("'.$message.'");';
	echo 'location="index.php";';
	echo '</script>';
}

else if (!ctype_alnum($room)) 
{
	$message= "Please choose an alphanumeric chat room name";
	echo '<script language = "javascript">';
	echo 'alert("'.$message.'");';
	echo 'location="index.php";';
	echo '</script>';
}


else
{ 
	include 'connection.php';
}

//chech if chatroom alteady exists.

$sql = "SELECT * FROM rooms WHERE roomname = '$room'";
$result = mysqli_query($con, $sql);
if ($result) 
{

	if (mysqli_num_rows($result)>0) 
	{	
		$message= "Please choose a different room name.This room is already taken.";
		echo '<script language = "javascript">';
		echo 'alert("'.$message.'");';
		echo 'location="index.php";';
		echo '</script>';
	}
	else
	{
		$sql = "INSERT INTO rooms (roomname, stime) VALUES ( '$room', CURRENT_TIMESTAMP);";
		if (mysqli_query($con,$sql)) 
		{
			$message= "Your Chatroom is ready and you can chat now";
			echo '<script language = "javascript">';
			echo 'alert("'.$message.'");';
			echo 'location="room.php?roomname='.$room.'"; ';
			
			echo '</script>';
		}
		
	} 
}

else
{
	echo "Error: ".mysqli_error($con);
}

?>