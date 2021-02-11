<?php
  require('conn.php');
if (!isset($_SESSION["email"]) || $_SESSION["student"] ){
  header("Location: logout.php");
   die();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
      body {
        font-family: Georgia, serif;
        background-color: #EAEAEA;
      }
      /* Set a style for the submit button */
      .content {
        position:fixed;
        margin-left: 20%;
      }
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        padding-bottom: 5px;
        background-color: black;
    }
      li {
        float: left;
      }
      li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      li a:hover:not(.active) {
        background-color: #111;
      }
      .active {
        background-color: #0B173B;
      }
      .table {
        box-shadow: 5px 5px 5px 3px rgba(0, 0, 0, 0.2);
        padding: 15px;
        background-color: #e3f1ff;
        border-radius: 10px;
        width: 80%;
        margin: 0px auto;
        float: none;
        text-align:center;
      }
      .bg {
        background-image: url("pic.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 120px;
        width: 100%;
        left: 0;
    }
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 20%;
      height: 60%;
    }
    #box {
        background-color: white;
        padding: 65px;
        border: 1px grey;
        width: 80%;
        margin: 0 auto;
        height:100%;
        box-shadow: 6px 6px 6px 7px rgba(0, 0, 0, 0.4);
        margin-bottom: 30px;
    }
    .content {
      width: 100%;
      left: 50%;
      position:absolute;
    }
</style>
</head>
<body>
<ul>
  <li style="float:right"><a href="login.php">Log out</a></li> 
  <img style="float:left" src="quizologo.png" style="vertical-align:middle" alt="logo" width="150" height="50">
  <li style="float:left"><a href="teacher_page.php">Quizzes</a></li>
  <li style="float:left"><a href="add_quiz.php">New Quiz</a></li> 
</ul>
<div class="bg">
<img src="quizologo.png"  alt="logo" class="center" width="200" height="150">
</div>
<div id="box"class="container">
  <h2 align="center">All Quizzess </h2>
<p align="center">You can see the quizzes you make in this table. If the quiz is available
  then your studnets can take that quiz. You can also delte quizzes with the Delete button, edit quizzes 
with the Edit button, start your quizzes to see if everything is to your desire. And finally 
with the Add Quiz, you go to another page where you design your quizzes. </p>
<table class="table table-bordered table-light table-striped ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Quiz</th>
      <th scope="col">Available</th>
      <th scope="col">Quiz Name</th>
      <th scope="col">Author</th>
      <th scope="col">Duration</th>
      <th scope="col">Date of attempt</th>
      <th scope="col">Score in %</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  </div>
  <?php
$userid = $_SESSION['id'];
$sql = "SELECT quiz.*, attempt.date_attempt, attempt.score FROM quiz LEFT JOIN attempt ON attempt.quiz_id = quiz.quiz_id AND attempt.ID = $userid";
  $result = $conn->query($sql);
 

  // $student = $data["student"];
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
      $delete = "delete_quiz.php?quiz_id=$row[quiz_id]";
      echo'<tr>'; // printing table row
      echo '<td>'. $row["quiz_id"]. 
      "</td><td>" . $row["quiz_available"].
      "</td><td>" . $row["quiz_name"].
      "</td><td>" . $row["quiz_author"].
      "</td><td>" . $row["quiz_duration"].
      "</td><td>" . $row["date_attempt"].
      "</td><td>" . $row["score"].
      '</td>';

      if (isset($row["score"])) {
        $message = $row["score"] < 40 ? "Failed" : "Passed";
        $score = round($row["score"]);
        echo "<td>$message ($score)</td>";
      } else if ($row["quiz_available"] == 1) {
        $start = "start_quiz.php?quiz_id=$row[quiz_id]";
        $availableButton = '<td><a role="button"  href=" '.$start.' " name="start" type="btn" class="btn btn-success btn-sm">Start</a></td>';
        echo $availableButton;
    } else {
        $availableButton = "<td>Not available</td>";
        echo $availableButton;
    }
      $edit = "edit_quiz.php?quiz_id=$row[quiz_id]";
      echo '<td><a role="button" href=" '.$delete.' " type="btn" class="btn btn-danger btn-sm">Delete</a></td>';
      echo '<td><a role="button" href=" '.$edit.' " type="btn" class="btn btn-warning btn-sm">Edit</a></td>';
      
    }
    echo'</tr>';
    echo "</table>";
  }else {
    echo "0 results";
  }
  $conn->close();
  ?>

</table>
<p></p>
<div class="content">
  <a href='add_quiz.php'><button type="button" class="btn btn-info btn-sm">Add Quiz</button></a>
</div>
</div>
</body>
</html>
