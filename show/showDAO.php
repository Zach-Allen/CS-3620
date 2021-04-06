<?php
class showDAO {
  function getAllShows(){
    require_once('./utilities/connection.php');
    require_once('./show/show.php');

    $sql = "SELECT show_id, show_name, show_rating, show_description, user_id FROM cs3620_proj.shows";
    $result = $conn->query($sql);

    $shows;
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $show = new show();

            $show->setShowId($row["show_id"]);
            $show->setShowName($row["show_name"]);
            $show->setShowRating($row["show_rating"]);
            $show->setShowDescription($row["show_description"]);
            $show->setUserId($row["user_id"]);
            $shows[$index] = $show;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    }
    $conn->close();

    return $shows;
  }
  
  function getShowsByUserId($user_id){
    require_once('./utilities/connection.php');
    require_once('./show/show.php');

    $sql = "SELECT show_id, show_name, show_rating, show_description, user_id FROM cs3620_proj.shows WHERE user_id =" . $user_id;
    $result = $conn->query($sql);

    $shows;
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $show = new show();

            $show->setShowId($row["show_id"]);
            $show->setShowName($row["show_name"]);
            $show->setShowRating($row["show_rating"]);
            $show->setShowDescription($row["show_description"]);
            $show->setUserId($row["user_id"]);
            $shows[$index] = $show;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    }
    $conn->close();

    return $shows;
  }

  function createShow($show){
    require_once('./utilities/connection.php');

    $insertShow = $conn->prepare("INSERT INTO cs3620_proj.shows (`show_name`,
    `show_rating`, `show_description`, `user_id`) VALUES (?, ?, ?, ?)");

    $sn = $show->getShowName();
    $sr = $show->getShowRating();
    $sd = $show->getShowDescription();
    $uid = $show->getUserId();

    $insertShow->bind_param("sssi", $sn, $sr, $sd, $uid);
    $insertShow->execute();

    $insertShow->close();
    $conn->close();
  }

  function deleteShow($uid, $sid){
    require_once('./utilities/connection.php');
    
    $sql = "DELETE FROM cs3620_proj.shows WHERE user_id = " . $uid . " AND show_id = " . $sid . ";";

    if ($conn->query($sql) === TRUE) {
      echo "show deleted";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }

}
?>
