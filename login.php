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
      font-size: 4vw;
      margin-bottom: 4px;
    }
  </style>
</head>

<body>
  <div class="container flex">
    <div class="facebook-page flex">
      <div class="text">
        <h1 style="font-size: 50px;">TheUniGuide</h1>
        <p>Interactive maps to find the </p>
        <p> next registration spot.</p>
      </div>
      <form method="POST" action="index.php">

        <input type="email" name="email" placeholder="Email or phone number" required>
        <input type="password" name="password" placeholder="Password" required>
        <div class="message">
          <?php
          session_start();
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php';

            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['password']);

            $sql = "SELECT id, password FROM users WHERE email='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];

                if ($row['user_type'] == 'student') {
                  header("Location: student/Mainpage.php");
                  exit();
                } else if ($row['user_type'] == 'university') {
                  header("Location: University/Mainpage.php");
                }
                exit();
              } else {
                echo "<p>Invalid email or password.</p>";
              }
            } else {
              echo "<p>Invalid email or password.</p>";
            }

            $conn->close();
          }
          ?>
        </div>
        <div class="link">
          <button type="submit" class="login">Login</button>
          <a href="#" class="forgot">Forgot password?</a>
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