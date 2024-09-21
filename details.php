<?php
session_start();
require_once("initializer.php");
?>
<html>
  <head>
    <title>Details</title>
    <link rel="stylesheet" href="Styles/details.css">
  </head>
  <body>
    <?php 
      if (!(isset($_SESSION['user_connected']))){
        echo "<script>window.location=\"error.php\";</script>";
    } else { ?>
    <div class="drop drop-4">
      <button class="logout" onclick="location.href='logout.php'" type="button">
        <img src="Images/logout.png" alt="log out" border="0"/>
      </button>
    </div>
    <div class="container">
    <?php include 'display_detail.php' ?>
    </div>
    <?php } ?>
      <div class="drop drop-1"></div>
      <div class="drop drop-2"></div>
      <div class="drop drop-3"></div>
      <div class="drop drop-5"></div>
    </body>
</html>