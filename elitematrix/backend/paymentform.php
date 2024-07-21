<?php
session_start();
include 'db_conn.php'; // Assuming you have a db_conn.php for database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $accountHolder = $_POST['accountHolder'];
    $contactNo = $_POST['contactNo'];
    $fileUpload = $_FILES['fileUpload'];

    // File upload path
    $targetDir = "../uploads/";
    $fileName = basename($fileUpload["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($fileUpload["tmp_name"], $targetFilePath)) {
            // Insert data into database
            $sql = "INSERT INTO accounts (email, account_holder, contact_no, image_path) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $email, $accountHolder, $contactNo, $targetFilePath);

            if ($stmt->execute()) {
                echo "
                <html>
                <head>
                    <title>Submission Successful</title>
                    <meta http-equiv='refresh' content='5;url=nextpage.php' />
                    <style>
                        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
                        .message { font-size: 20px; color: green; }
                        .countdown { font-size: 24px; margin-top: 20px; }
                    </style>
                </head>
                <body>
                    <div class='message'>Form submitted successfully!</div>
                    <div class='countdown' id='countdown'>Redirecting in 5 seconds...</div>
                    <script>
                        var countdownValue = 5;
                        function updateCountdown() {
                            var countdownElement = document.getElementById('countdown');
                            countdownElement.textContent = 'Redirecting in ' + countdownValue + ' seconds...';
                            countdownValue--;
                            if (countdownValue < 0) {
                                window.location.href = '../trackprocess/trackprocess.html';
                            } else {
                                setTimeout(updateCountdown, 1000);
                            }
                        }
                        updateCountdown();
                    </script>
                </body>
                </html>";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
    }
    $conn->close();
}
?>
