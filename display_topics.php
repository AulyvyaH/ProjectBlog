<?php
session_start();
require_once("initializer.php");
require_once("Classes/topic.php");
$output="";
  try{//deuxième check sur la connexion de l'user, pour certitude 
    if (isset($_SESSION['user_connected'])){
      $pdo = new PDO('sqlite:data.sqlite');
      initDB($pdo);
      $sql = "SELECT * from topics";
      $stmt = $pdo->query($sql);
      $results = $stmt->fetchAll();
      forEach($results as $result){
        $title = $result['title'];
        $creation_date = $result['creation_date'];
        $author = $result['author'];
        $output .= "<div class=\"topic-item\">";
        $output .= "<p class=\"topic-title\">".$title."</p>";
        $output .= "<p class=\"topic-author\">Rédigé par ".$author.", le ".$creation_date."</p>";
        $output .= "<a class=\"topic-link\" href=\"details.php?id=".$result['id']."\">Voir les détails</a>";
        $output .= "</div>";
        }
        echo $output;
      } else {
        echo "<script>window.location=\"index.php\";</script>";
      }
    } catch (PDOException $e) {
    echo "<script>alert('Erreur de connexion à la base de données');</script>";
    echo "<script>window.location=\"index.php\";</script>";
    }
?>