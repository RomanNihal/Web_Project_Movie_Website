<?php
  session_start();
  include 'connect.php';

  $username =  $_POST['mail'];
  $password =  $_POST['pass'];

  $sql = "SELECT * FROM user1 WHERE username = '$username' AND passwd = '$password' ";

  $result = $conn->query($sql);

  if(!$row = $result->fetch_assoc()) {
    echo '<div class="alert alert-success" role="alert">incorrect username or password</div>';
    header("Location: signInPage.php");
  }
  else {
    $_SESSION['id'] = $row['id'];
    header("Location: homePage.php");
  }
?>
