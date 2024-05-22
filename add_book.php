<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New Book</h1>
    <form action="add_book.php" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" required>
        <label for="year_published">Year Published:</label>
        <input type="number" name="year_published" id="year_published" required>
        <input type="submit" name="submit" value="Add Book">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'db_connect.php';

        $title = $_POST['title'];
        $author = $_POST['author'];
        $year_published = $_POST['year_published'];

        $sql = "INSERT INTO books (title, author, year_published) VALUES ('$title', '$author', '$year_published')";

        if ($conn->query($sql) === TRUE) {
            echo "New book added successfully";
            header("refresh:1;url=add_book.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
    <div class="btnbook">
        <a href="index.php">Back to Book List</a>
    </div>
</body>
</html>
