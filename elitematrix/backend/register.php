<?php
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['first-name'];
  $lastName = $_POST['last-name'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $qualification = $_POST['qualification'];
  $institute = $_POST['institute'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  // Check if the user already exists
  $checkStmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
  $checkStmt->bind_param("s", $email);
  $checkStmt->execute();
  $checkStmt->store_result();

  if ($checkStmt->num_rows > 0) {
    // User already exists
    header("Location: ../authentication/signup.php?error=1");
    exit();
  }

  $checkStmt->close();

  // Insert new user
  $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, dob, gender, phone, qualification, institute, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssss", $firstname, $lastName, $dob, $gender, $phone, $qualification, $institute, $email, $password);

  if ($stmt->execute()) {
    header("Location: ../authentication/signup.php?success=1");
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
