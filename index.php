<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>Site</title>
	<link rel="stylesheet" type="text/css" href="Css/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>


<div class="navbar">
	<ul>
  		<li><a href="index.html">Hem</a></li>
  		<li><a href="vote.html">Skriv under</a></li>
  		<li><a href="Info.html">Information</a></li>
	</ul>
</div>



<p>	Tack för underskriften <?php echo $_POST["name"]; ?> <br> </p>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databas_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tabell_1 (namn, email, ort)
VALUES ('$_POST[name]', '$_POST[email]', '$_POST[ort]')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>


<div class="total">

<?php

$sql = "SELECT id, namn, email, ort FROM tabell_1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
              echo "<table class='table table-striped'><tr><th>ID</th><th>name</th><th>email</th><th>ort</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) { 
     	echo "<tr><td>".$row["id"]."</td><td>".$row["namn"]."</td><td>".$row["email"]."</td><td>".$row["ort"]."</td></tr>" ;
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>

</div>



</body>
</html>