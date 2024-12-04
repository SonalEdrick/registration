<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);

  echo json_encode([
    'success' => true,
    'name' => $name,
    'email' => $email,
    'phone' => $phone
  ]);
  exit();
}

echo json_encode(['success' => false, 'message' => 'Invalid request']);
?>
