<!-- signup.php -->
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Sign Up</title>
    <style>
        body {
    font-family: 'Times New Roman', Times, serif;
    background: 
        linear-gradient(to right, rgba(184, 253, 250, 0.6), rgba(249, 247, 247, 0.5)),
        url('sign.png') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #333;
}
        .signup-box {
            background: rgba(244, 244, 245, 0.6);
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 25px;
            color: #222;
            font-size:2rem;
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
            background-color:rgb(18, 133, 125);
            font-family: 'Times New Roman', Times, serif;
            color: white;
            border: none;
            padding: 10px 20px;
            width: 50%;
            margin-top: 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
        }
        input[type="submit"]:hover {
            background-color:rgb(42, 165, 159);
        }
        .message {
            margin-top: 15px;
            color:rgb(22, 64, 163);
            font-size: 14px;
        }
        .login-link {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .login-link a {
            color:rgb(24, 112, 179);
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="signup-box">
    <h2>  Register Here</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Your full name" required><br>
        <input type="text" name="username" placeholder="Choose a username" required><br>
        <input type="password" name="password" placeholder="Create a password" required><br>
        <input type="submit" value="Register">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn->query("INSERT INTO users (name, username, password, role) VALUES ('$name', '$username', '$password', 'teacher')");
        echo "<div class='message'>Registered successfully! <a href='login.php'>Login</a></div>";
    }
    ?>
    <div class="login-link">
        Already have an account? <a href="login.php">Login here</a>
    </div>
</div>

</body>
</html>
