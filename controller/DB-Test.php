<?php 

	include('DBCon.php');
		
try{
		$pdo = new PDO ("mysql:dbname=$database;host=$host" ,$user , $password);
		echo"Connected to Database";
		}
		
catch(PDOException $e)
	{
	echo $e->getmessage();
	}
	
	?>