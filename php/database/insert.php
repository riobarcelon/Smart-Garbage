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

include 'waste_management.php'; // Include the new waste management functions

// Prepare and bind
$wasteArray = [$recyclable, $organic, $non_recyclable, $hazardous]; // Create an array of waste types
$sortedWaste = sortWasteTypes($wasteArray); // Sort the waste types
$totalWaste = array_sum($sortedWaste); // Calculate total waste
$recyclingRate = calculateRecyclingRate($totalWaste, $sortedWaste['recyclable']); // Calculate recycling rate

$stmt = $conn->prepare("INSERT INTO trash (recyclable, organic, non_recyclable, hazardous) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $recyclable, $organic, $non_recyclable, $hazardous);

// Set parameters and execute
$recyclable = $_POST['recyclable'];
$organic = $_POST['organic'];
$non_recyclable = $_POST['non_recyclable'];
$hazardous = $_POST['hazardous'];

if ($stmt->execute()) {
    echo "New record created successfully. Recycling Rate: " . $recyclingRate . "%"; // Display recycling rate

    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
