<?php
  require_once('./user/userDAO.php');

  Class User{
    private $username;
    private $user_id;

    public function getUser($_user_id){
      $this->user_id = $user_id;

      $userDAO = new UserDAO();
      $userDAO->getUser($this);

      return $this;
    }

    public function getUserName(){
      return $this->username;
    }

    public function setUsername($username){
      $this->username = $username;
    }

    public function getUserId(){
      return $this->user_id;
    }
  }

?>