<?php
// Database connection (edit credentials to match your setup, e.g. XAMPP defaults)
$host = "localhost";
$user = "root";
$pass = "";
$name = "login_system";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($host, $user, $pass, $name);
    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("Database connection failed. Check db.php settings.");
}
