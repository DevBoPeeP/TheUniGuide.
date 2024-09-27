<!-- <?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        nav {
            background: var(--primary);
            height: 80px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        label.logo {
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        nav ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            font-size: 17px;
            text-transform: uppercase;
            text-decoration: none;
            padding: 7px 13px;
            border-radius: 3px;
            transition: background 0.3s, color 0.3s;
        }

        nav ul li a:hover,
        nav ul li a.active {
            background: var(--highlight);
            color: var(--primary);
        }

        .checkbtn {
            font-size: 30px;
            color: white;
            cursor: pointer;
            display: none;
        }

        #check {
            display: none;
        }

        @media (max-width: 952px) {
            label.logo {
                font-size: 25px;
            }

            nav ul li a {
                font-size: 16px;
            }

        }

        @media (max-width: 858px) {
            .checkbtn {
                display: block;
            }

            nav ul {
                position: fixed;
                width: 100%;
                height: 100vh;
                background: var(--secondary);
                top: 80px;
                left: -100%;
                flex-direction: column;
                align-items: center;
                transition: all 0.5s;
            }

            nav ul li {
                margin: 50px 0;
            }

            nav ul li a {
                font-size: 20px;
            }

            nav ul li a:hover,
            nav ul li a.active {
                background: none;
                color: var(--highlight);
            }

            #check:checked~ul {
                left: 0;
                z-index: 1;
            }
        }
    </style>
</head>

<body>
    <div class="main">

        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">TheUniGuide</label>
            <ul>

                <li><a href="change-pass.php">Change Password</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
    <div class="copyright">
        &copy; 2024 TheUniGuide. All rights reserved.
    </div>
    <script src="../script.js"></script>
</body>

</html>