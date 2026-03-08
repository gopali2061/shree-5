<?php
include "config/db.php";

$id = $_GET["id"];

$sql = "DELETE FROM events WHERE id=$id";

$conn->query($sql);

header("Location: events.php");
exit();
?>