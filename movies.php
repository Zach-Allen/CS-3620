<?php
session_start();
$servername = "zachallen-cs3620sql.mysql.database.azure.com";

$username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);
$dbname = "movies_schema";

//zachallen@zachallen-cs3620sql
//Password123$

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
