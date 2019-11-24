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
        <br><br><a href="logout.php">logout</a>
        </div>
    </body>
</html>