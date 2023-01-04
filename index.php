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
    <div class="container">
        <form action="login.php" method="post">
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