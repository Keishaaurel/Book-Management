<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM books WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Book deleted successfully";
    } else {
        echo "Error deleting book: " . $conn->error;
    }
}

$conn->close();
header("Location: index.php");
exit();
?>
