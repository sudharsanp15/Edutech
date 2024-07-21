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
    <link rel="stylesheet" href="profile.css">
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


        <div class="profile-card">
  <div class="left-container">
    <img src="../images/profile.png" alt="Profile Image" class="profile-img">
    <h2 class="profile-name"><?php echo $_SESSION['first_name']; ?></h2>
    <!-- <p class="profile-role">Software Engineer</p> -->
  </div>
  <div class="right-container">
    <h2 class="profile-name">Personal Details</h2>
    <ul class="profile-details">
      <li>
        <span class="detail-label">Name:</span>
        <span class="detail-value"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></span>
      </li>
      <li>
        <span class="detail-label">DOB:</span>
        <span class="detail-value"><?php echo $_SESSION['dob']; ?></span>
      </li>
      <li>
        <span class="detail-label">Gender:</span>
        <span class="detail-value"><?php echo $_SESSION['gender']; ?></span>
      </li>
      <li>
        <span class="detail-label">Phone:</span>
        <span class="detail-value"><?php echo $_SESSION['phone']; ?></span>
      </li>
      <li>
        <span class="detail-label">Email:</span>
        <span class="detail-value"><?php echo $_SESSION['email']; ?></span>
      </li>
      <li>
        <span class="detail-label">Qualification:</span>
        <span class="detail-value"><?php echo $_SESSION['qualification']; ?></span>
      </li>
      <li>
        <span class="detail-label">Institute:</span>
        <span class="detail-value"><?php echo $_SESSION['institute']; ?></span>
      </li>
      <li>
        <span class="detail-label">Course Registered:</span>
        <span class="detail-value">Nil</span>
      </li>
    </ul>
  </div>
</div>


</body>
</html>


<?php
} else {
    header("Location: ../public/index.html");
    exit();
}
?>