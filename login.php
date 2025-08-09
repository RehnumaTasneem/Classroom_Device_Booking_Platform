<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
       body {
    font-family: 'Times New Roman', Times, serif;
    background: 
        linear-gradient(to bottom right, rgba(127, 192, 200, 0.5), rgba(241, 248, 233, 0.85)),
        url('login.png') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #333;
}
        .login-box {
            background:  rgba(238, 242, 243, 0.6);
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 25px;
            color: #444;
            font-size: 2rem;
        }
        input[type="text"], input[type="password"] {
            width: 85%;
            
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }
        input[type="submit"] {
            font-family: 'Times New Roman', Times, serif;
            background-color:rgb(39, 140, 176);
            color: white;
            border: none;
            padding: 10px 20px;
            width: 50%;
            margin-top: 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
        }
        input[type="submit"]:hover {
            background-color:rgb(109, 196, 247);
        }
        .error {
            color: red;
            margin-top: 15px;
            font-size: 14px;
        }
        .signup-link {
            margin-top: 20px;
            font-size: 14px;
        }
        .signup-link a {
            color:rgb(21, 142, 130);
            text-decoration: none;
            font-weight: bold;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Enter username" required><br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <input type="submit" value="Login">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $u = $_POST['username'];
        $p = $_POST['password'];
        $res = $conn->query("SELECT * FROM users WHERE username='$u' AND password='$p'");
        if ($res->num_rows > 0) {
            $user = $res->fetch_assoc();
            $_SESSION['user'] = $user;
            if ($user['role'] === 'admin') {
                header('Location: admin/dashboard_admin.php');
            } else {
                header('Location: dashboard_teacher.php');
            }
        } else {
            echo "<div class='error'>Invalid login credentials.</div>";
        }
    }
    ?>
    <div class="signup-link">
        Don't have an account? <a href="signup.php">Sign up</a>
    </div>
</div>
</body>
</html>
