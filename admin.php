<?php

include './models/imports.php';

session_start();

if (!isset($_SESSION['admin'])) {
 $_SESSION['admin'] = null;
}

if (!isLoggedInAdmin()) {
 header('Location ./index.php');
 echo ($_SESSION['admin']);
} else {
?>

<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>µPlanner - Admin Portal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.min.css">
  </head>
  <body>
    <nav>

    </nav>
  </body>
</html>

 <?php }?>