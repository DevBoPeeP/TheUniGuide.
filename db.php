<?php
$servername = "localhost";
$username = "root"; // change this to your MySQL username
$password = ""; // change this to your MySQL password
$dbname = "projectdb";
$conn = "";

// Create connection
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (mysqli_sql_exception) {
    echo "Connection failed: ";
}

?>