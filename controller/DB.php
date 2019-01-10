<?php

		include('DBCon.php');
		
		
		$pdo = new PDO ("mysql:dbname=$database;host=$host" , $user , $password);

?>