<?php include_once 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Manager</title>
</head>
<body>
    <table>
        <tr>
            <td width="50%">
            <h1>Dodaj knjigu:</h1>
            <form action="" method="post" novalidate enctype="multipart/form-data" >
            <p>
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" required>
                    </p>
                    <p>
                        <label for="author">Author:</label>
                        <input type="text" name="author" id="author" required>
                    </p>
                    <p>
                        <label for="year">Year:</label>
                        <input type="number" name="year" id="year" required>
                    </p>

                    <p>
                        <button type="submit">Add Book</button>
                    </p>

            </form>

            <?php
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $title = htmlentities($_POST["title"]);
                        $author = htmlentities($_POST["author"]);
                        $year = htmlentities($_POST["year"]);

                        addBook($title, $author, $year);
                    }
                    

                ?>

                <h2>Books</h2>
                <?php
                $books = loadBooks();
                if($books): 
                ?>
                <table width="100%">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                    </tr>
                    <?php foreach($books as $book): ?>
                        <tr>
                            <td><?php echo $book['title'] ?></td>
                            <td><?php echo $book['author'] ?></td>
                            <td><?php echo $book['year'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </table>
                <?php else: ?>
                    <p>No books!</p>
                <?php endif ?>

            </td>
            <td width="50%"></td>
        </tr>
    </table>
</body>
</html>