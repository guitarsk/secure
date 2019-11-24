<?php
    session_start();
    if (isset($_SESSION['user'])){

    }
    else {
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TMJ</title>
        <link href="main.css" rel="stylesheet">
    </head>
    <body>
        <div class="show">
        <h1>MENU</h1><br><br>
        <a href='upload.php'>upload</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href='cmdexec.php'>ping</a> 
        <br><br><a href="logout.php">logout</a><br><br><br><br>
        <form enctype="multipart/form-data" action="upload.php" method="post">
            <h2>Upload your image</h2><br>
            <input type="file" name="pic"><br>
            <button type="submit">upload</button>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pic']['name'])) {
                echo '<br><br> upload '.$_FILES['pic']['name'].' complete.';
            }
        ?>
        </div>
    </body>
</html>
