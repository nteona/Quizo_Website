<?php
require('conn.php');
if (!empty($_POST)){
  $email = $_POST['email'];
  $pass =$_POST['pass'];
  $s = "select * from user where email = '$email'";
  $result = mysqli_query($conn, $s);
  $num = mysqli_num_rows($result);
  $data = $result->fetch_assoc();
  $student = $data["student"];

  if(password_verify($pass, $data["password"])){
    $_SESSION["email"] = $data['email'];
    $_SESSION["student"] = $data['student'];
    $_SESSION["id"] = $data['ID'];
    if($student == 1){
      header('Location: student_page.php');
    }else{
      header('Location: teacher_page.php');
    }
  }else{
    echo '<script>alert("Wrong credentials! Try Again")</script>';
  }
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
    }
      
      .label {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      /* Add styles to the form container */
      .card {
        box-shadow: 5px 5px 5px 3px rgba(0, 0, 0, 0.2);
        border-radius: 25px;
        border: 0px;
        margin-bottom: 15px;
      /* prevent shadow being cut off */
      }
      /* Full-width input fields */
      input[type=text],
      input[type=password] {
        padding: 15px !important;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        border-radius: 10px;
      }
      input[type=text]:focus,
      input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        border-radius: 10px;
      }
      /* Set a style for the submit button */
      .btn {
        background-color: #0B173B;
        border-radius: 15px;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        color: #fff;
        margin-bottom: 10px;
      }
      .heading {
        border-left: 6px;
        text-align: center;
        font-weight: bold;
        font-size: 50px;
      }
      .btn:hover {
        opacity: 1;
      }
      span.psw {
        float: left;
        padding: 10px;
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
    ul {
      list-style-type: none;
        margin: 0;
        padding: 0;
        padding-bottom: 5px;
        overflow: hidden;
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
    <div class="row">
      <div class="col"></div>
      <div class="col-12 col-sm-6 col-md-4">
        <div class="card">
          <form action="" method="post">
            <div class="card-body">
              <h1 class="heading">Login</h1>
              <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input class="form-control" type="text" placeholder="Enter Email" name="email" required>
              </div>
              <div class="form-group">
                <label for="psw"><b>Password</b></label>
                <input class="form-control" type="password" placeholder="Enter Password" name="pass" required>
              </div>
              <button type="submit" class="btn">Login</button>
              <p class="psw"> Need an account? <a href="register.php"> Register here</a></p>
            </div>
          </form>
        </div>
      </div>
      <div class="col"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  </body>
</html>
