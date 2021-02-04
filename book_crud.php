<?php
session_start();
$servername = "cs3620-books-sql.mysql.database.azure.com";

// $username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
// $password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);
$username="zachallen";
$password="Password123$";
$dbname = "books_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, author FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["idBooks"]. " - Title: " . $row["title"]. "<br>";
  }
} else {
  echo "0 results";
}
//insert new data
$sql = "INSERT INTO books (title, author)
VALUES ('Hunger Games', 'Suzanne Collins')";
$result = $conn->query($sql);

echo "New book created successfully <br>";

$sql = "DELETE FROM books WHERE title='Hunger Games'";
$result = $conn->query($sql);

echo "Book deleted successfully <br>";

$sql = "SELECT title, author FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["idBooks"]. " - Title: " . $row["title"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
