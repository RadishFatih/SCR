<?php session_start(); ?>
<?php include 'database.php'; ?>

<?php
    $wynik=$_SESSION['score'];
    $IDuzytkownika=$_SESSION['uzytkownikID'];

    $query = "SELECT * FROM uzytkownicy WHERE ID LIKE '$IDuzytkownika'";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $aktualnyUzytkownik=$results->fetch_assoc();
    if(($aktualnyUzytkownik['topwynik'])<$wynik){
        $query = "UPDATE uzytkownicy
        SET topwynik='$wynik'
        WHERE ID=$IDuzytkownika";
        $sql = $mysqli->query($query) or die($mysqli->error.__LINE__);
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8"/>
    <title>Quizz o motylkach</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>
    <header>
        <div class="container">
            <h1>Quiz o motylach</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Odpowiedziałeś na wszystkie pytania, o to twój wynik:</h2>
            <p> Twój wynik: <?php echo $_SESSION['score'];?> </p>
            <?php $_SESSION['score']=0; ?>
            <a href="test.php" class="start">Spróbuj jeszcze raz</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2020, Quiz motylkowy
        </div>
    </footer>
</body>