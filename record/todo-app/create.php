<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO todos (title, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<?php include 'header.php'; ?>

<h2>Create Todo</h2>
<form method="POST" action="">
    Title: <input type="text" name="title" required><br>
    Description: <textarea name="description" required></textarea><br>
    <button type="submit">Create</button>
</form>

<?php include 'footer.php'; ?>
