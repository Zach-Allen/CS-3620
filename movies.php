<?php
$servername = "zachallen-cs3620sql.mysql.database.azure.com";
$username = "zachallen@zachallen-cs3620sql";
$password = "GreenLantern@2814";
$dbname = "movies_schema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT idMovies, movieTitle FROM movies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["idMovies"]. " - Name: " . $row["movieTitle"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>