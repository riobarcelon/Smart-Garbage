<?php
// signup.php

// Database credentials
$servername = "localhost"; // o ang iyong server name
$username = "root"; // palitan ng iyong database username
$password = ""; // palitan ng iyong database password
$dbname = "smart-garbage"; // pangalan ng database

// Lumikha ng koneksyon
$conn = new mysqli($servername, $username, $password, $dbname);

// Suriin ang koneksyon
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kunin ang data mula sa form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$usrname = $_POST['usrname'];
$pass = $_POST['pass'];
$confirmpass = $_POST['confirmpass'];

// Suriin kung ang password at confirm password ay magkapareho
if ($pass !== $confirmpass) {
    die("Passwords do not match.");
}

// I-insert ang data sa database
$sql = "INSERT INTO signup (fname, lname, usrname, pass, confirmpass) VALUES ('$fname', '$lname', '$usrname', '$pass', '$confirmpass')";


if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully'); 
    setTimeout(function() { window.location.href = 'index.html'; }, 1000);</script>";
    exit();
} else {
    echo "<script>alert('Error: " . $sql . "');</script>";
}
// Isara ang koneksyon
$conn->close();
?>