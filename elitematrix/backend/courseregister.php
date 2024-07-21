<?php
session_start();
include 'db_conn.php'; // Assuming you have a db_conn.php for database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $school = $_POST['school'];
    $course_name = $_POST['course_name'];

    // Check if the user is already registered for the course
    $check_sql = "SELECT * FROM courseregistrations WHERE email = ? ";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // User already registered for the course
        echo "
        <html>
        <head>
            <title>Already Registered</title>
            <meta http-equiv='refresh' content='2;url=../user/index.php' />
            <style>
                body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
                .message { font-size: 20px; color: red; }
            </style>
        </head>
        <body>
            <div class='message'>You have already registered for the course!! redirecting to course page....</div>
        </body>
        </html>";

       
    } else {
        // Proceed with the registration
        $sql = "INSERT INTO courseregistrations (first_name, last_name, phone, email, school, course_name) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $first_name, $last_name, $phone, $email, $school, $course_name);

        if ($stmt->execute()) {
            echo "
            <html>
            <head>
                <title>Registration Successful</title>
                <meta http-equiv='refresh' content='5;url=nextpage.php' />
                <style>
                    body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
                    .message { font-size: 20px; color: green; }
                </style>
            </head>
            <body>
                <div class='message'>Registration successful! You will be redirected to the Payment page in 5 seconds.</div>
                <script>
                    setTimeout(function(){
                        window.location.href = '../user/payment-verify.html';
                    }, 5000);
                </script>
            </body>
            </html>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>
