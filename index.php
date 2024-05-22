<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Book Management System</h1>
    <div class="btnbook">
        <a href="add_book.php">Add New Book</a>
    </div>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Year Published</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'db_connect.php';
        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["author"] . "</td>
                    <td>" . $row["year_published"] . "</td>
                    <td>
                        <a href='edit_book.php?id=" . $row["id"] . "'>Edit</a> |
                        <a href='delete_book.php?id=" . $row["id"] . "'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No books found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
