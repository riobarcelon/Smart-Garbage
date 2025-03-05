<?php
// Database connection
$servername = "localhost"; // Change if necessary
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "smart-garbage"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO trash (recyclable, organic, non_recyclable, hazardous) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $recyclable, $organic, $non_recyclable, $hazardous);

// Set parameters and execute
$recyclable = $_POST['recyclable'];
$organic = $_POST['organic'];
$non_recyclable = $_POST['non_recyclable'];
$hazardous = $_POST['hazardous'];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
