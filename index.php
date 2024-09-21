<?php 
//initialisation des données en DB, NE PAS SUPPRIMER
require_once("initializer.php");
session_start();
if(!isset($_SESSION['csrf_token'])){
  //génération du csrf token pour sécuriser la requête POST pour l'identification. 
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  $csrf_token = $_SESSION['csrf_token'];
}
?>
<html>
  <head>
    <title>MonBusiness - Forum</title>
    <link rel="stylesheet" href="Styles/homepage.css">
  </head>
  <body>
    <div class="container"></div>
      <form method="POST" action="login.php">
        <p>MonBusiness - Forum</p>
        <p class="subtitle">Veuillez vous connecter pour accèder au forum de MonBusiness</p>
        <input type="hidden" name="csrf_token" value="<?php $csrf_token ?>>">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Connexion</button>
      </form>
    <?php
    if(isset($_SESSION['wrong_credentials']) && $_SESSION['wrong_credentials']==true) { ?>
        <p class="error">Email/mot de passe erroné</p>
    <?php } ?>
    </div>

    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
  </body>
</html>
