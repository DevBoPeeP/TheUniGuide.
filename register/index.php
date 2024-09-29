<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheUniGuide</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Libre Baskerville", serif;
        }

        .flex {
            display: flex;
            align-items: center;
        }

        .container {
            padding: 0 15px;
            min-height: 100vh;
            justify-content: center;
            background-color: #304674;
        }

        .facebook-page {
            justify-content: space-between;
            max-width: 1000px;
            width: 100%;
        }

        .facebook-page .text {
            margin-bottom: 90px;
        }

        .facebook-page h1 {
            color: white;
            font-size: 4rem;
            margin-bottom: 10px;
        }

        .facebook-page p {
            color: white;
            font-size: 1.75rem;
            white-space: nowrap;
        }

        #registration {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
        }

        #registration button {
            margin-top: 10px;
            width: 300px;
            height: 100px;
            padding: 10px;
            background-color: whitesmoke;
            border: none;
            border-radius: 20px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #registration button a {
            color: darkblue;
            text-decoration: none;
            display: block;
            width: 100%;
        }

        #registration button:hover {
            background-color: skyblue;
        }

        @media screen and (max-width:460px) {
            .facebook-page {
                font-size: 20px;
            }

            .facebook-page h1 {
                font-size: 25px;
            }


            .facebook-page p {
                font-size: 15px;
            }

            #registration {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .flex {
                display: flex;
                align-items: center;
                flex-direction: column;
            }
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
            <div id="registration" method="POST" action="register.php">
                <button>
                    <i class="fa-regular fa-user" style="color: #5a8add;"></i>
                    <a href="./student.php">Students</a>
                </button>
                <button>
                    <i class="fa-solid fa-school" style="color: #5a8add;"></i>
                    <a href="./school.php">University</a>
                </button>
                </>

            </div>
        </div>
    </div>

    <div class="copyright" style="background-color:#304674;color:white;">
        &copy; 2024 TheUniGuide. All rights reserved.
    </div>
    <script src="../script.js"></script>



</body>

</html>