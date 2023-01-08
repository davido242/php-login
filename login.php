<?php
    session_start();
    if(isset($_SESSION['user'])) {
        header("Location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <?php
        if(isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            require_once 'database.php';
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user) {
                if(password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = 'yes';

                    header("Location: dashboard.php");
                    die();
                }else {
                    echo "<div>Passoword Doesnt Match brov!!</div>";
                }
            }else {
                echo "<div>Email Doesnt match bro!</div>";
            }
        }
    ?>
    <div class="container">
        <form action="login.php" method="post">            
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter Email..."/>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter password.."/>
            </div>
            <div class="form-group submit login">
                <input type="submit" name="login" value="Login"/>
            </div>
        </form>
        <div class="logout-div">
            Not Registered?<a href="index.php" class="logout">Register here</a>
        </div>
    </div> 
</body>
</html>