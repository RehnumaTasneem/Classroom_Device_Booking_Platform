<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user'])) {
    die("Login required");
}

$u = $_SESSION['user'];
$d = $_POST['device'];
$date = $_POST['date'];
$time = $_POST['time'];

// Insert booking
$conn->query("INSERT INTO bookings (name, device, date, time_slot, status) VALUES ('{$u['name']}', '$d', '$date', '$time', 'Pending')");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Booking Confirmation</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

        body {
            background: #e3f0f1; /* Dashboard similar background */
            font-family: 'Times New Roman', Times, serif;
            color: #2f4f4f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .message-box {
            background: #f9fdfa;
            padding: 40px 50px;
            border-radius: 16px;
            box-shadow: 0 14px 35px rgba(33, 119, 115, 0.1);
            max-width: 480px;
            text-align: center;
            transition: box-shadow 0.3s ease;
        }

        .message-box:hover {
            box-shadow: 0 18px 45px rgba(0,0,0,0.15);
        }

        .message-box h2 {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(90deg, #3aafa9, #2b7a78);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 24px;
            user-select: none;
        }

        .message-box p {
            font-size: 1.5rem;
            line-height: 1.6;
            margin-bottom: 24px;
            font-weight: 600;
            color:rgb(16, 94, 92);
        }

        .highlight {
            background: linear-gradient(90deg,rgb(94, 206, 201),rgb(29, 135, 132));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 900;
            user-select: none;
        }

        .btn-back {
            background: linear-gradient(90deg, #3aafa9, #2b7a78);
            color: white;
            padding: 14px 38px;
            border: none;
            border-radius: 14px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 6px 20px rgba(58, 175, 169, 0.5);
            transition: background 0.3s ease, box-shadow 0.3s ease;
            user-select: none;
            display: inline-block;
        }

        .btn-back:hover {
            background: linear-gradient(90deg, #2b7a78, #1e4d4a);
            box-shadow: 0 8px 26px rgba(27, 94, 32, 0.7);
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h2> Booking Request Sent</h2>
        <p>Your request is <span class="highlight">now in pending</span>.</p>
        <p>We're checking availability. You'll be notified shortly.</p>
        <a href="dashboard_teacher.php" class="btn-back"> Back to Dashboard</a>
    </div>
</body>
</html>
