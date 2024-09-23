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
      font-size: 16px;
      margin-top: 4px;
    }

    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    select {
      appearance: none;
      background: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path fill="%23AAA" d="M2 0L0 2h4zm0 5L0 3h4z"/></svg>') no-repeat right 10px center;
      background-size: 10px;
      padding-right: 30px;
      cursor: pointer;
    }

    .gender {
      display: flex;
      flex-direction: row;
      margin-bottom: 15px;
      align-items: center;
    }

    .gender input {
      margin-bottom: 0px;
      height: 5px;
      width: 5%;
    }

    @media (max-width: 600px) {
      select {
        padding: 10px 15px;
        background-position: right 15px center;
      }
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
      <form id="registrationForm" method="POST" action="register.php">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required>

        <select name="department" id="departmentSelect" required>
          <option value="" disabled selected>Select Faculty/School</option>
          <option value="COLFAST">College of Medicine[Basic medical sciences]</option>
          <option value="COLFAST">College of Medicine[Dentistry]</option>
          <option value="COLNAS">Faculty of Arts</option>
          <option value="COLENVS">Faculty of Law</option>
          <option value="COLENG">Faculty of Sciences</option>
          <option value="COLMANS">Faculty of Communication</option>
          <option value="COLFAST">Faculty of Education</option>
          <option value="COLFAST">Faculty of Social Sciences</option>
          <option value="COLFAST">Faculty of Management Sciences</option>
          <option value="COLFAST">Faculty of Engeneering</option>
          <option value="COLFAST">Faculty of Clinical Sciences</option>
          <option value="COLFAST">School of Agriculture</option>
          <option value="COLFAST">School of transport</option>
        </select>


        Gender:
        <label for="male">Male</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="female">Female</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="other">Other</label>
        <input type="radio" id="other" name="gender" value="other" required>


        <div class="link">
          <button type="submit" class="login">Register</button>
        </div>
        <div class="message">
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php';

            $full_name = $conn->real_escape_string($_POST['full_name']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['password']);
            $confirm_password = $conn->real_escape_string($_POST['confirm_password']);
            $department = $conn->real_escape_string($_POST['department']);
            $gender = $conn->real_escape_string($_POST['gender']);

            // Check if email already exists
            $checkEmail = "SELECT email FROM users WHERE email='$email'";
            $result = $conn->query($checkEmail);

            if ($result->num_rows > 0) {
              echo "<p>Email already registered.</p>";
            } else {
              if ($password !== $confirm_password) {
                echo "<p>Passwords do not match.</p>";
              } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (full_name, email, password, department, gender) VALUES ('$full_name', '$email', '$hashed_password', '$department', '$gender')";

                if ($conn->query($sql) === TRUE) {
                  echo "<p>Registration successful!</p>";
                } else {
                  echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
              }
            }

            $conn->close();
          }
          ?>

        </div>
      </form>

    </div>
  </div>
  <script src="script.js"></script>



</body>

</html>