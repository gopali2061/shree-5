<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include "includes/header.php";
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $user_id = $_SESSION["user_id"];

    // ✅ Prepared statement (fixes your SQL error)
    $stmt = $conn->prepare("INSERT INTO events (title, description, event_date, created_by) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $title, $description, $date, $user_id);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Event created successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

    <h2>Create Campus Event</h2>

    <form method="POST">

        <p>Title</p>
        <input type="text" name="title" required>

        <p>Description</p>
        <textarea name="description" required></textarea>

        <p>Date</p>
        <input type="date" name="date" required>

        <br><br>

        <button type="submit">Create Event</button>

    </form>

</div>

</body>
</html>