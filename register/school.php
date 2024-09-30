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
                <p>"Navigate Your Journey to</p>
                <p> Higher Learning."</p>

            </div>
            <form id="registrationForm" method="POST" action="school.php">
                <input type="text" name="school_name" placeholder="University Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password"
                    required>


                <div class="link">
                    <button type="submit" class="login">Register</button>
                </div>
                <div class="message">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        include '../db.php';

                        $full_name = $conn->real_escape_string($_POST['school_name']);
                        $email = $conn->real_escape_string($_POST['email']);
                        $password = $conn->real_escape_string($_POST['password']);
                        $confirm_password = $conn->real_escape_string($_POST['confirm_password']);
                        $user_type = 'university'
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

                                $sql = "INSERT INTO users (full_name, email, password, user_type) VALUES ('$full_name', '$email', '$hashed_password','$user_type')";

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
    <script src="../script.js"></script>



</body>

</html>