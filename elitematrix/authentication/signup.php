<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
  <div class="form-wrapper">
    <h1>Sign Up</h1>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <p style="color: red; text-align:center; font-size:20px;">User already exists.</p>
    <?php endif; ?>
    <?php
      if (isset($_GET['success']) && $_GET['success'] == '1') {
        echo '<div class="alert alert-success"><h2>Registration successful!</h2></div>';
      }
    ?>
    <form id="registration-form" action="../backend/register.php" method="POST">
      <div class="form-row">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="first-name" required>
        </div>
        <div class="form-group">
          <label for="last-name">Last Name</label>
          <input type="text" id="last-name" name="last-name" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="dob">Date of Birth</label>
          <input type="date" id="dob" name="dob" required>
        </div>
        <div class="form-group gender-group">
          <label>Gender</label>
          <input type="radio" id="male" name="gender" value="male" required>
          <label for="male">Male</label>
          <input type="radio" id="female" name="gender" value="female" required>
          <label for="female">Female</label>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
          <label for="qualification">Qualification</label>
          <select id="qualification" name="qualification" required>
            <option value="">Select Qualification</option>
            <option value="sslc">SSLC</option>
            <option value="hsc">HSC</option>
            <option value="ug/pg">UG/PG</option>
            <option value="diploma">Diploma</option>
          </select>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="institute">Institute/School</label>
          <input type="text" id="institute" name="institute" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="confirm-password">Confirm Password</label>
          <input type="password" id="confirm-password" name="confirm-password" required>
          <div class="error-message" id="password-error"></div>
        </div>
      </div>
      <p><a href="signin.php">I am already member</a></p>
      <button type="submit">Register</button>
    </form>
  </div>

  <script>
    const form = document.getElementById('registration-form');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password');
    const passwordErrorMessage = document.getElementById('password-error');

    form.addEventListener('submit', (event) => {
      event.preventDefault();

      if (passwordInput.value.length < 8) {
        passwordErrorMessage.textContent = 'Password must be at least 8 characters long.';
        return;
      }

      if (passwordInput.value !== confirmPasswordInput.value) {
        passwordErrorMessage.textContent = 'Passwords do not match.';
        return;
      }

      passwordErrorMessage.textContent = '';
      form.submit();
    });
  </script>
</body>
</html>
