<?php
session_start();
include 'db_conn.php';

header('Content-Type: application/json');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    
    $stmt = $conn->prepare("SELECT payment, course_status FROM courseregistrations WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($payment, $course_status);
    $stmt->fetch();
    $stmt->close();
    
    if ($payment === 'Confirmed' && $course_status === 'Ongoing') {
        echo json_encode(['status' => 'confirmed']);
    } else {
        echo json_encode(['status' => 'not_confirmed']);
    }
} else {
    echo json_encode(['status' => 'not_logged_in']);
}

$conn->close();
?>
