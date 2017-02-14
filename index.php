
Welcome <?php echo $_POST["name"]; ?><br>
Email: <?php echo $_POST["email"]; ?><br>
Ort: <?php echo $_POST["ort"]; ?><br>


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
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>