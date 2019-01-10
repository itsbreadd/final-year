<!DOCTYPE html>
<html>
<head>
<title> View Fixtures</title>
	<style>
	table {
		border-collapse: collapse;
		width:100%;
		color: #c96459;
		font-family: Coolvetica;
		font-size:25px;
		text-align: left;
	}
	th {
		background-color: #588c7e;
		color: white;
	}
	tr:nth-child(even) {background-color: #f2f2f2}
	</style>
</head>
<body>

<table>
	<tr>
		<th>Team 1</th>
		<th>Team 2</th>
		<th>League</th>
		<th>Cup</th>
		<th>Group</th>
		<th>Type</th>
	</tr>

<?php
//connection to db
$conn = mysqli_connect('localhost','root','root','ff');
if ($conn-> connect_error) {
	die("Connection Failed:". $conn-> connect_error);
}

$sql = "SELECT team1, team2, league, cup, group1, type FROM fixtures";
$result = $conn-> query($sql);

if ($result-> num_rows > 0) {
	while($row = $result-> fetch_assoc()){
		echo "<tr><td>". $row["team1"] ."</td><td>" . $row["team2"] . "</td><td>" . $row["league"] . "</td><td>" . $row["cup"] . "</td><td>" . $row["group1"] . "</td><td>" . $row["type"] . "</td></tr>";
	}
	echo "</table>";
}
else {
	echo "0 results";
}

$conn-> close();
?>


</table>
</body>
</html>