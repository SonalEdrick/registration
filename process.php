<?php
header('Content-Type: application/json');

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Set status code to 405
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit();
}

// Database credentials
$host = 'localhost';
$db = 'registration_form';
$user = 'root';
$pass = '';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Process form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);

$sql = "INSERT INTO registrations (name, email, phone) VALUES ('$name', '$email', '$phone')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Data saved successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
}

$conn->close();
?>
