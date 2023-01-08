<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="">
        <?php
            require_once 'database.php';
            // echo $name;
            echo "<h1>Dashboard</h1>";
        ?>
        <div class="logout-div">
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </div>
</body>
</html>