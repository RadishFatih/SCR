<?php include 'database.php';?>
<?php
    if(isset($_POST['submit'])){
        $question_number= $_POST['question_number'];
        $question_text= $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];
        $choices= array();
        $choices[1]=$_POST['choice1'];
        $choices[2]=$_POST['choice2'];
        $choices[3]=$_POST['choice3'];
        $choices[4]=$_POST['choice4'];

        $query = "INSERT INTO `pytania`(numer_pytania,tresc)
                    VALUES('$question_number','$question_text')";
        $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);
        if($insert_row){
            foreach($choices as $choice=>$value){
                if($value != ''){
                    if($correct_choice == $choice){
                        $is_correct=1;
                    }else{
                        $is_correct=0;
                    }
                    $query="INSERT INTO `wybory`(question_number,dobra_odopwiedz,tresc)
                                VALUES ('$question_number','$is_correct','$value')";
                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    if($insert_row){
                        continue;
                    }else{
                        die('Error : ('.$mysqli->errno . ')'.$mysqli->error);
                    }
                }
            }
            $mag = 'Pytanie zostało dodane';
        }

    }

    $query = "SELECT * FROM `pytania`";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    $next = $total+1
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
            <h1>Quiz o motylach</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Dodaj pytanie</h2>
            <?php
                if(isset($mag)){
                    echo '<p>'.$mag.'</p>';
                }
            ?>
            <form method="post" action="dodaj.php">
                <p>
                    <label>Numer pytania</label>
                    <input type="question_number" value="<?php echo $next;?>" name="question_number"/>
                </p>
                <p>
                    <label>Pytanie:</label>
                    <input type="text" name="question_text"/>
                </p>
                <p>
                    <label>Odpowiedź nr 1:</label>
                    <input type="text" name="choice1"/>
                </p>
                <p>
                    <label>Odpowiedź nr 2:</label>
                    <input type="text" name="choice2"/>
                </p>
                <p>
                    <label>Odpowiedź nr 3:</label>
                    <input type="text" name="choice3"/>
                </p>
                <p>
                    <label>Odpowiedź nr 4:</label>
                    <input type="text" name="choice4"/>
                </p>
                <p>
                    <label>Numer właściwej odpowiedzi:</label>
                    <input type="text" name="correct_choice"/>
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