<?php 
include 'db.php'; 
session_start(); 
if (!isset($_SESSION['user'])) die("Login required"); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

      body {
    margin: 0;
    font-family: 'Times New Roman', Times, serif;
    /* Add linear gradient overlay + background image */
    background: 
     linear-gradient(rgba(244, 252, 252, 0.85), rgba(222, 232, 232, 0.85))
,
      url('teachbg.png') no-repeat center center fixed;
    background-size: cover;
    animation: fadeIn 0.6s ease-in-out;
    color: #e0f0ef; /* lighter text for contrast */
    position: relative;
    overflow-x: hidden;
}

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .navbar {
            background: linear-gradient(90deg,rgb(81, 203, 197), #2b7a78);
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.12);
            position: relative;
            z-index: 10;
        }
        

        .navbar .title {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1.2px;
        }

        .navbar .links a {
            color: #d9f0f0;
            text-decoration: none;
            margin-left: 25px;
            font-size: 1.3rem;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background 0.3s ease;
        }


        .navbar .links a:hover {
            background: rgba(255,255,255,0.15);
            color: #e0ffff;
        }

        .container {
            max-width: 620px;
            margin: 60px auto 40px;
            background:rgba(233, 243, 235, 0.7); /* semi-transparent */
            padding: 45px 40px;
            border-radius: 14px;
    /* Enhanced shadow for stronger highlight */
    box-shadow: 
        0 8px 24px rgba(79, 77, 77, 0.25),   /* main soft shadow */
        0 0 15px 5px rgba(58, 175, 169, 0.4); /* subtle teal glow */
            position: relative;
            z-index: 10;
        }

        .welcome {
            font-size: 1.5rem;
            margin-bottom: 28px;
            color:rgb(46, 103, 96);
            text-align: center;
            font-weight: 600;
        }

        select, input[type="date"], input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 14px;
            margin: 16px 0;
            border: 1.5px solid #a2d5c6;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            color: #2f4f4f;
            background: #f0fcf9;
        }

        select:hover, input:hover, select:focus, input:focus {
            outline: none;
            border-color: #3aafa9;
            box-shadow: 0 0 8px rgba(58,175,169,0.5);
            background: #e1f7f6;
        }

        input[type="submit"] {
            background: #3aafa9;
            color: white;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.15s ease;
        }

        input[type="submit"]:hover {
            background: #2b7a78;
            transform: translateY(-2px);
        }

        .footer {
            text-align: center;
            padding: 25px 15px 10px;
            font-size: 1rem;
            color: #557f7a;
            background: #d0e8e6;
            border-top: 1px solid #b2d8d5;
            position: relative;
            z-index: 10;
        }

        /* Social icons container */
        .social-icons {
            margin: 15px 0 8px;
            display: flex;
            justify-content: center;
            gap: 24px;
        }

        .social-icons a {
            display: inline-block;
            width: 32px;
            height: 32px;
            color: #2f4f4f;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #3aafa9;
        }

        .social-icons svg {
            width: 100%;
            height: 100%;
            fill: currentColor;
        }

        .footer .contact-text {
            font-weight: 600;
            margin-bottom: 8px;
            color: #20504f;
        }

    </style>
</head>
<body>

<div class="navbar">
    <div class="title">Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?></div>
    <div class="links">
        <a href="dashboard_teacher.php">Dashboard</a>
        <a href="fcfs_queue.php">Booking Queue</a>
        <a href="logout.php">Logout</a>
    </div>
</div>


<div class="container">
    
    <div class="welcome">Select your device and book your slot.</div>
    <form action="process_booking.php" method="POST">
        <select name="device" required>
            <option value="">-- Select Device --</option>
            <option value="Projector">Projector</option>
            <option value="Laptop">Laptop</option>
        </select>
        <input type="date" name="date" required>
        <input type="text" name="time" placeholder="e.g., 10:00 - 11:00" required>
        <input type="submit" value="Book Now">
    </form>
</div>

<div class="footer">
    <div class="contact-text">Contact Us</div>
    <div class="social-icons">
        <a href="https://www.facebook.com/iiuc.ac.bd" target="_blank" aria-label="Facebook">
            <svg viewBox="0 0 24 24"><path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24h11.49v-9.294H9.691v-3.622h3.124V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.794.715-1.794 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.407 24 24 23.407 24 22.676V1.325C24 .593 23.407 0 22.675 0z"/></svg>
        </a>
        <a href="https://www.iiuc.ac.bd/" target="_blank" aria-label="Google">
            <svg viewBox="0 0 24 24"><path d="M21.805 10.023h-9.81v3.954h5.627c-.235 1.44-1.458 4.227-5.627 4.227-3.387 0-6.146-2.807-6.146-6.266s2.759-6.266 6.146-6.266c1.923 0 3.211.82 3.954 1.528l2.697-2.605C16.16 5.303 14.175 4.51 11.994 4.51 6.737 4.51 2.5 8.887 2.5 14.145s4.237 9.635 9.494 9.635c5.471 0 9.107-3.847 9.107-9.269 0-.625-.066-1.099-.296-1.488z"/></svg>
        </a>
    </div>
    &copy; <?php echo date("Y"); ?> IIUC | All rights reserved
</div>

</body>
</html>
