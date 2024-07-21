<?php
session_start();
include 'db_conn.php'; // Assuming you have a db_conn.php for database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Update payment status in the courseregister table
    $sql = "UPDATE courseregistrations SET payment = 'Confirmed' WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        // Redirect to next page immediately after updating the payment status
        header("Location: ../admin/confirmpayment.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
