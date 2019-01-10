<?php

$conn = mysqli_connect('localhost','root','root','ff');
if ($conn-> connect_error) {
	die("Connection Failed:". $conn-> connect_error);
}
	
	$Team1 = $_POST['team1'];
	$Team2 = $_POST['team2'];
	$League = $_POST['league'];
	$Cup = $_POST['cup'];
	$Group1 = $_POST['group1'];
	$Type = $_POST['type'];
	
	$sql = "INSERT INTO fixtures (Team1,Team2,League,Cup,Group1,Type) 
	VALUES ('$Team1', '$Team2', '$League', '$Cup', '$Group1', '$Type')";
	
	if(!mysqli_query($conn,$sql))
	{
		echo 'Not Inserted';
	}
	else
	{
		echo 'inserted';
	}

?>