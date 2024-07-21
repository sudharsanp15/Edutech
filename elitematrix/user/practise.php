<?php 
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && isset($_SESSION['dob']) && isset($_SESSION['gender']) && isset($_SESSION['phone']) && isset($_SESSION['qualification']) && isset($_SESSION['institute'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Matix || Profile</title>
    <link rel="stylesheet" href="practise.css">
</head>

<body>

        <div class="navbar">
            <a href="#" class="logo"><img src="../images/logo.png" alt="Logo"></a>
            <a href="index.php">Home</a>
            <a href="#about">About</a>
            <a href="#courses">Courses</a>
            <a href="#contact">Contact</a>
            <div class="dropdown">
                <a href="#" class="dropbtn">My Account</a>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="../trackprocess/trackprocess.html">Track Progress</a>
                    <a href="#">My Learning</a>
                    <a href="../backend/logout.php">Sign out</a>
                </div>
            </div>
        </div>


    <div class="background-animation"></div>
    <div class="container">
        <div class="box" onclick="checkStatus('quiz');">
            <h2>Take Quiz</h2>
        </div>
        <div class="box" onclick="checkStatus('practice');">
            <h2>Practice Questions</h2>
        </div>
        <div class="box" onclick="checkStatus('compiler');">
            <h2>Compiler</h2>
        </div>
    </div>

    <script>
        const backgroundAnimation = document.querySelector('.background-animation');

        // Create different shapes
        for (let i = 0; i < 10; i++) {
            const shape = document.createElement('div');
            shape.classList.add('shape');

            // Randomly assign a shape type
            const shapeType = Math.floor(Math.random() * 3); // 0, 1, or 2
            if (shapeType === 0) {
                shape.classList.add('circle');
            } else if (shapeType === 1) {
                shape.classList.add('square');
            } else {
                shape.classList.add('triangle');
            }

            // Set random position
            shape.style.left = Math.random() * 100 + 'vw'; // Random horizontal position
            shape.style.top = Math.random() * 100 + 'vh'; // Random vertical position

            backgroundAnimation.appendChild(shape);
        }
    </script>


<script src="checkstatus.js"></script>

</body>
</html>


<?php
} else {
    header("Location: ../public/index.html");
    exit();
}
?>