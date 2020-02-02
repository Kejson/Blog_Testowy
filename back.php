
<?php

    session_start();

        $login =$_POST['login'];
        $haslo =$_POST['password'];
        $host = "127.0.0.1";
        $password1 = "root";
        $databaseToConnect = "blog_testowy";

       $connect =mysqli_connect($host,$password1,'',$databaseToConnect)or die('Error' . mysqli_error());

       if($connect == TRUE){
               echo "Connected";
       }
       else{
               echo "Not connected";
       }
       echo $login.'<br>'.$haslo;
       echo 'Siemano Kamil :)'

        mysqli_close($connect);

?>
