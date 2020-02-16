<?php
    session_start(); 

/* Do sprawdzenia czy jest już zalogowany czy nie
        if (!(isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
        {
            header('Location: profile.php');
            exit();
        }
 
*/
  
      //Jak nie zadziala na dole i bedzie problem z indexami w htmlu
      
      /*
      It worked
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $haslo = isset($_POST['hasło']) ? $_POST['hasło'] : '';
        */ 
        
 
   

    // Zbiór wszystkich zmiennych
        $host = "127.0.0.1";
        $password1 = "root";
        $databaseToConnect = "blog_testowy";
        $name1 = isset($_POST['name']) ? $_POST['name'] : '';
        $surr1 =isset($_POST['surr']) ? $_POST['surr'] : '';
        $mail1 =isset($_POST['mail']) ? $_POST['mail'] : '';
        $nickname=isset($_POST['nick']) ? $_POST['nick'] : '';
        $password2=isset($_POST['pass']) ? $_POST['pass'] : '';
        $checkPassword =isset($_POST['checkPass']) ? $_POST['checkPass'] : '';
        $emailCheck = filter_var($mail1, FILTER_SANITIZE_EMAIL);


   //Połączenie z baza danych
   $connect =mysqli_connect($host,$password1,'',$databaseToConnect)or die('Error' . mysqli_error());

   if(isset($_POST['mail'])){

       $Done = true;

       //Nickname
       if(strlen($nickname)<5 || (strlen($nickname)>15))
       {
                   $Done = false;
                   $_SESSION['error_nickname']="Musi posiadać od 5 do 15 znaków";
       }
       // Czy są alfanumeryczne w mailu
       if(ctype_alnum($nickname)==false){
           $Done = false;
           $_SESSION['error_nickname']="Nick może składać się tylko z liter i cyfr!";
       }
       // Sprawdzenie poprawności wpisywania Maila walidacji etc.
       if((filter_var($emailCheck, FILTER_VALIDATE_EMAIL)==false) || ($emailCheck!=$mail1)){
                $Done = false;
                $_SESSION['error_mail']="Podaj poprawny adres e-mail!";
       }
        //Sprawdzenie hasła oraz danie mu jakiś waznych reguł
        if(strlen($password2)<10 || (strlen($password2) > 20)){
            $Done = false;
            $_SESSION['error_haslo']="Hasło musi posiadać od 10 do 20 znaków";
        }
        //Hasła muszą być takie same
        if($password2!=$checkPassword){
            $Done = false;
            $_SESSION['error_haslo']="Podane hasła nie są indentyczne!";
        }
        if($password2 == '1234567890' || $password2 == 'qwerty1234'){
            $Done = false;
            $_SESSION['error_haslo']="Twoje haslo, znajduje się w liście łatwych haseł!";
        }
        if(ctype_alnum($name1)==false || (ctype_alnum($surr1)==false)){
            $Done = false;
            $_SESSION['error_name&surname']="Imię i Nazwisko może składać się tylko z liter!";
        }
        if(empty($mail1)){
            $Done = false;
            $_SESSION['error_email_checked']="Twój e-mail nie może być pusty!";
        }
                $hashed_password = password_hash($password2, PASSWORD_DEFAULT);
            //It cheks if database exists, and there are no problems
             
            mysqli_report(MYSQLI_REPORT_STRICT);
            try {
                    $conected = new mysqli($host,$password1,'aa',$databaseToConnect);
                
                    if($conected->connect_errno!=0){
                        throw new Exception(mysqli_connect_errno());
                    }
            else{

                //If user already exists in database
                $results = $conected->query("SELECT * FROM `użytkownicy` WHERE `Nick`='$nickname'");    

                    if(!$results) throw new Exception($conected->error);

                    $how_many_nicks = $results->num_rows;
                    if($how_many_nicks>0){

                        $Done = false;
                        $_SESSION['error_nickname_again']="Istnieje juz taki uzytkownik. Wprowadz inny nickname";
                    }
                    // If email already exists in database
                    $results2 = $conected->query("SELECT * FROM `użytkownicy` WHERE `Mail`='$mail1'");
                   if(!$results2) throw new Exception($conected->error);

                    $how_many_emails = $results2->num_rows;
                    if($how_many_emails>0){
                            $Done = false;
                            $_SESSION['error_mail_again']="Istnieje juz taki E-mail. Wprowadz inny Mail";
                    }
                    }
                    


                   $conected->close();
            }
            catch(Exception $element){
                echo "Błąd, Error, Serwer nie działa";
            }
       if($Done == true){
               //Dodanie do bazy;
               $ask = ("INSERT INTO użytkownicy VALUES ('$name1','$surr1','$mail1','$nickname','$hashed_password')");
               $queryVersion = mysqli_query($connect,$ask);

               header("Location: logged.php");
               
               $_SESSION['doneregister']=true;
               
       }  
           
       }

       //Zakońzcenie połączenia z bazą danych
    mysqli_close($connect);
