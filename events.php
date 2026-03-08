<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include "includes/header.php";
include "config/db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Campus Events</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>Campus Events</h2>

<?php

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<h3>" . $row["title"] . "</h3>";
echo "<p>" . $row["description"] . "</p>";
echo "<p>Date: " . $row["event_date"] . "</p>";
echo "<a href='join_event.php?id=" . $row["id"] . "'>Join Event</a>";
echo "<a href='delete_event.php?id=" . $row["id"] . "'>Delete Event</a>";

echo "<hr>";

    }

} else {
    echo "No events available.";
}

?>

</div>

</body>
</html>