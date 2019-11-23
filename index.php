<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = mysqli_connect( "localhost", "root", "password", "TMJ" ) or die( mysqli_connect_error() );
        mysqli_query( $conn, "SET NAMES UTF8" );
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $pswd = md5($pswd);
        $result = $conn->query("SELECT Password
                                FROM webuser
                                WHERE username = '$username' AND Password ='$pswd';");
        if($result->num_rows == 1){
            $rs = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['user'] = '134';
        }
        else{$conn->close();
        
        }
   }
   else if (isset($_SESSION['user'])){
        echo '<!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Home</title>
            </head>
            <body>
                <h1>Welcome</h1>
                <a href="logout.php">logout</a>
            </body>
        <html>';
   }
   else {
        echo '<!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Welcome to TMJ</title>
            </head>
            <body>
                <h1>Welcome</h1>
                <form method="post" action="index.php">
                    <input type="text" name="username" placeholder="username"><br>
                    <input type="password" name="pswd" placeholder="password"><br>
                    <input type="submit" value="Login">
                </form>
            </body>
        <html>';
   }
    
?>

