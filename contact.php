<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Us</title>
    <style>
        /* General styles for the page */
        body {
            font-family: 'Libre Baskerville', serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container styling for the contact form */
        .contact-container {
            background-color: skyblue;
            border-radius: 15px;
            padding: 30px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Heading styling */
        .contact-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Email, Phone, and WhatsApp section */
        .contact-item {
            margin-bottom: 20px;
        }

        .contact-item img {
            width: 30px;
            height: 30px;
        }

        .contact-item p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        /* Email, Phone, and WhatsApp links */
        .contact-item a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            font-weight: bold;
        }

        /* Copyright section */
        .copyright {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .contact-container h2 {
                font-size: 22px;
            }

            .contact-card {
                padding: 20px;
            }

            .contact-item p {
                font-size: 14px;
            }

            .icon {
                width: 25px;
                height: 25px;
            }
        }

        @media (max-width: 480px) {
            .contact-container h2 {
                font-size: 20px;
            }

            .contact-card {
                padding: 15px;
            }

            .contact-item p {
                font-size: 13px;
            }

            .icon {
                width: 20px;
                height: 20px;
            }
        }
    </style>
</head>

<body>
    <h1>Contact Us</h1>

    <div class="contact-container">

        <div class="contact-item">
            <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Email Icon">
            <p>Email</p>
            <a href="mailto:theuniguide.com.ng@gmail.com">theuniguide.com.ng@gmail.com</a>
        </div>

        <div class="contact-item">
            <img src="https://img.icons8.com/ios-filled/50/000000/phone.png" alt="Phone Icon">
            <p>Phone</p>
            <a href="tel:+2348153098694">+2348153098694</a>
        </div>

        <div class="contact-item">
            <img src="https://img.icons8.com/ios-filled/50/000000/whatsapp.png" alt="WhatsApp Icon">
            <p>WhatsApp</p>
            <a href="https://wa.me/2348176522425" target="_blank">+2348176522425</a>
        </div>

    </div>
    <div class="copyright">
        &copy; 2024 TheUniGuide. All rights reserved.
    </div>
</body>

</html>