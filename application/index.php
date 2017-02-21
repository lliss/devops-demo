<?php
$servername = 'localhost';
$username   = 'username';
$password   = 'password';
$dbname     = 'application';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name FROM names";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>DEMO</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body id="home">

<?php

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
  	print '<p>' . $row['name'] . '</p>';
  }
}
else {
	print '<p>No results</p>';
}

?>

	</body>
</html>

<?php
$conn->close();
?>
