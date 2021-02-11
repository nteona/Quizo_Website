<?php
require 'conn.php';
$quiz_id = $_GET["quiz_id"];

$query = $conn->prepare('DELETE FROM `attempt` WHERE quiz_id = ?');
$query->bind_param('s', $quiz_id);
if ($query->execute()) {
    $query = $conn->prepare('DELETE FROM `answers` WHERE quiz_id = ?');
    $query->bind_param('s', $quiz_id);
    if($query->execute()){
        $query1 = $conn->prepare('DELETE FROM `questions` WHERE quiz_id = ?');
        $query1->bind_param('s', $quiz_id);
        if($query1->execute()){
            $query2 = $conn->prepare('DELETE FROM `quiz` WHERE quiz_id = ?');
            $query2->bind_param('s', $quiz_id);
            if($query2->execute()){
                header("Location: teacher_page.php");
            }
        }
    }
}
?>
