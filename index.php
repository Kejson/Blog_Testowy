<?php
  /* session_start();
   $connected = @new mysqli("localhost", "root","","blog_testowy")or die("Error". mysqli_error());


   if($connected->connect_errno!=0){
         echo "Error message".$connected->connect_errno;
     }
       else{
        $nickname=isset($_POST['nick']) ? $_POST['nick'] : '';
        $password2=isset($_POST['pass']) ? $_POST['pass'] : '';

        $queryAsk = '"SELECT * FROM `użytkownicy` WHERE `Nick`="$nickname" AND `Hasło`="$password2"';

        if($Result =@$connected->query($queryAsk)){

            $many_users = $Result->num_rows;
            if($many_users>0){

            }
        }
        

        mysqli_close($connected);

       }
       */

        
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="src/style/style.css" type="text/css">
</head>

<body>
    <!-- Tutaj zaczyna sie sekcja UI dla usera na X > max-table -->
    <section class="UI">
        <article id="user" class="col-12">
            <article>
                <section>
                    <button class="btn btn-info mt-3" id="login"> <i class="fas fa-users"></i> Zaloguj się</button>
                    <a class="btn btn-primary mt-3" href="../frontEnd/podstrony/rejestracja.php" target="blank"> <i
                            class="fas fa-user-plus"></i> Zarejestruj się</a>
                    <section class="loguj my-3">
                        <form class="form-group" method="POST">
                            <input type="text" class="form-control" name='nick' placeholder="Nazwa użytkownika...">
                            <input type="password" class="form-control" name='pass' placeholder="Hasło...">
                            <button class="btn btn-success" type="submit">Zaloguj</button>
                        </form>
                    </section>
                </section>
                <button class="btn btn-success mt-3 menu" type="button"> <i class="fas fa-sliders-h"></i> Menu</button>
            </article>
            <form class="form-group col-12" method="GET">
                <hr>
                <input type="text" class="form-control" id="search" name='search' placeholder="Szukaj...">
                <button class="btn btn-success my-3" type="submit"> <i class="fas fa-search"></i> Szukaj</button>
            </form>
        </article>
    </section>
    <!-- Tutaj konczy sie ta sekcja-->

    <!-- Tutaj zaczyna sie sekcja UI dla usera dla userow X < max-tablet -->
    <nav class="navbar navbar-dark bg-dark fixed-top d-lg-none">
        <button class="navbar-toggler" type="button" data-toggle='collapse' data-target='.menu'
            aria-labelledby="menu"><span class="navbar-toggler-icon"></span> Menu</button>

        <section class="collapse navbar-collapse menu">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="../frontEnd/podstrony/rejestracja.php" target="blank"> <i
                            class="fas fa-user-plus"></i> Zarejestruj się</a></li>
            </ul>
            <hr>
            <form class="form-inline">
                <input type="text" placeholder="Nazwa użytkownika..." name='nick' class="form-control">
                <input type="password" placeholder="Hasło..." name='pass' class="form-control my-2 mx-md-2">
                <button class="btn btn-success" type="submit">Zaloguj się</button>
            </form>
            <hr>
            <form class="form-inline mt-3">
                <input type="text" class="form-control" name='search' placeholder="Szukaj...">
                <button class="btn btn-success my-3 mx-md-2" type="submit"> <i class="fas fa-search"></i>
                    Szukaj</button>
            </form>
        </section>
    </nav>
    <!-- Tutaj sie konczy-->


    <!-- 
        Tutaj bedzie sekcja na posty wyswietlane za pomoca Reacta 
    -->

    <!-- Stopka -->
    <footer>
        <p>Page made by Sebastian Siarczyński and Kamil Kopik</p>
        <p>All right reserverd <i class="fas fa-copyright"></i></p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <script src="js.js" type="text/javascript"></script>
</body>

</html>