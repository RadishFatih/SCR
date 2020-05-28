<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }
    
    if($_POST){
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'][0];
        $next = $number+1;


        $query = "SELECT * FROM `pytania`";
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows;


        $query = "SELECT * FROM `wybory`
                    WHERE question_number= $number AND dobra_odopwiedz = 1 ";
        
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $row = $result->fetch_assoc();
        $correct_choice = $row['id'];
        if($correct_choice==$selected_choice){
            $_SESSION['score']++;
    
        }
        if($number == $total){
            header("Location: final.php");
            exit();
        } else{
            header("Location: pytania.php?n=".$next);
        }
    }
?>