<?php
session_start();
require_once("initializer.php");
require_once("Classes/user.php");
if (isset($_SESSION['wrong_credentials'])){
  unset($_SESSION['wrong_credentials']);
}
try{
$pdo = new PDO('sqlite:data.sqlite');
initDB($pdo);
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['email']) && isset($_POST['password'])){
      $email = $_POST['email'];
      $password = $_POST['password'];
      $pdo = new PDO('sqlite:data.sqlite');
      $sql = "SELECT * from USERS where email = :email and password = :password";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([':email' => $email, ':password' => $password]);
      $results = $stmt->fetch(PDO::FETCH_ASSOC);
      if($results){
        http_response_code(400);
        $connected_user = new User($results['firstname'],$results['lastname'], $results['email']);
        $cookie_value = $results['firstname'];
        $_SESSION['user_connected'] = true;
        if (isset($_SESSION['wrong_credentials'])){
          unset($_SESSION['wrong_credentials']);
        }
        setcookie('firstname',$cookie_value, time() + 3600 * 24,"/");
        header("Location: topics.php");
      } else {
        http_response_code(400);
        $_SESSION['wrong_credentials'] = true;
        echo "<script>window.location=\"index.php\";</script>";
      } 
    } else {
      http_response_code(400);
    }
  }
} catch (PDOException $e) {
  http_response_code(500);
  echo "<script>alert('Erreur de connexion à la base de données');</script>";
  echo "<script>window.location=\"index.php\";</script>";
}
?>