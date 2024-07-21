<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Prepare statement to select user data
  $stmt = $conn->prepare("SELECT first_name, last_name, dob, gender, phone, qualification, institute, email, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($first_name, $last_name, $dob, $gender, $phone, $qualification, $institute, $email, $hashed_password);

  if ($stmt->num_rows > 0) {
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $hashed_password)) {
      // Store user information in the session
      $_SESSION['email'] = $email;
      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['dob'] = $dob;
      $_SESSION['gender'] = $gender;
      $_SESSION['phone'] = $phone;
      $_SESSION['qualification'] = $qualification;
      $_SESSION['institute'] = $institute;

      // Fetch course registration data
      $stmt = $conn->prepare("SELECT course_name, payment, course_status FROM courseregistrations WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($course_name, $payment, $course_status);

      if ($stmt->num_rows > 0) {
        $stmt->fetch();
        // Store course registration data in the session
        $_SESSION['course_name'] = $course_name;
        $_SESSION['payment'] = $payment;
        $_SESSION['course_status'] = $course_status;
      } else {
        // Set default values for course registration data
        $_SESSION['course_name'] = '';
        $_SESSION['payment'] = '';
        $_SESSION['course_status'] = '';
      }

      // Redirect to the dashboard
      header("Location: ../user/index.php");
      exit();
    } else {
      header("Location: ../authentication/signin.php?error=1");
      exit();
    }
  } else {
    header("Location: ../authentication/signin.php?error=1");
    exit();
  }

  $stmt->close();
  $conn->close();
}
?>