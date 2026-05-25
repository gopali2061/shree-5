<?php
include "security_headers.php";
include "config/db.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$totalEvents = $conn->query("SELECT COUNT(*) AS total FROM events")->fetch_assoc()["total"];
$totalJoined = 0;
$upcomingEvents = $conn->query("SELECT * FROM events ORDER BY event_date ASC LIMIT 3");
?>

<?php include "includes/header.php"; ?>

<div class="dashboard-hero">
    <div>
        <h1>Welcome back 👋</h1>
        <p>Your student engagement dashboard. Find events, join activities, and stay involved on campus.</p>
        <a href="events.php" class="btn-primary">Browse Events</a>
    </div>
</div>

<div class="dashboard-stats">
    <div class="stat-card">
        <h2><?php echo $totalEvents; ?></h2>
        <p>Total Events Available</p>
    </div>

    <div class="stat-card">
        <h2><?php echo $totalJoined; ?></h2>
        <p>Events You Joined</p>
    </div>

    <div class="stat-card">
        <h2>Campus</h2>
        <p>Engagement Hub</p>
    </div>
</div>

<div class="dashboard-section">
    <h2>Upcoming Events</h2>

    <div class="event-preview-grid">
        <?php if ($upcomingEvents->num_rows > 0): ?>
            <?php while ($event = $upcomingEvents->fetch_assoc()): ?>
                <div class="event-preview-card">
                    <h3><?php echo htmlspecialchars($event["title"]); ?></h3>
                    <p><?php echo htmlspecialchars($event["description"]); ?></p>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($event["event_date"]); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($event["location"]); ?></p>
                    <a href="events.php" class="small-btn">View Event</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No events available yet.</p>
        <?php endif; ?>
    </div>
</div>

<div class="dashboard-section">
    <h2>How This Website Helps Students</h2>

    <div class="info-grid">
        <div class="info-card">
            <h3>Discover</h3>
            <p>Students can quickly find activities happening around the university.</p>
        </div>

        <div class="info-card">
            <h3>Participate</h3>
            <p>The join feature encourages students to take part in events and societies.</p>
        </div>

        <div class="info-card">
            <h3>Engage</h3>
            <p>The platform supports better student involvement and campus communication.</p>
        </div>
    </div>
</div>

