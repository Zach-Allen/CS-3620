<?php
require_once('./show/showDAO.php');

class Show implements \JsonSerializable {

  // object member variables
  private $show_id;
  private $show_name;
  private $user_id;
  private $show_rating;
  private $show_description;

  function __construct() {
  }

  function getShowId(){
    return $this->show_id;
  }
  function setShowId($show_id){
    $this->show_id = $show_id;
  }

  function getShowName() {
    return $this->showTitle;
  }
  function setShowName($show_title){
    $this->show_title = $show_title;
  }
  
  function getShowDescription() {
    return $this->show_description;
  }
  function setShowDescription($show_description){
    $this->show_description = $show_description;
  }

  function getShowRating() {
    return $this->show_rating;
  }
  function setShowRating($show_rating){
    $this->show_rating = $show_rating;
  }

  // user_id setter
  function setUserId($user_id){
    $this->user_id = $user_id;
  }
 
  function getMyShows(){
    $showDAO = new showDAO();
    return $showDAO->getAllShows();
  }

  function getAllShows() {
    $showDAO = new showDAO();
    return $showDAO->getAllShows();
  }

  // serialize object Json
  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }

  // create new hero entry
  function createShow(){
    $showDAO = new showDAO();
    $showDAO->createShow($this);
  }
}
?>
