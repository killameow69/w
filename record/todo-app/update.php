<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE todos SET title = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $description, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM todos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $todo = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
}
?>

<?php include 'header.php'; ?>

<h2>Update Todo</h2>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
    Title: <input type="text" name="title" value="<?php echo $todo['title']; ?>" required><br>
    Description: <textarea name="description" required><?php echo $todo['description']; ?></textarea><br>
    <button type="submit">Update</button>
</form>

<?php include 'footer.php'; ?>
