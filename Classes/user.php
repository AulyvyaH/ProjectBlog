<?php
//classe créée pour mettre en place les best practices, mais non utilisée dans notre cas
class User{
  private $firstname = "";
  private $lastname = "";
  private $email = "";

  public function __construct($firstname, $lastname, $email){
    $this->firstname = $firstname;
    $this->lastnaem = $lastname;
    $this->email = $email;
  }

  //GETTERS
  public function getFirstname(){
    return $this->firstname;
  }

  public function getLastName(){
    return $this->lastname;
  }

  public function getEmail(){
    return $this->email;
  }

  //SETTERS
  public function setFirstname($firstname){
    $this->firstname = $firstname;
  }

  public function setLastName($lastname){
    $this->lastname = $lastname;
  }

  public function setEmail($email){
    $this->email = $email;
  }
}

?>