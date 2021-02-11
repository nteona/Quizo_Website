<?php
  require('conn.php');
if (!isset($_SESSION["email"])){
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
    .btn {
        position: absolute;
        border: #111;
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
    #box {
        background-color: white; 
        padding: 50px;
        border: 1px grey;
        width: 50%;
        margin: 0 auto;
        height:100%;
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
</style>
</head>
<body>
<ul>
  <li style="float:right"><a href="login.php">Log out</a></li> 
  <img style="float:left" src="quizologo.png" style="vertical-align:middle" alt="logo" width="150" height="50">
  <li style="float:left"><a href="teacher_page.php">Quizzes</a></li>
</ul>
<div class="bg">
<img src="quizologo.png"  alt="logo" class="center" width="200" height="150">
</div>
<p></p>
<h2 align ="center" class="font-weight-bold" > Name:
<?php 
  $quiz_id = $_GET['quiz_id'];
$sql5 = "SELECT quiz_name FROM quiz WHERE quiz_id = $quiz_id";
$result5 = $conn->query($sql5);
$quiz_name = mysqli_fetch_assoc($result5);
echo $quiz_name['quiz_name'];
?>  

</h2>
<p align="center" >Students, please answer the questions. Good luck!</p>

<!-- container 1 --->
<div id="box"class="container">
<?php
echo "<form class='p-3' method='post' action='submit_quiz.php?quiz_id=$quiz_id'> ";
  $sql = "SELECT question, q_number FROM questions WHERE quiz_id = $quiz_id";
  $result = $conn->query($sql);

  while($questions = mysqli_fetch_assoc($result)){
    $query = "SELECT answer FROM answers WHERE quiz_id = $quiz_id AND q_number = $questions[q_number] ";
    $result1 = $conn ->query($query);
    echo '<p> </p>';
    echo '<dt>Question ' .$questions['q_number'].'</dt>' .$questions['question'].'</dd>';

    while($answers = mysqli_fetch_assoc($result1)){
      echo '<div class="radio">
      <label><input type="radio" name="question['.$questions['q_number'].']" value="'.$answers['answer'].'">' ,'&nbsp;'.$answers['answer'].'</label>
      </div>';

    }
  }
  //echo '</div>';
  //$start = "start_quiz.php?quiz_id=$row[quiz_id]";
 


?>

<p></p>
<td><input type="submit" role="button" type="btn" class="btn btn-success btn-sm">Submit</input></td>
</div> 
</form>

</body>
</html>
