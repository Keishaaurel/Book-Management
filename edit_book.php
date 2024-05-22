<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Book</h1>
    <?php
    include 'db_connect.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM books WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="edit_book.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>" required>
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" value="<?php echo $row['author']; ?>" required>
                <label for="year_published">Year Published:</label>
                <input type="number" name="year_published" id="year_published" value="<?php echo $row['year_published']; ?>" required>
                <input type="submit" name="submit" value="Update Book">
            </form>
            <?php
        } else {
            echo "Book not found.";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year_published = $_POST['year_published'];

        $sql = "UPDATE books SET title='$title', author='$author', year_published='$year_published' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Book updated successfully";
        } else {
            echo "Error updating book: " . $conn->error;
        }

        $conn->close();
        header("Location: index.php");
        exit();
    }
    ?>
    <div class="btnbook">
        <a href="index.php">Back to Book List</a>
    </div>
</body>
</html>
