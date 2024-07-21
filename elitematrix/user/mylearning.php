<?php 
session_start();
include '../backend/db_conn.php';

// Check if all required session variables are set
if (isset($_SESSION['email']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && isset($_SESSION['dob']) && isset($_SESSION['gender']) && isset($_SESSION['phone']) && isset($_SESSION['qualification']) && isset($_SESSION['institute'])) {
    
    // Fetch course details from the database based on the user email
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT course_name, payment, course_status FROM courseregistrations WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($course_name, $payment, $course_status);
    $stmt->fetch();

    if ($stmt->num_rows == 0) {
        // No course registration found for the user
        header("Location: ../user/index.php");
        exit();
    }

    // Set session variables for course details
    $_SESSION['course_name'] = $course_name;
    $_SESSION['payment'] = $payment;
    $_SESSION['course_status'] = $course_status;

    // Redirect if payment is pending
    if ($_SESSION['payment'] == 'Pending') {
        header("Location: ../user/index.php");
        exit();
    }

    // Initialize course status counts
    $courseEnrolled = '00';
    $courseOngoing = '00';
    $courseCompleted = '00';

    // Update course status counts based on session data
    if ($_SESSION['course_status'] == 'Ongoing') {
        $courseEnrolled = '01';
        $courseOngoing = '01';
    } elseif ($_SESSION['course_status'] == 'Completed') {
        $courseEnrolled = '01';
        $courseCompleted = '01';
    }
    $stmt->close();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Matrix || My Learning</title>
    <link rel="stylesheet" href="mylearning.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
        <a href="#" class="logo">
            <img src="../images/profile-1.png" alt="Logo">
            <?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?>
        </a>
        <div class="details-container">
            <span class="label">Course Enrolled:</span> <span><?php echo $courseEnrolled; ?></span>
            <span class="label">Course Ongoing:</span> <span><?php echo $courseOngoing; ?></span>
            <span class="label">Course Completed:</span> <span><?php echo $courseCompleted; ?></span>
        </div>
    </div>

    <div class="navbar">
        <a href="#" class="logo">
            <img src="../images/profile-1.png" alt="Logo">
            <?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?>
        </a>
        <div class="details-container">
            <span class="label">Course Enrolled:</span> <span><?php echo $courseEnrolled; ?></span>
            <span class="label">Course Ongoing:</span> <span><?php echo $courseOngoing; ?></span>
            <span class="label">Course Completed:</span> <span><?php echo $courseCompleted; ?></span>
        </div>
    </div>

    <div class="syllabus">
        <h1><?php echo $_SESSION['course_name']; ?></h1>
        <!-- <p>Course Details: Detailed description of the course content goes here.</p> -->
            <hr>
            <button type="button" class="collapsible">Day 1<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 2<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 3<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 4<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 5<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 6<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 7<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 8<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 9<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 10<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 11<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 12<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 13<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 14<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 15<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 16<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 17<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 18<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 19<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
            <button type="button" class="collapsible">Day 20<i class="fa fa-solid fa-caret-down"></i></button>
            <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <hr>
    </div>





<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
        content.style.display = "none";
        } else {
        content.style.display = "block";
        }
    });
    }
</script>
</body>
</html>

<?php
} else {
    // Redirect if session variables are not set
    header("Location: ../user/index.php");
    exit();
}
?>
