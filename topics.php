<?php
session_start();
require_once("initializer.php");
//set du firstname pour affichage du nom de l'user en haut de la page topics
$firstname = isset($_COOKIE["firstname"]) ? $_COOKIE["firstname"] : null;
?>
<html>
  <head>
    <title>Topics</title>
    <link rel="stylesheet" href="Styles/topics.css">
  </head>
  <body>
    <?php //si pas de user_connected dans la superglobale, on n'est pas connecté -> retour à la page d'accueil
      if (!(isset($_SESSION['user_connected']))){
        echo "<script>window.location=\"error.php\";</script>";
         } else { 
        if ($firstname)
          {
            echo "<p class=\"greetings\">Heureux de te revoir, $firstname!</p> <br>";
          } ?>
        <div class="drop drop-4">
          <button class="logout" onclick="location.href='logout.php'" type="button">
              <img src="Images/logout.png" alt="log out" border="0"/>
          </button>
        </div>
        <h1>Liste des topics</h1>
          <p class="subtitle">Vous trouverez sur cette page la liste de tous nos topics. 
            Cliquez sur "Voir les détails" pour en savoir plus!</p>
        <div class="container">
          <?php include 'display_topics.php' ?>
        <div>
    <?php } ?>
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-5"></div>
</html>