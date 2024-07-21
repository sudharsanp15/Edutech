<?php 
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && isset($_SESSION['dob']) && isset($_SESSION['gender']) && isset($_SESSION['phone']) && isset($_SESSION['qualification']) && isset($_SESSION['institute'])) {
?>
<?php
// course-details.php
$courseId = $_GET['course'];
$courseName = $courseDetails = $courseDuration = $courseInstructor = $courseAmount ='';

// Manually set the course details based on the courseId
if ($courseId == '1') {
    $courseName = 'C PROGRAMMING';
    $courseDetails = 'C is a general-purpose programming language is it is a low-level language that provides a close-to-the-hardware interface, making it efficient for system programming, such as operating systems and device drivers.';
    $courseDuration = '4 weeks';
    $courseInstructor = 'John Doe';
    $courseAmount = '$10';
} elseif ($courseId == '2') {
    $courseName = 'CPP PROGRAMMING';
    $courseDetails = 'CPP (C++) Programming is a powerful and versatile object-oriented programming language known for its efficiency and performance. It extends the capabilities of the C language with additional features like classes and objects, making it suitable for complex software development. CPP is widely used in game development, system software, and applications where high performance and scalability are crucial.';
    $courseDuration = '6 weeks';
    $courseInstructor = 'Jane Smith';
    $courseAmount = '$10';
} elseif ($courseId == '3') {
    $courseName = 'PYTHON PROGRAMMING';
    $courseDetails = 'Python Programming is a high-level, interpreted programming language known for its simplicity and readability. It emphasizes code readability and allows developers to express concepts in fewer lines of code compared to other languages. Python is versatile and used in various domains, including web development, data analysis, artificial intelligence, scientific computing, and automation.';
    $courseDuration = '6 weeks';
    $courseInstructor = 'Jane Smith';
    $courseAmount = '$10';
} elseif ($courseId == '4') {
    $courseName = 'WEB DEVELOPMENT';
    $courseDetails = 'Web Development involves creating websites and web applications using programming languages like HTML, CSS, and JavaScript. It encompasses both front-end development (client-side) and back-end development (server-side). Front-end developers focus on creating the user interface and user experience, while back-end developers manage server-side logic and database interactions. Web development also includes frameworks and technologies like React, Angular, Node.js, and databases such as MySQL and MongoDB.';
    $courseDuration = '6 weeks';
    $courseInstructor = 'Jane Smith';
    $courseAmount = '$10';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $courseName; ?> || Courese</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: row;
            padding: 20px;
        }

        .course-details, .registration-form {
            flex: 1;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .course-details h2, .registration-form h2 {
            color: #0057a8;
        }

        .course-details p {
            font-size: 16px;
            line-height: 1.5;
        }

        .registration-form input, .registration-form select, .registration-form button {
            width: 100%; 
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .registration-form button {
            background-color: #0274BE;
            color: white;
            border: none;
            cursor: pointer;
        }

        .registration-form button:hover {
            background-color: #0057a8;
        }

  













.background-animation {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1; /* Place behind other content */
}

.circle {
    position: absolute;
    border-radius: 50%;
    background-color: rgba(76, 175, 80, 0.7);
    animation: move 10s linear infinite;
}


/* Create multiple circles with different animations */
.circle:nth-child(1) {
    width: 50px;
    height: 50px;
    left: 10%;
    top: 20%;
    animation-delay: 0s;
}

.circle:nth-child(2) {
    width: 70px;
    height: 70px;
    left: 30%;
    top: 50%;
    animation-delay: 1s;
}

.circle:nth-child(3) {
    width: 60px;
    height: 60px;
    left: 70%;
    top: 30%;
    animation-delay: 2s;
}

.circle:nth-child(4) {
    width: 80px;
    height: 80px;
    left: 50%;
    top: 70%;
    animation-delay: 3s;
}

@keyframes move {
    0% {
        transform: translate(0, 0);
    }
    25% {
        transform: translate(100px, 100px);
    }
    50% {
        transform: translate(-100px, 200px);
    }
    75% {
        transform: translate(200px, -100px);
    }
    100% {
        transform: translate(0, 0);
    }
}


    </style>
</head>
<body>
<div class="background-animation"></div>
    <div class="container">
        <div class="course-details">
            <h2><?php echo $courseName; ?></h2>
            <p><strong>Description:</strong> <?php echo $courseDetails; ?></p>
            <p><strong>Duration:</strong> <?php echo $courseDuration; ?></p>
            <p><strong>Instructor:</strong> <?php echo $courseInstructor; ?></p>
            <p><strong>Amount:</strong> <?php echo $courseAmount; ?></p>
        </div>

        <div class="registration-form">
            <h2>Registration Form</h2>
            <form id="registrationForm" method="POST" action="../backend/courseregister.php">
                <input type="text" name="first_name" value="<?php echo $_SESSION['first_name']; ?>" placeholder="First Name" readonly>
                <input type="text" name="last_name" value="<?php echo $_SESSION['last_name']; ?>" placeholder="Last Name" readonly>
                <input type="tel" name="phone" value="<?php echo $_SESSION['phone']; ?>" placeholder="Phone Number" readonly>
                <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Email" readonly>
                <input type="text" name="school" value="<?php echo $_SESSION['institute']; ?>" placeholder="Institute/School" readonly>
                <input type="hidden" name="course_name" value="<?php echo $courseName; ?>">
                <input type="checkbox" name="declaration" required> I agree to the terms and conditions
                <button type="submit">Register</button>
            </form>
        </div>
    </div>



    <script>
        const backgroundAnimation = document.querySelector('.background-animation');
    
        for (let i = 0; i < 4; i++) {
            const circle = document.createElement('div');
            circle.classList.add('circle');
            backgroundAnimation.appendChild(circle);
        }
    </script>
</body>
</html>

<?php
} else {
    header("Location: ../public/index.html");
    exit();
}
?>