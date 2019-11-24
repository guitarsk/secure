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
        <a href="logout.php">logout</a>
        <br><br><br><br>
        <form action="cmdexec.php" method="post">
            <h2>Try Ping!</h2><br>
            <input type="text" name="cmd">
            <button type="submit">send</button>
        </form>

        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cmd'])) {
                $target = $_POST['cmd'];
                // Set blacklist
                $substitutions = array(
                    '&&' => '',
                    ';'  => '',
                    '|'  => '',
                    '||' => '',
                    '!'  => ';',
                    '%'  => '&&',
                    '@'  => '|',
                    'wget' => '',
                    'locate' => '',
                    'find' => '',
                    '-la' => '',
                    '-al' => '',
                );
                // Remove any of the charactars in the array (blacklist).
                $target = str_replace( array_keys( $substitutions ), $substitutions, $target );
                
                $cmd = shell_exec( 'ping  -c 3 ' . $target );
                
                // Feedback for the end user
                $html .= "<pre>{$cmd}</pre>";
            }
        ?>
        </div>
    </body>
</html>