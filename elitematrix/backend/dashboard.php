
<?php 
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    /* dashboard.css */
.dashboard-wrapper {
  width: 80%;
  margin: auto;
  padding: 20px;
  text-align: center;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  color: #333;
}

p {
  font-size: 1.2em;
}

a {
  color: #007BFF;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

  </style>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></h1>
    <p>Email: <?php echo $_SESSION['email']; ?></p>
    <p>Gender: <?php echo $_SESSION['gender']; ?></p>
    <p>Phone: <?php echo $_SESSION['phone']; ?></p>
    <p>Qualification: <?php echo $_SESSION['qualification']; ?></p>
    <p>Institute: <?php echo $_SESSION['institute']; ?></p>
    <p>Date of Birth: <?php echo $_SESSION['dob']; ?></p>
</body>
</html>

<?php
} else {
    header("Location: signin.html");
    exit();
}
?>
