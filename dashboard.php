<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include "includes/header.php"; ?>

<div class="container">

<h2>Welcome <?php echo $_SESSION["user_name"]; ?> 👋</h2>

<p>Your role: <?php echo $_SESSION["user_role"]; ?></p>

<br>

<h3>Student Engagement Portal</h3>

<p>Use the navigation above to explore campus activities.</p>

<br>

<a href="events.php">View Campus Events</a>

</div>

</body>
</html>