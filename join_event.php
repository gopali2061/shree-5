<?php
session_start();
include "config/db.php";

$event_id = $_GET["id"];
$user_id = $_SESSION["user_id"];

$sql = "INSERT INTO event_attendees (event_id, user_id)
VALUES ('$event_id', '$user_id')";

$conn->query($sql);

header("Location: events.php");
exit();
?>