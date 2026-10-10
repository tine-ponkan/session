<?php
session_start();
require "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT full_name, email, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$me = $stmt->get_result()->fetch_assoc();

$total = $conn->query("SELECT COUNT(*) AS c FROM users")->fetch_assoc()["c"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="home">
    <nav>
        <span class="brand">OurApp</span>
        <a href="logout.php" class="logout">Log out</a>
    </nav>

    <main>
        <h1>Hello, <?= htmlspecialchars($me["full_name"]) ?> 👋</h1>
        <p class="sub">You're logged in.</p>

        <div class="grid">
            <div class="stat">
                <span class="label">Your email</span>
                <strong><?= htmlspecialchars($me["email"]) ?></strong>
            </div>
            <div class="stat">
                <span class="label">Member since</span>
                <strong><?= date("M j, Y", strtotime($me["created_at"])) ?></strong>
            </div>
            <div class="stat">
                <span class="label">Registered users</span>
                <strong><?= (int)$total ?></strong>
            </div>
        </div>
    </main>
</body>
</html>
