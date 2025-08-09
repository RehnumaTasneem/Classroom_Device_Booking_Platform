<?php 
include '../db.php';

// Fetch pending bookings
$res = $conn->query("SELECT name, device FROM bookings WHERE status='Pending'");

$req = [];

// Group users by device
while ($row = $res->fetch_assoc()) {
    if (!isset($req[$row['device']])) {
        $req[$row['device']] = [];
    }
    $req[$row['device']][] = $row['name'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deadlock Alerts</title>
    <style>
        @keyframes redGlow {
            0%, 100% {
                box-shadow: 0 0 8px 2px rgba(220, 38, 38, 0.4);
            }
            50% {
                box-shadow: 0 0 16px 4px rgba(220, 38, 38, 0.7);
            }
        }
        @keyframes greenGlow {
            0%, 100% {
                box-shadow: 0 0 8px 2px rgba(34, 197, 94, 0.4);
            }
            50% {
                box-shadow: 0 0 16px 4px rgba(34, 197, 94, 0.7);
            }
        }

        body {
    font-family: 'Times New Roman', Times, serif;
    background: linear-gradient(rgba(227, 233, 240, 0.9), rgba(199, 216, 239, 0.9)), 
                url('deadbg.png') center/cover no-repeat;
                
    margin: 0; 
    padding: 40px;
    color: #1e40af;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}

        h2 {
            font-size: 4rem;
            margin-bottom: 30px;
            color: #1e40af; /* blue-800 */
        }
        .alert {
            background: #dbeafe; /* blue-100 */
            border-left: 6px solid #dc2626; /* red-600 */
            padding: 20px 30px;
            margin: 10px 0;
            border-radius: 8px;
            width: 90%;
            max-width: 700px;
            box-shadow: 0 6px 15px rgba(220, 38, 38, 0.15); /* red shadow */
            font-size: 1.5rem;
            color: #dc2626; /* red-600 */
            animation: redGlow 2.5s ease-in-out infinite;
        }
        .alert strong {
            font-weight: 700;
            font-size: 1.5rem;
        }
        .alert strong.conflict {
            color: #dc2626; /* red-600 */
        }
        .no-deadlock {
            font-size: 1.5rem;
            font-weight: 700;
            color: #16a34a; /* green-700 */
            background:rgb(245, 246, 251); /* green-100 */
            padding: 20px 30px;
            border-left: 6px solid #16a34a; /* green-700 */
            border-radius: 8px;
            width: 90%;
            max-width: 700px;
            box-shadow: 0 6px 15px rgba(22, 163, 74, 0.3); /* green shadow */
            display: flex;
            align-items: center;
            justify-content: center;
            animation: greenGlow 2.5s ease-in-out infinite;
            margin: 10px 0;
        }
        .no-deadlock::before {
            content: "✅";
            font-size: 1.6rem;
            margin-right: 12px;
        }
        .back-link {
            margin-top: 40px;
            font-size: 1.2rem;
            color: #1e40af; /* blue-800 */
            box-shadow:rgb(32, 34, 38);
            text-decoration: none;
            font-weight: 700;
            padding: 10px 24px;
            border-radius: 10px;
            background:rgb(168, 202, 247); /* blue-100 */
            box-shadow: 0 5px 12px rgba(155, 179, 217, 0.2);
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .back-link:hover {
            background-color: #3b82f6; /* blue-500 */
            color: white;
            box-shadow: 0 8px 20px rgba(21, 60, 130, 0.6); /* deeper blue shadow */
        }
    </style>
</head>
<body>

<h2>Deadlock Alerts</h2>

<?php
$foundDeadlock = false;
foreach ($req as $device => $users) {
    if (count($users) > 1) {
        $foundDeadlock = true;

        // Prepare user list for message
        $displayUsers = [];
        $userCount = count($users);

        if ($userCount > 3) {
            // Show first 2 users + 'and others'
            $displayUsers = array_slice($users, 0, 2);
            $userListText = htmlspecialchars(implode(", ", $displayUsers)) . ", and others";
        } else {
            // Show all users separated by comma and 'and' before last user
            if ($userCount == 2) {
                $userListText = htmlspecialchars($users[0]) . " and " . htmlspecialchars($users[1]);
            } else {
                // 3 users
                $userListText = htmlspecialchars($users[0]) . ", " . htmlspecialchars($users[1]) . " and " . htmlspecialchars($users[2]);
            }
        }

        echo "<div class='alert'>";
        echo "⚠️ <strong class='conflict'>Conflict Alert:</strong> Booking conflicts found for <strong>" . htmlspecialchars($device) . "</strong> requested by " . $userListText . 
             ". Immediate action advised to prevent deadlock.";
        echo "</div>";
    }
}

if (!$foundDeadlock) {
    echo "<p class='no-deadlock'>No deadlock detected. All clear!</p>";
}
?>

<a href="dashboard_admin.php" class="back-link">Back to Dashboard</a>

</body>
</html>
