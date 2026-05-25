<?php
include "security_headers.php";
include "config/db.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$name = "";
$course = "";
$interests = "";
$bio = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $course = $_POST["course"];
    $interests = $_POST["interests"];
    $bio = $_POST["bio"];

    $message = "Profile updated successfully!";
}
?>

<?php include "includes/header.php"; ?>

<div class="dashboard-page">

    <section class="hero">
        <span class="badge">Student Profile</span>
        <h1>Your Profile 👤</h1>
        <p>Customise your student profile so other students can learn more about you and connect with similar interests.</p>
    </section>

    <div class="section-card">

        <?php if($message != ""): ?>
            <div class="card">
                <h3><?php echo $message; ?></h3>
            </div>
        <?php endif; ?>

        <form method="POST">

            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your name">

            <label>Course</label>
            <input type="text" name="course" placeholder="e.g Computer Science">

            <label>Interests</label>
            <input type="text" name="interests" placeholder="e.g Gaming, Football, Coding">

            <label>Bio</label>
            <textarea name="bio" rows="5" placeholder="Write something about yourself"></textarea>

            <button type="submit">Save Profile</button>

        </form>

    </div>

    <?php if($name != ""): ?>

    <div class="section-card">

        <h2>Public Profile Preview</h2>

        <div class="card-grid">

            <div class="card">
                <h3>Name</h3>
                <p><?php echo htmlspecialchars($name); ?></p>
            </div>

            <div class="card">
                <h3>Course</h3>
                <p><?php echo htmlspecialchars($course); ?></p>
            </div>

            <div class="card">
                <h3>Interests</h3>
                <p><?php echo htmlspecialchars($interests); ?></p>
            </div>

        </div>

        <div class="card" style="margin-top:20px;">
            <h3>Bio</h3>
            <p><?php echo htmlspecialchars($bio); ?></p>
        </div>

    </div>

    <?php endif; ?>

    <div class="section-card">

        <h2>Why Profiles Improve Student Engagement</h2>

        <div class="card-grid">

            <div class="card">
                <h3>Meet Students</h3>
                <p>Students can connect with others who share similar interests and hobbies.</p>
            </div>

            <div class="card">
                <h3>Build Community</h3>
                <p>Profiles help create a more social and interactive university platform.</p>
            </div>

            <div class="card">
                <h3>Improve Communication</h3>
                <p>Students can express themselves and become more involved in campus life.</p>
            </div>

        </div>

    </div>

</div>