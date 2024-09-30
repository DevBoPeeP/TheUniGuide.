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
    <title>TheUniGuide- Mainpage</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        :root {
            --primary: #304674;
            --secondary: #ff5252;
            --background: #eee;
            --highlight: #ffda79;
            /* Theme color */
            --theme: var(--primary);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .process {
            display: grid;
            place-content: center;
            grid-template-columns: repeat(auto-fit, min(100%, 30rem));
            min-height: 100vh;
            place-items: start;
            gap: 1rem;
            margin: 0;
            padding: 1rem;
            color: var(--primary);
            background: var(--background);
        }

        /* Core styles/functionality */
        .tab input {
            position: absolute;
            opacity: 0;
            z-index: -1;
        }

        .tab__content {
            max-height: 0;
            overflow: hidden;
            transition: all 0.35s;
        }

        .tab input:checked~.tab__content {
            max-height: 20rem;
        }

        /* Visual styles */
        .accordion {
            color: var(--theme);
            border: 2px solid;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .tab__label,
        .tab__close {
            display: flex;
            color: white;
            background: var(--theme);
            cursor: pointer;
        }

        .tab__label {
            justify-content: space-between;
            padding: 1rem;
        }

        .tab__label::after {
            content: "\276F";
            width: 1em;
            height: 1em;
            text-align: center;
            transform: rotate(90deg);
            transition: all 0.35s;
        }

        .tab input:checked+.tab__label::after {
            transform: rotate(270deg);
        }

        .tab__content p {
            margin: 0;
            padding: 1rem;
        }

        .tab__close {
            justify-content: flex-end;
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }

        .accordion--radio {
            --theme: var(--primary);
        }

        /* Arrow animation */
        .tab input:not(:checked)+.tab__label:hover::after {
            animation: bounce .5s infinite;
        }

        @keyframes bounce {
            25% {
                transform: rotate(90deg) translate(.25rem);
            }

            75% {
                transform: rotate(90deg) translate(-.25rem);
            }
        }

        button {
            background: #fff;
            border: none;
            padding: 10px 20px;
            display: inline-block;
            font-size: 15px;
            font-weight: 600;
            width: 120px;
            text-transform: uppercase;
            cursor: pointer;
            transform: skew(-21deg);
            z-index: -1;
        }

        span {
            display: inline-block;
            transform: skew(21deg);

        }

        button::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            right: 100%;
            left: 0;
            background: #307899;
            opacity: 0;
            z-index: -1;
            transition: all 0.5s;
        }

        button:hover {
            color: #fff;
        }

        button:hover::before {
            left: 0;
            right: 0;
            opacity: 1;
        }

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

                <li><a href="../change-pass.php">Change Password</a></li>
                <li><a href="../logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
    <div class="process">
        <section class="accordion">
            <div class="tab">
                <input type="checkbox" name="accordion-2" id="rd2">
                <label for="rd2" class="tab__label">Medical Clearance</label>
                <div class="tab__content">
                    <p>Please visit the school clinic with four passport-sized photographs</p>
                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3086.8972765048525!2d3.199111673666418!3d6.465386593526266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b869441a21269%3A0x7ca9986f9c55a8cf!2sLasu%20Health%20Center!5e1!3m2!1sen!2sng!4v1727667035805!5m2!1sen!2sng"
                        target="_blank">
                        <button>
                            <span>Visit Map</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="tab">
                <input type="checkbox" name="accordion-2" id="rd3">
                <label for="rd3" class="tab__label">Library Clearance</label>
                <div class="tab__content">
                    <p>If you arrive late, select your room on the portal, print and stamp your hostel clearance at the
                        Student Affairs Center, and bring four passport photographs and all receipts. Ensure you have
                        all required documents and payments ready when proceeding to your hostel.</p>
                    <a id="mapLink">
                        <button>
                            <span>Visit Map</span>
                        </button>
                    </a>
                </div>

            </div>

            <div class="tab">
                <input type="checkbox" name="accordion-2" id="rd4">
                <label for="rd4" class="tab__label">Faculty Clearance</label>
                <div class="tab__content">
                    <p>Please go to the faculty office with the following documents;
                        Minimum four passport photographs, JAMB Addmission letter, JAMB result, O' Level result,
                        Attestation
                        letter,Lasu screening result,anti cultism oath form,profile folder.
                    </p>
                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12347.567125383011!2d3.1815945791023417!3d6.466286567438156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b86967059d5bd%3A0x5e6dc029dd805d6a!2sFaculty%20Of%20Science!5e1!3m2!1sen!2sng!4v1727666578035!5m2!1sen!2sng"
                        target="blank">

                        <button>
                            <span>Visit Map</span>
                        </button>
                    </a>
                </div>
            </div>


            <div class="tab">
                <input type="checkbox" name="accordion-2" id="rd5">
                <label for="rd5" class="tab__label">Departmental Clearance</label>
                <div class="tab__content">
                    <>Minimum four passport photographs, JAMB Addmission letter, JAMB result, O' Level result,
                        Attestation
                        letter,Lasu screening result,anti cultism oath form,profile folder.
                        Departmental clearance is done at the departmental office.
                        </p>
                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12347.567125383011!2d3.1815945791023417!3d6.466286567438156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b86967059d5bd%3A0x5e6dc029dd805d6a!2sFaculty%20Of%20Science!5e1!3m2!1sen!2sng!4v1727666578035!5m2!1sen!2sng"
                            target="blank">
                            <button>
                                <span>Visit Map</span>
                            </button>
                        </a>
                </div>
            </div>

        </section>
    </div>

    <div class="copyright">
        &copy; 2024 TheUniGuide. All rights reserved.
    </div>
    <script src="../script.js"></script>
</body>

</html>