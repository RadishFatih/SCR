<?php include 'database.php'; ?>
<?php session_start(); ?>

<?php
    $query = "SELECT * FROM `pytania`";
    $results =  $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    $zalogowany = $_SESSION['uzytkownikID'];
    $query = "SELECT * 
    FROM `uzytkownicy`
    WHERE ID=$zalogowany";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $topwynik = $result->fetch_assoc();
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
            <h1>Witaj <?php echo $topwynik['imie'];?> o to Quiz o motylach</h1>
            <h2>Twoj najwyższy wynik to <?php echo $topwynik['topwynik'];?>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Sprawdzę twoją wiedzę o motylach!</h2>
            <h3>Jest to test wielokrotnego wyboru sprawdzający twoją wiedzę, o motylkach, postaraj się odpowiedzieć, najlepiej jak potrafisz!</h3>
            <ul>
                <li><strong>Ilość pytań:</strong><?php echo $total?></li>
                <li><strong>Ilość odpowiedzi:</strong>4</li>
                <li><strong>Szacowany czas quizu:</strong><?php echo $total * 0.5?> minuty</li>
            </ul>
            <a href="pytania.php?n=1" class="start">Zacznijmy test!</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2020, Quiz motylkowy
        </div>
    </footer>
</body>