?>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rejestracja</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat&display=swap" rel="stylesheet">

    <link href="./style/register.css" rel="stylesheet" type="text/css">
    <style> 
           .ERROR{
               color: red;
               font-size: 12px;
               margin-top: 5px;
               margin-bottom: 5px;
           }
        </style>
</head>

<body>

    <section class="container">
        <article class="row">
            <section class="col mt-5">
                <h1>Rejestracja</h1>
                <form class="form-group" method="POST">
                    <input type='text' placeholder="Imie..." name='name' class="form-control" >
                    <?php
                        if(isset($_SESSION['error_name&surname'])){
                            echo '<div class="ERROR">'.$_SESSION['error_name&surname'].'</div>';
                            unset($_SESSION['error_name&surname']);
                        }
                    ?>
                    <input type="text" placeholder="Nazwisko..." name='surr' class="form-control" >
                    <?php
                        if(isset($_SESSION['error_name&surname'])){
                            echo '<div class="ERROR">'.$_SESSION['error_name&surname'].'</div>';
                            unset($_SESSION['error_name&surname']);
                        }
                    ?>
                    <input type='email' placeholder="Mail..." name='mail' class="form-control">
                    <?php
                        if(isset($_SESSION['error_mail'])){
                            echo '<div class="ERROR">'.$_SESSION['error_mail'].'</div>';
                            unset($_SESSION['error_mail']);
                        }
                        if(isset($_SESSION['error_email_checked'])){
                            echo '<div class="ERROR">'.$_SESSION['error_email_checked'].'</div>';
                            unset($_SESSION['error_email_checked']);
                        }
                        if(isset($_SESSION['error_mail_again'])){
                            echo '<div class="ERROR">'.$_SESSION['error_mail_again'].'</div>';
                            unset($_SESSION['error_mail_again']);
                        }
                    ?>
                    <input type="text" placeholder="Nick..." name='nick' class="form-control" >
                    <?php
                        if(isset($_SESSION['error_nickname'])){
                            echo '<div class="ERROR">'.$_SESSION['error_nickname'].'</div>';
                            unset($_SESSION['error_nickname']);
                        }
                        if(isset($_SESSION['error_nickname_again'])){
                            echo '<div class="ERROR">'.$_SESSION['error_nickname_again'].'</div>';
                            unset($_SESSION['error_nickname_again']);
                        }
                    ?>
                    <input type="password" placeholder="Hasło..." name='pass' class="form-control" >
                    <?php
                        if(isset($_SESSION['error_haslo'])){
                            echo '<div class="ERROR">'.$_SESSION['error_haslo'].'</div>';
                            unset($_SESSION['error_haslo']);
                        }
                    ?>
                    <input type="password" placeholder="Potwierdź hasło..." name='checkPass' class="form-control">
                    <?php
                        if(isset($_SESSION['error_haslo'])){
                            echo '<div class="ERROR">'.$_SESSION['error_haslo'].'</div>';
                            unset($_SESSION['error_haslo']);
                        }
                    ?>
                    <button class="btn btn-primary" type="submit">Zatwierdź</button>
                </form>
            </section>
        </article>
    </section>
</body>

</html>
