<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = mysqli_connect( "localhost", "root", "password", "TMJ" ) or die( mysqli_connect_error() );
        mysqli_query( $conn, "SET NAMES UTF8" );
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        if ($pswd == 'p@ssw0rd') {
            $pswd = base64_encode(pswd);
            echo '<script>alert("You need to encrypt your password first")
                </script>';
            $trap = true;
        }
        else {
            $pswd = base64_decode(pswd);
            $trap = false;
        }
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
        header("location: home.php");
   }
   else {
        $body = '<!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Welcome to TMJ</title>
                <link href="main.css" rel="stylesheet">
            </head>
            <body>
                <div class="show">
                <h1>Welcome</h1>
                <form method="post" action="TMJLogin.php">
                    <input type="text" name="username" placeholder="username"><br>
                    <input type="password" name="pswd" placeholder="password"><br>
                    <input type="submit" value="Login">
                </form>';
            if($trap == true){
                
                $body = $body.'<h6 onclick="alert(atob(btoa("Example")))">Click to see Example</h6>';
            }
        $body = $body.'</div>
            </body>
        </html>';
   }
?>

