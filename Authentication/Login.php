<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="LoginStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'/>
</head>
<body>
    <div class="wrapper">
        <form action="User_Reg_DB.php" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="remember-forgot">
                
                <label><input type="checkbox">Remember Me</label>
               
            </div>

            <button type="submit" class="btn" name="btnSubmit" value="UserLogin">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="Register.html">Register</a></p>
            </div>

            <?php
            if(isset($_SESSION['err']))
            {
                if($_SESSION['message'] != '')
                {
                    echo "<p style='color:red'>".$_SESSION['message']. "</p>";
                    unset($_SESSION["message"]);
                    unset($_SESSION["err"]);
                }
            }
            ?>

    
        </form>
    </div>
</body>
</html>