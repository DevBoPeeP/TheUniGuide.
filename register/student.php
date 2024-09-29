<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TheUniGuide</title>
  <link rel="stylesheet" href="../styles.css">
  <style>
    .message p {
      color: red;
      /* or any color you prefer for error messages */
      font-size: 10px;
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
      flex-direction: column;
      margin-bottom: 15px;
      align-items: center;
    }

    .gender input {
      margin-bottom: 0px;
      height: 5px;
      width: 5%;
    }

    @media screen and (max-width: 460px) {
      select {
        padding: 10px 15px;
        background-position: right 15px center;
      }

      .gender {
        flex-direction: row;
        justify-content: center;
        font-size: 12px;
      }
    }
  </style>
</head>

<body>
  <div class="container flex">
    <div class="facebook-page flex">
      <div class="text">
        <h1 style="font-size: 50px;">TheUniGuide</h1>
        <p>"Your Compass for </p>
        <p>Academic Success."</p>
      </div>

      <form id="registrationForm" method="POST" action="student.php">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required>

        <select name="institution" id="institutionselect" required>
          <option value="" disabled selected>Select Higher Institution</option>
          <option value="LASU">Lagos State University</option>
        </select>



        <select name="faculty" id="facultySelect" required>
          <option value="" disabled selected>Select Faculty/School/College</option>
          <option value="COM[BMS]">College of Medicine[Basic medical sciences]</option>
          <option value="COM[DENTISTRY]">College of Medicine[Dentistry]</option>
          <option value="FOA">Faculty of Arts</option>
          <option value="FOL">Faculty of Law</option>
          <option value="FOS">Faculty of Sciences</option>
          <option value="FOC">Faculty of Communication</option>
          <option value="FOEd">Faculty of Education</option>
          <option value="FSS">Faculty of Social Sciences</option>
          <option value="FMS">Faculty of Management Sciences</option>
          <option value="FOE">Faculty of Engeneering</option>
          <option value="FCS">Faculty of Clinical Sciences</option>
          <option value="SCA">School of Agriculture</option>
          <option value="SCT">School of transport</option>
        </select>


        Gender:
        <label for="male">Male</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="female">Female</label>
        <input type="radio" id="female" name="gender" value="female" required>



        <div class="link">
          <button type="submit" class="login">Register</button>
        </div>
        <div class="message">
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include '../db.php';

            $full_name = $conn->real_escape_string($_POST['full_name']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['password']);
            $confirm_password = $conn->real_escape_string($_POST['confirm_password']);
            $institution = $conn->real_escape_string($_POST['institution']);
            $faculty = $conn->real_escape_string($_POST['faculty']);
            $gender = $conn->real_escape_string($_POST['gender']);
            $user_type = 'student'
            ;


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

                $sql = "INSERT INTO users (full_name, email, password, institution,faculty, gender,user_type) VALUES ('$full_name', '$email', '$hashed_password','$institution', '$faculty', '$gender','$user_type')";

                if ($conn->query($sql) === TRUE) {
                  echo "<p>Registration successful!</p>";
                  header("Location: ../login.php");
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

  <div class="copyright" style="background-color:#304674;color:white;">
    &copy; 2024 TheUniGuide. All rights reserved.
  </div>

  <script src="script.js"></script>



</body>

</html>