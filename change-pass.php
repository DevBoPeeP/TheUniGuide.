<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'db.php'; // Include your database connection file

  $user_id = $_SESSION['user_id'];
  $current_password = $_POST['current_password'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  // Fetch the user's current password from the database
  $sql = "SELECT password FROM users WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $stmt->bind_result($hashed_password);
  $stmt->fetch();
  $stmt->close();

  // Verify the current password
  if (password_verify($current_password, $hashed_password)) {
    // Check if the new password and confirm password match
    if ($new_password == $confirm_password) {
      // Hash the new password
      $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

      // Update the password in the database
      $sql = "UPDATE users SET password = ? WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("si", $new_hashed_password, $user_id);
      if ($stmt->execute()) {
        echo "Password changed successfully!";
      } else {
        echo "Error updating password.";
      }
      $stmt->close();
    } else {
      echo "New password and confirm password do not match.";
    }
  } else {
    echo "Current password is incorrect.";
  }

  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TUG- Change Password</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>


  <div class="container flex">
    <form action="change-pass.php" method="POST">
      <label for="current_password">Current Password:</label>
      <input type="password" id="current_password" name="current_password" required><br>

      <label for="new_password">New Password:</label>
      <input type="password" id="new_password" name="new_password" required><br>

      <label for="confirm_password">Confirm New Password:</label>
      <input type="password" id="confirm_password" name="confirm_password" required><br>
      <div class="link">
        <button class="login" type="submit">Change Password</button>
      </div>
    </form>
  </div>

  <div class="copyright">
    &copy; 2024 TheUniGuide. All rights reserved.
  </div>
</body>

</html>