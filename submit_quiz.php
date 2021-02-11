<?php 
require 'conn.php';

$quiz_id = $_GET['quiz_id'];
$questions = $_POST['question'];
$correct = 0;
$all_questions = 0;

var_dump($_POST);

foreach ($questions as $question_number=>$user_answer) {
    if($sql_answ = $conn->query("SELECT * FROM answers WHERE q_number = $question_number AND quiz_id = $quiz_id")){
        while ($row = $sql_answ->fetch_assoc()){
            if ($row["answer"] == $user_answer && $row["is_correct_ans"]) {
                $correct++;
            }
        }
    }
    $sql_answ->close();
    $all_questions ++;
}

// get number of questions for quiz
if($sql_answ = $conn->query("SELECT COUNT(*) FROM questions WHERE quiz_id = $quiz_id")){
    $number_of_questions = $sql_answ->fetch_assoc()["COUNT(*)"];
} else {
    die("something went wrong");
}

$user_id = $_SESSION["id"];
$score = ($correct / $number_of_questions) * 100;
$query = "INSERT INTO attempt (ID, quiz_id, score) VALUES ($user_id, $quiz_id, $score)";

if ($sql_answ = $conn->query("INSERT INTO attempt (ID, quiz_id, score) VALUES ($user_id, $quiz_id, $score)")) {
    header('Location: ' . ($_SESSION["student"] ? './student_page.php' : './teacher_page.php'));
} else {
    die("could not save answer in table");
}

?>