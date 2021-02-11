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
  <li style="float:left"><a href="add_quiz.php">New Quiz</a></li> 
</ul>
<div class="bg">
<img src="quizologo.png"  alt="logo" class="center" width="200" height="150">
</div>
<p></p>
<h2 align ="center" class="font-weight-bold" > Adding A New Quiz</h2>
<p align="center" >Enter the required information like name, author, duration, questions and answers, and you get a new quiz. </p>

<!-- container 1 --->
<form action="add.php" method="POST">
<div id="box"class="container">

    <div class="form-group">
        <label class="font-weight-bold" for="inputsm">Quiz Name</label>
        <input type="quizname" class="form-control" id="inputsm" aria-describedby="quiznameHelp" placeholder="Enter quiz name"  name="quiz_name" required>
    </div>
    <div class="form-group">
        <label class="font-weight-bold" >Author</label>
        <input type="author" class="form-control"  placeholder="Enter author"  name="quiz_author" required>
    </div>
    <div class="form-group">
        <label class="font-weight-bold" for="inputsm" >Duration</label>
        <input type="duration" class="form-control" id="inputsm" aria-describedby="durationHelp" placeholder="Enter duration in min"  name="quiz_duration" required>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="quiz_available" >
        <label  class="form-check-label font-italic" for="exampleCheck1" >Availability </label>
    </div>

</div>
<p></p>
<!-- container 2 --->
<div id="box"class="container2">
    <div class="form-group" id="all_questions"><div id="q1">
            <dt>Question 1:</dt>
            <small class="text-muted">Display the question you want to ask your students here.</small>
            <textarea class="form-control" name="question[]" placeholder="Enter your question here" id="quest1" rows="3"></textarea>
            <dt>Answer choices:</dt>
            <small class="text-muted">Choose the correct answer by selecting it. 
                    The choices are displayed in the same order as they were written here.</small>
            <div id="all_choices1"><div class="form-check">
                <input class="form-check-input" type="radio" value = "0" name ="correct[0]" id="flexRadioDefault1" required>
                <input type="text" class="form-control" name="choices[0][0]" aria-label="Text input with radio button" required>
            </div></div>
            <p></p>
            <button type="button" onclick=addAnswer('1') class="btn btn-dark btn-sm active">Add Answer</button>
            <br>
            <br>
            <button type="button" onclick=removeAnswer('1')  class="btn btn-dark btn-sm active">Remove Answer</button>
            <br>
            <br>
            <button type="button" onclick="addQuestion()" class="btn btn-dark btn-sm">Add new Question</button>
            <br>
            <br>
            <button type="button" onclick="removeQuestion()" class="btn btn-dark btn-sm">Remove Question</button>
            <br>
            <br>    
            </div></div>
    </div>
    <div align ="center"> 
    <input type="submit" class="btn btn-success btn-sm"></input>
    </div>
    </form>
    <script>

        function addQuestion() { 
            var previndex = document.getElementById("all_questions").childNodes.length;
            var index = previndex + 1;
            var getid = "q" + (previndex).toString();
            console.log(getid);
            document.getElementById(getid).insertAdjacentHTML("afterend", `<div id="q${index}">
            <dt>Question ${index}:</dt>
            <small class="text-muted">Display the question you want to ask your students here.</small>
            <textarea class="form-control" name="question[]" placeholder="Enter your question here" id="quest${index}" rows="3"></textarea>
            <dt>Answer choices:</dt>
            <small class="text-muted">Choose the correct answer by selecting it. 
                    The choices are displayed in the same order as they were written here.</small>
            <div id="all_choices${index}"><div class="form-check">
                <input class="form-check-input" type="radio" value = "0"name="correct[${index-1}]" id="flexRadioDefault1">
                <input type="text" class="form-control" name="choices[${index-1}][0]" aria-label="Text input with radio button">
            </div></div>
            <p></p>
            <button type="button" onclick=addAnswer('${index}') class="btn btn-dark btn-sm active">Add Answer</button>
            <br>
            <br>
            <button type="button" onclick=removeAnswer('${index}')  class="btn btn-dark btn-sm active">Remove Answer</button>
            <br>
            <br>
            <button type="button" onclick="addQuestion()" class="btn btn-dark btn-sm">Add new Question</button>
            <br>
            <br>
            <button type="button" onclick="removeQuestion()" class="btn btn-dark btn-sm">Remove Question</button>   
            <br>
            <br>
            </div>`)
        }

        function removeQuestion() {
            var lastQuestion = document.getElementById("all_questions").childNodes.length - 1;
            if(lastQuestion > 0){
                document.getElementById("all_questions").removeChild(document.getElementById("all_questions").childNodes[lastQuestion]);
            }
        }

        function addAnswer(qindex){
            console.log(qindex);
            var previndex =  document.getElementById("all_choices" + qindex).childNodes.length;
            var newindex = previndex + 1;
            console.log(qindex);
            document.getElementById("all_choices" + qindex).childNodes[previndex - 1].insertAdjacentHTML("afterend",`<div class="form-check">
                <input class="form-check-input" type="radio" value="${newindex-1}" name = "correct[${qindex-1}]" id="flexRadioDefault1">
                <input type="text" class="form-control" name = "choices[${qindex-1}][${newindex-1}]" aria-label="Text input with radio button">
            </div>`);
            console.log(qindex);
        }

        function removeAnswer(qindex){
            var lastChoice = document.getElementById("all_choices" + qindex).childNodes.length - 1;
            if(lastChoice > 0){
                document.getElementById("all_choices"+qindex).removeChild(document.getElementById("all_choices" + qindex).childNodes[lastChoice]);
            }
        }
    </script>
</body>
</html>
