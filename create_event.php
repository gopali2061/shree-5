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

$sql = "INSERT INTO events (title, description, event_date, created_by)
VALUES ('$title', '$description', '$date', '$user_id')";

$conn->query($sql);

echo "Event created successfully!";
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