<?php
session_start();
require_once("initializer.php");
require_once("Classes/topic.php");
$output="";
if(isset($_GET['id'])){
  try{
      $id = $_GET['id'];
      $pdo = new PDO('sqlite:data.sqlite');
      initDB($pdo);
      $sql = "SELECT * from topics where id=:id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':id' => $id));
      $results = $stmt->fetch();
      if($results){
        $topic = new Topic($results['id'],$results['title'], $results['content'],$results['author'], $results['creation_date']);
        $output .= "<div class=\"detail\"><h1>".$topic->getTitle()."</h1>";
        $output .= "<p class=\"subtitle\">Rédigé par ".$topic->getAuthor().", le ".$topic->getCreationDate()."</p>";
        $output .= "<p class=\"detail-text\">".$topic->getContent()."</p></div>";
        $output .= "<div class=\"back\"><a href=\"topics.php\">Retour à la liste des   topics</a></div>";
        echo $output;
      } else {
        echo "<script>window.location=\"index.php\";</script>";
      }
  } catch (PDOException $e) {
    echo "<script>alert('Erreur de connexion à la base de données');</script>";
    echo "<script>window.location=\"index.php\";</script>";
  }
}
?>