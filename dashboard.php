<?php
session_start();
include "config/db.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Engagement Portal</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<nav>
<a href="dashboard.php">Dashboard</a>
<a href="events.php">Events</a>
<a href="create_event.php">Create Event</a>
<a href="logout.php">Logout</a>
</nav>

<div class="container">

<h1>Student Engagement Portal</h1>
<p>Discover activities happening on campus and increase student engagement.</p>

<?php
$eventCountQuery = "SELECT COUNT(*) AS total FROM events";
$countResult = $conn->query($eventCountQuery);
$countRow = $countResult->fetch_assoc();
?>

<div class="stats-box">
<h3>Total Events Available: <?php echo $countRow['total']; ?></h3>
</div>

<h2>Upcoming Events</h2>

<?php

$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo "<div class='event-card'>";

        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p><strong>Date:</strong> " . $row['event_date'] . "</p>";

        echo "<a class='button' href='join_event.php?id=" . $row['id'] . "'>Join Event</a> ";
        echo "<a class='button delete' href='delete_event.php?id=" . $row['id'] . "'>Delete Event</a>";

        echo "</div>";
    }

} else {

    echo "<p>No events currently available. Be the first to create one!</p>";

}

?>

<br>

<h2>Quick Actions</h2>

<div class="quick-actions">

<a class="button" href="events.php">View All Events</a>

<a class="button" href="create_event.php">Create New Event</a>

</div>

</div>

</body>
</html>