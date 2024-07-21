<?php 
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Matrix || User</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-solid fa-arrow-up"></i></button>   
    <div id="header">
        <!-- <div class="menu-toggle">&#9776;</div> -->
        <div class="bgimg">
            <img src="../images/bg-img.jpg" alt="">
        </div>

        <div class="bgcolor"></div>
        <div class="navbar">
            <a href="#" class="logo"><img src="../images/logo.png" alt="Logo"></a>
            <a href="#header">Home</a>
            <a href="#about">About</a>
            <a href="#courses">Courses</a>
            <a href="#">Live Classes</a>
            <a href="practise.php">Practise</a>
            <div class="dropdown">
                <a href="#" class="dropbtn">My Account</a>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="../trackprocess/trackprocess.html">Track Progress</a>
                    <!-- <a href="mylearning.php" target="_blank">My Learning</a> -->
                    <a onclick="checkStatus('mylearning');">My Learning</a>
                    <a href="../backend/logout.php">Sign out</a>
                </div>
            </div>
        </div>
        

        <div class="head-content">
            <h1>Learn from Industry Experts</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam maximus tortor at diam gravida posuere. Curabitur et malesuada mi.</p>
            <a href="mylearning.php" target="_blank"><button>Start Learning</button></a>
        </div>
    </div>

    <div class="categories-container">
        <div>
            <i class="fa fa-solid fa-graduation-cap"></i>
            <h4>Skilled Instructors</h4>
            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
        </div>
        <div>
            <i class="fa fa-solid fa-globe"></i>
            <h4>Online Classes</h4>
            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
        </div>
        <div>
            <i class="fa fa-home"></i>
            <h4>Home Projects</h4>
            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
        </div>
        <div>
            <i class="fa fa-solid fa-book"></i>
            <h4>Book Library</h4>
            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
        </div>
    </div>

    <div id="about">
        <h1>Our Motive</h1>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="slide-innercontainer">
                    <img src="../images/vision.png" alt="Example Image">
                    <div class="slide-content">
                      <h2>Our Vision</h2>
                      <p><i class="fa fa-solid fa-arrow-right"></i>To revolutionize education through innovative online learning experiences.</p>
                    </div>
                </div>

            </div>
            
            <div class="mySlides fade">
                <div class="slide-innercontainer">
                    <img src="../images/mission.jpg" alt="Example Image">
                    <div class="slide-content">
                      <h2>Mission</h2>
                      <p><i class="fa fa-solid fa-arrow-right"></i>Our mission is to democratize education by providing high-quality courses that foster lifelong learning and personal growth</p>
                    </div>
                </div>
            </div>
            
            <div class="mySlides fade">
                <div class="slide-innercontainer">
                    <img src="../images/values.jpg" alt="Example Image">
                    <div class="slide-content">
                      <h2>Core Values</h2>
                      <p><i class="fa fa-solid fa-arrow-right"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget est eget nisi euismod hendrerit</p>
                    </div>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="slide-innercontainer">
                    <img src="../images/goals.png" alt="Example Image">
                    <div class="slide-content">
                      <h2>Our Goal</h2>
                      <p><i class="fa fa-solid fa-arrow-right"></i>We believe in transparency, honesty, and ethical practices</p>
                      <p><i class="fa fa-solid fa-arrow-right"></i>We strive for excellence in everything we do, from course content to user experience</p>
                    </div>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="slide-innercontainer">
                    <img src="../images/impact.jpg" alt="Example Image">
                    <div class="slide-content">
                      <h2>Impact</h2>
                      <p><i class="fa fa-solid fa-arrow-right"></i>Empowering individuals to achieve their full potential through knowledge and skill development</p>
                      <p><i class="fa fa-solid fa-arrow-right"></i>Enabling career advancement and personal enrichment through flexible learning opportunities</p>
                    </div>
                </div>
            </div>
            
        </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>  
    </div>

    <div id="courses">
    <h1>Popular Courses</h1>
    <div class="courses">
        <div class="card">
            <img src="../images/c-img1.jpg" alt="c">
            <h2>C PROGRAMMING</h2>
            <p class="star-icon"><i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i></p>
            <p class="title">Training Mode : Online</p>
            <p class="title">Payment : Paid</p>
            <p><a href="course-details.php?course=1" target="_blank" class="view-course-btn"><button>View</button></a></p>
        </div>

        <div class="card">
            <img src="../images/cpp-img1.jpg" alt="cpp">
            <h2>CPP PROGRAMMING</h2>
            <p class="star-icon"><i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i></p>
            <p class="title">Training Mode : Online</p>
            <p class="title">Payment : Paid</p>
            <p><a href="course-details.php?course=2" target="_blank" class="view-course-btn"><button>View</button></a></p>
        </div>

        <div class="card">
            <img src="../images/python-img.jpg" alt="python">
            <h2>PYTHON PROGRAMMING</h2>
            <p class="star-icon"><i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i></p>
            <p class="title">Training Mode : Online</p>
            <p class="title">Payment : Paid</p>
            <p><a href="course-details.php?course=3" target="_blank" class="view-course-btn"><button>View</button></a></p>
        </div>

        <div class="card">
            <img src="../images/web-img.jpg" alt="web">
            <h2>WEB DEVELOPMENT</h2>
            <p class="star-icon"><i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i>
                <i class="fa fa-solid fa-star"></i></p>
            <p class="title">Training Mode : Online</p>
            <p class="title">Payment : Paid</p>
            <p><a href="course-details.php?course=4" target="_blank" class="view-course-btn"><button>View</button></a></p>
            
        </div>
    </div>
</div>

    <div id="footer-container">
        <div>
            <p class="footer-head"><img src="../images/logo.png" alt=""></i>Learning</p>
            <p><a href="mylearning.php" target="_blank"><button class="form-button">Start Learning</button></a></p>
        </div>
        <div>
            <p>Legal</p>
            <p><a href="#">Privacy Policy </a><br>
               <a href="#">Terms & Conditions</a><br>
               <a href="#">Refund Policy</a></p>
        </div>
        <div>
            <!-- <p>Operating Hours</p>
            <p>Mon - Fri: 8am - 8pm <br>Saturday: 9am - 7pm <br>Sunday: 9am - 8pm</p> -->
            <p>Follow us for Learning tips</p>
            <p><a href="#"><i class="fa fa-solid fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-solid fa-telegram"></i></a>
                <a href="#"><i class="fa fa-solid fa-twitter"></i></a>
                <a href="#"><i class="fa fa-solid fa-youtube"></i></a></p>
        </div>
        <div>
            <p>Contact</p>
            <p id="sendMailButton">123-456-7890 <br>info@mysite.com</p>
        </div>
    </div>
      <script src="script.js"></script>
      <script src="popup.js"></script>
      <script src="checkstatus.js"></script>
</body>
</html>

<?php
} else {
    header("Location: ../public/index.html");
    exit();
}
?>