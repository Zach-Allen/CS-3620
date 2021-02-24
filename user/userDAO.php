<?php
class UserDAO {
  function getUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT first_name, last_name, username, user_id FROM user WHERE user_id =" . $user->getUserId();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["first_name"]);
        $user->setLastName($row["last_name"]);
        $user->setUsername($row["username"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function checkLogin($username, $password){
    require_once('./utilities/connection.php');
    $user_id = 0;
    $sql = "SELECT user_id FROM users WHERE username = '" . $username . "' AND password = '" . hash("sha256", trim($password)) . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"];
      }
    }
    else {
        echo "0 results";
    }
    $conn->close();
    return $user_id;
  }

  function createUser($user){
    require_once('./utilities/connection.php');

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO cs3620_proj.users (`username`,
    `password`,
    `first_name`,
    `last_name`) VALUES (?, ?, ?, ?)");

    $un = $user->getUsername();
    $pw = $user->getPassword();
    $fn = $user->getFirstName();
    $ln = $user->getLastName();

    $stmt->bind_param("ssss", $un, $pw, $fn, $ln);
    $stmt->execute();

    $stmt->close();
    $conn->close();
  }

  function deleteUser($un){
    require_once('./utilities/connection.php');
    
    $sql = "DELETE FROM cs3620_proj.user WHERE username = '" . $un . "';";

    if ($conn->query($sql) === TRUE) {
      echo "user deleted";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>