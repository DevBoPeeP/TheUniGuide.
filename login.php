<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TheUniGuide</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .message p {
      color: red;
      /* or any color you prefer for error messages */
      font-size: 10px;
      margin-bottom: 4px;
    }
  </style>
</head>

<body>
  <div class="container flex">
    <div class="facebook-page flex">
      <div class="text">
        <h1 style="font-size: 50px;">TheUniGuide</h1>
        <p>"Your Campus, Your Guide </p>
        <p>Discover, Navigate, Thrive"</p>
      </div>
      <form method="POST" action="">

        <input type="email" name="email" placeholder="Email or phone number" required>
        <input type="password" name="password" placeholder="Password" required>
        <div class="message">
          <?php
          if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php';

            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['password']);

            $sql = "SELECT id, password, user_type FROM users WHERE email='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();

              echo "<script>alert('Email found: " . htmlspecialchars($email) . "');</script>";

              if (password_verify($password, $row['password'])) {
                echo "<script>alert('Password found: " . htmlspecialchars($row['password']) . "');</script>";

                $_SESSION['user_id'] = $row['id'];

                switch ($row['user_type']) {
                  case 'student':
                    header("Location: ./student/Mainpage.php");
                    exit();
                  case 'university':
                    header("Location: ./University/Mainpage.php");
                    exit();
                  default:
                    header("Location: error_page.php");
                    exit();
                }
              } else {
                echo "<script>alert('Password Not Found');</script>";
              }
            } else {
              echo "<script>alert('Email Not Found');</script>";
            }
            $conn->close();
          }
          ?>
        </div>
        <div class="link">
          <button type="submit" class="login">Login</button>
          <a href="./change-pass.php" class="forgot">Forgot password?</a>
        </div>
        <hr>
        <div class="button">
          <a href="./register/index.php">Register</a>
        </div>
      </form>
    </div>
  </div>

  <div class="copyright" style="background-color:#304674;color:white;">
    &copy; 2024 TheUniGuide. All rights reserved.
  </div>
</body>

</html>