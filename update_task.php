<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $task = trim($_POST["task"]);

    if (!empty($task)) {
        $sql = "UPDATE tasks SET task = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $task, $id);
        $stmt->execute();
    }
}

$conn->close();
header("Location: index.php");
exit();
 