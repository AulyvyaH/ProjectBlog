<?php
class Topic{
  private string $title;
  private string $content;
  private string $author;
  private string $creation_date;
  private int $id;

  public function __construct($id,$title, $content, $author, $creation_date){
    $this->id = $id;
    $this->title = $title;
    $this->content = $content;
    $this->author = $author;
    $this->creation_date = $creation_date;
  }

  //GETTERS
  public function getId(){
    return $this->id;
  }
  
  public function getTitle(){
    return $this->title;
  }

  public function getContent(){
    return $this->content;
  }

  public function getAuthor(){
    return $this->author;
  }

  public function getCreationDate(){
    return $this->creation_date;
  }

  //SETTERS
  public function setId($id){
    $this->id = $id;
  }
  
  public function setTitle($title){
    $this->title = $title;
  }

  public function setContent($content){
    $this->content = $content;
  }

  public function setAuthor($author){
    $this->author = $author;
  }

  public function setCreationDate($creation_date){
    $this->creation_date = $creation_date;
  }
}

?>