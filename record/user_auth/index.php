<!-- index.php -->
<?php include 'header.php'; ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<div class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <a href="logout.php">Logout</a>
</div>

<?php include 'footer.php'; ?>
