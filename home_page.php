<?php

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
    }
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        padding-bottom: 5px;
        background-color: black;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
    }
    li a:hover:not(.active) {
        background-color: #111;
    }
    .active {
        background-color: #0B173B;
    }
    #box {
        background-color: white;
        padding: 65px;
        border: 1px grey;
        width: 60%;
        margin: 0 auto;
        height:100%;
        box-shadow: 6px 6px 6px 7px rgba(0, 0, 0, 0.4);
        margin-bottom: 30px;
    }
    .bg {
        background-image: url("pic.jpg");
        height: 100%; 
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 100%;
        min-width: 1024px;
        width: 100%;
        height: auto;
        position: fixed;
        left: 0;
    }
    .center {
  display: block;
margin-top: 0.1px;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
  height: 15%;
}

</style>
</head>
<body>
<ul>
  <li style="float:right"><a href="login.php">Log in</a></li> 
  <li style="float:right"><a href="register.php">Register</a></li>
  <img style="float:left" src="quizologo.png" style="vertical-align:middle" alt="logo" width="150" height="50">
 <li style="float:left"><a href="home_page.php">Home</a></li>
</ul>
<div class="bg">
<h1>
<p style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px; border-color: black;"></p>  
</h1>
<!---<div class= "image" style="background-image: url('pic.jpg');
  background-size: cover; height:300px; padding-top:200px;">--->

<!-- container 1 --->
<div id="box"class="container">
<h2 align ="center" class="font-weight-bold" > Welcome to <img src="quizologo.png" style="vertical-align:middle" alt="logo" width="250" height="100">
</h2>
<br>
<!--<img src="exam.jpg" style=" float: cenvertical-align:middle" alt="Quiz" width="200" height="150" class="center">-->

<p align="center">Dear teachers, on this website you can create quizzes for your students.
    You can also edit those quizzes and delete them. The questions are formed in the new 
quiz section, you write your question and the answer choices, for the right answer you need to check the answer. </p>
</div>
<h1>
<p style="margin-left: 5em;padding: 0 10em 2em 0;border-width: 2px; border-color: black;"></p>  
</h1>
</div>

</body>
</html>
