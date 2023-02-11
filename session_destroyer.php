<?php 
  if(empty($_SESSION['userID']))
  {
    header('location:index.php');
  }
?>
