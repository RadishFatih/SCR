<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
    if(!isset($_SESSION['uzytkownik'])){
    $_SESSION['uzytkownikID'] = 0;
    }

    $query = "SELECT * FROM `uzytkownicy`";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    $ID = $total+1;


    if(isset($_POST['submit'])){
    $nazwa_uzytkownika= $_POST['nazwa_uzytkownika'];
    $query = "SELECT * FROM uzytkownicy WHERE imie LIKE '$nazwa_uzytkownika'";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $aktualnyUzytkownik=$results->fetch_assoc();
    if($results->num_rows>0){
       $_SESSION['uzytkownikID']=$aktualnyUzytkownik['ID'];

    }else{
    $query = "INSERT INTO `uzytkownicy`(imie,ID)
                    VALUES('$nazwa_uzytkownika','$ID')";
    $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);
    $_SESSION['uzytkownikID']=$ID;
    }

    
    header("Location: test.php");
}
    
    
   
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf=8"/>
    <title>Quizz o motylkach</title>
    <link rel="stylesheet"href="css/style.css" type="text/css"/>
</head>

<body>
    <header>
        <div class="container">
            <h1>Quiz o motylach, Wybierz użytkownika</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <form method="post" >
                <p>
                    <label>Podaj nazwę użytkownika</label>
                    <input type=text  name="nazwa_uzytkownika"/>
                </p>
                
                <p>
                    <input type="submit" name="submit" value="Potwierdź"/>
                </p>
            </form>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2020, Quiz motylkowy
        </div>
    </footer>
</body>