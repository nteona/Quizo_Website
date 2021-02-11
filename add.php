<?php 
require 'conn.php';
//print_r($_POST);

// print_r($_POST['question']);
// print_r($_POST['choices']);
// print_r($_POST['correct']);
$quiz_name = $_POST["quiz_name"];
$quiz_author = $_POST["quiz_author"];
$quiz_duration = $_POST["quiz_duration"];
$quiz_available = isset($_POST['quiz_available']);

if(!empty($_POST["quiz_available"])){
    $quiz_available = 1;
    }else{$quiz_available = 0;}

$query = "INSERT INTO `quiz` ( quiz_name, quiz_author, quiz_available, quiz_duration) 
            VALUES ('$quiz_name', '$quiz_author', '$quiz_available', '$quiz_duration')";
$state = $conn->prepare($query);
//echo '<script>alert("Submission Successful")</script>';

$question = $_POST['question'];
$choices = $_POST['choices'];
$correct = $_POST['correct'];


if($state->execute()){
    $quiz_id = $conn->insert_id;
    for($each = 0; $each < count($question); $each++){
        $queryQuest = "INSERT INTO questions (q_number, quiz_id, question) VALUES (?, ?, ?)";
        $state = $conn->prepare($queryQuest);
        $nextq = $question[$each];
        $nextno = $each +1;
        $state->bind_param('sss', $nextno, $quiz_id, $nextq);
        if($state->execute()){
            for($i = 0; $i < count($choices[$each]); $i++){
                $query2 = "INSERT INTO answers (answer, q_number, quiz_id, is_correct_ans ) VALUES (?, ?, ?, ?)";
                $state = $conn->prepare($query2);
                $correct_ans = ($i == $correct[$each]);
                $choice = $choices[$each][$i];
                $state->bind_param('ssss', $choice, $nextno, $quiz_id, $correct_ans);
                $state->execute();

            }
        }else{
         //print_r(mysqli_error($queryQuest));
        }
    }
    header("Location: teacher_page.php");

} else{
    echo '<script>alert("Quiz not added. Failed. Try again")</script>';
    //header("Location: teacher_page.php");

}

?>