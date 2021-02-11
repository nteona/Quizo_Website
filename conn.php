<?php
    $conn = new mysqli("localhost", "root", "", "coursework2_DB");
    
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();

?>