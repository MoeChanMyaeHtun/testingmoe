<?php

  
   include_once './init.php';
   include './navbar.php';
   
   if(!isset($_SESSION["auth"])) {
       redirect('login.php');
   }
   
 ?>
<?php include 'header.php'?>
