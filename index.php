<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login with PHP</title>
</head>
<body>
    <?php
        if(isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat-password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();
            
            if(empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
                array_push($errors, "All Fields are required");
            }else {
                echo "Welcome to your dashboard $fullName <br>";
                echo "Your email is: $email";
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not Valid");
            }

            if(strlen($password) < 8 ) {
                array_push($errors, "Password must be atleast 8 characters long!");
            }

            if($password !== $passwordRepeat) {
                array_push($errors, "Password must match bro!");
            }

            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div class='warning'>$error</div>";
                }
            }else {
                require_once "database.php";

                $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparedStmt = mysqli_stmt_prepare($stmt, $sql);

                if($preparedStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);

                    echo "<div>You are Registered Bro</div>";
                }else {
                    die("Something went Wrong Brov!!");
                }
            }
        }
    ?>
    <div class="container">
        <form action="index.php" method="post">
            <div class="form-group">
                <input type="text" name="fullname" placeholder="Full Name:"/>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email:"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="password"/>
            </div>
            <div class="form-group">
                <input type="password" name="repeat-password" placeholder="Repeat password:"/>
            </div>
            <div class="form-group submit">
                <input type="submit" name="submit" value="Submit"/>
            </div>
        </form>
    </div>
    
</body>
</html>