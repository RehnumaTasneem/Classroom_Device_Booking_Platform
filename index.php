<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Classroom Projector & Device Booking</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            /* Background image with gradient overlay */
            background: 
                linear-gradient(135deg, rgba(226,232,240,0.8), rgba(203,213,225,0.8)),
                url('bckg.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #334155;
        }
        .container {
            background:rgba(245, 250, 250, 0.6);
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.5);
            width: 350px;
            text-align: center;
            transition: transform 0.3s ease;
            width: 600px;
        }
        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.18);
        }
        h2 {
            font-weight: 600;
            margin-bottom: 30px;
            font-size: 2rem;
            letter-spacing: 1px;
        }
        a.button {
            display: inline-block;
            width: 120px;
            padding: 12px 0;
            margin: 10px 15px;
            font-weight: 600;
            font-size: 1.2rem;
            color: #ffffff;
            background-color:rgb(30, 136, 132); /* Tailwind blue-500 */
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(59,130,246,0.4);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        a.button:hover {
            background-color:rgb(61, 191, 200); /* Tailwind blue-600 */
            box-shadow: 0 6px 12px rgba(30, 219, 229, 0.6);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Classroom Device Booking Platform</h1>
        <a class="button" href="signup.php">Register</a>
        <a class="button" href="login.php">Log In</a>
    </div>
</body>
</html>
