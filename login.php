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
    <div>
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
                        echo "<div class=''>$error</div>";
                    }
                }else {

                }
            }
        ?>
    </div>    
</body>
</html>