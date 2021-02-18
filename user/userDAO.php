<?php
class UserDAO {
  function getUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT firstName, lastName, userName, user_id FROM cs3620_proj.user WHERE user_id =" . $user->getUserId();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["firstName"]);
        $user->setLastName($row["lastName"]);
        $user->setUsername($row["userName"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  // for username
  function getUserN($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT firstName, lastName, userName FROM cs3620_proj.user WHERE userName ="."'". $user->getUsername() ."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["firstName"]);
        $user->setLastName($row["lastName"]);
        $user->setUsername($row["userName"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  // for firstname
  function getUserF($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT firstName, lastName, userName FROM cs3620_proj.user WHERE firstName ="."'". $user->getFirstName() ."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["firstName"]);
        $user->setLastName($row["lastName"]);
        $user->setUsername($row["userName"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  // for lastname
  function getUserL($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT firstName, lastName, userName FROM cs3620_proj.user WHERE lastName ="."'". $user->getLastName() ."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["firstName"]);
        $user->setLastName($row["lastName"]);
        $user->setUsername($row["userName"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function createUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "INSERT INTO cs3620_proj.user
    (
    `userName`,
    `password`,
    `firstName`,
    `lastName`)
    VALUES
    ('" . $user->getUsername() . "',
    '" . $user->getPassword() . "',
    '" . $user->getFirstName() . "',
    '" . $user->getLastName() . "'
    );";

    if ($conn->query($sql) === TRUE) {
      echo "user created";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }

  function deleteUser($un){
    require_once('./utilities/connection.php');
    
    $sql = "DELETE FROM cs3620_proj.user WHERE userName = '" . $un . "';";

    if ($conn->query($sql) === TRUE) {
      echo "user deleted";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>