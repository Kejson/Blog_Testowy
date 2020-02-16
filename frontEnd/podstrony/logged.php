<?php

    session_start();
    if(!isset($_SESSION['doneregister'])){
       header('Location: index.php');
       exit();
    }
    else{
      unset($_SESSION['doneregister']); 
    }
   
?>
<html lang="pl">
  <head> 
  <meta charset="utf-8"/>
  <title>Stronka</title>
  </head>
  <body>
    <h1>Hello</h1>
  </body>
</html>