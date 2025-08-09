<?php 
session_start(); 
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die('Access denied');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
<style>
    * {
        box-sizing: border-box;
    }
    body {
        margin: 0;
        font-family: 'Times New Roman', Times, serif;
        background: linear-gradient(135deg, rgba(226,232,240,0.8), rgba(203,213,225,0.8)),
                    url('adminbg.png') no-repeat center center fixed;
        background-size: cover;
        color: #2c3e50;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        line-height: 1.5;
    }

    .navbar {
        background: linear-gradient(135deg, rgba(126, 176, 241, 0.8), rgba(46, 120, 211, 0.8));
        background-size: 600% 600%;
        animation: gradientShift 10s ease infinite;
        color: white;
        padding: 24px 40px;
        font-size: 2.5rem;
        font-weight: 700;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.6);
        text-align: center;
        letter-spacing: 1.2px;
        user-select: none;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .container {
        flex: 1;
        max-width: 500px;
        margin: 60px auto 80px;
        background: rgba(218, 232, 246, 0.9);
        box-shadow: 0 14px 30px rgba(59, 130, 246, 0.25);
        padding: 40px 30px;
        border-radius: 16px;
        text-align: center;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0 0 35px;
    }

    ul li {
        margin: 20px 0;
    }

    ul li a {
        display: inline-block;
        padding: 14px 50px;
        font-size: 1.4rem;
        font-weight: 600;
        border-radius: 12px;
        background: linear-gradient(135deg, #93c5fd, #3b82f6);
        color: white;
        text-decoration: none;
        box-shadow: 0 6px 18px rgba(59, 130, 246, 0.35);
        transition: all 0.35s ease;
    }

    ul li a:hover {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        transform: scale(1.05);
        box-shadow: 0 12px 30px rgba(37, 99, 235, 0.7);
    }

    .logout {
        display: inline-block;
        padding: 14px 50px;
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        color: white;
        font-weight: 700;
        font-size: 1.05rem;
        border-radius: 12px;
        text-decoration: none;
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.6);
        transition: all 0.35s ease;
    }

    .logout:hover {
        background: linear-gradient(135deg, #1e40af, #1e3a8a);
        transform: scale(1.06);
        box-shadow: 0 14px 40px rgba(30, 58, 138, 0.9);
    }

    /* Updated footer styling */
    footer.footer {
        background-color: rgba(207, 224, 246, 0.85);
        padding: 18px 0;
        text-align: center;
        font-size: 1rem;
        color: #1e40af;
        margin-top: auto;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.8);
        user-select: none;

        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }

    .footer .contact-text {
        font-weight: 600;
        font-size: 1rem;
    }

    .footer .social-icons {
        display: flex;
        gap: 16px;
    }

    .footer .social-icons a {
        color: #1e40af;
        transition: color 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .footer .social-icons a:hover {
        color: #2563eb;
    }

    .footer .social-icons svg {
        width: 24px;
        height: 24px;
        fill: currentColor;
    }

    @media (max-width: 600px) {
        .container {
            margin: 40px 20px 60px;
            padding: 30px 20px;
            max-width: 90vw;
        }

        ul li a, .logout {
            padding: 12px 35px;
            font-size: 1rem;
        }
    }
</style>
</head>
<body>

<div class="navbar">Admin Dashboard</div>

<main class="container">
    <ul>
        <li><a href="view_bookings.php">View Bookings</a></li>
        <li><a href="deadlock_alerts.php">Deadlock Alerts</a></li>
    </ul>
    <a href="logout.php" class="logout">Logout</a>
</main>

<footer class="footer" role="contentinfo">
    <div class="contact-text">Contact Us</div>
    <div class="social-icons">
        <a href="https://www.facebook.com/iiuc.ac.bd" target="_blank" aria-label="Facebook" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24h11.49v-9.294H9.691v-3.622h3.124V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.794.715-1.794 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.407 24 24 23.407 24 22.676V1.325C24 .593 23.407 0 22.675 0z"/>
            </svg>
        </a>
        <a href="https://www.iiuc.ac.bd/" target="_blank" aria-label="Google" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path d="M21.805 10.023h-9.81v3.954h5.627c-.235 1.44-1.458 4.227-5.627 4.227-3.387 0-6.146-2.807-6.146-6.266s2.759-6.266 6.146-6.266c1.923 0 3.211.82 3.954 1.528l2.697-2.605C16.16 5.303 14.175 4.51 11.994 4.51 6.737 4.51 2.5 8.887 2.5 14.145s4.237 9.635 9.494 9.635c5.471 0 9.107-3.847 9.107-9.269 0-.625-.066-1.099-.296-1.488z"/>
            </svg>
        </a>
    </div>
    <div>&copy; <?php echo date("Y"); ?> IIUC | All rights reserved</div>
</footer>

</body>
</html>
