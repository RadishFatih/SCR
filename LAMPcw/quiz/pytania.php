<?php include 'database.php'; ?>
<?php
    $number = (int) $_GET['n'];
    $query = "SELECT * 
              FROM pytania
              WHERE numer_pytania=$number";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc(); 

    $query = "SELECT * 
              FROM wybory
              WHERE question_number=$number";
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $query = "SELECT * FROM `pytania`";
    $results =  $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
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
            <div class="current">Pytanie <?php echo $question['numer_pytania']; ?> z <?php echo $total;?></div>
            <p class="question">
                <?php echo $question['tresc']; ?>
            </p>
            <form method="post" action="process.php">
                <ul class="choices">
                    <?php while($row = $choices->fetch_assoc()): ?>
                    <li><input name="choice" type="radio" value=<?php echo $row['id'];?>/><?php echo $row['tresc'];?></li>
                    <?php endwhile;?>
                </ul>
                <input type="submit" value="Potwierdź"/>
                <input type="hidden" name="number" value="<?php echo $number; ?>" />
            </form>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2020, Quiz motylkowy
        </div>
    </footer>
</body>