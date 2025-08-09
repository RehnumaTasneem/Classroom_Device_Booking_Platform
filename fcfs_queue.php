<?php 
include 'db.php';
$r = $conn->query("SELECT * FROM bookings ORDER BY date, time_slot");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Queue - Teacher Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

        body {
            margin: 0;
            font-family:'Times New Roman', Times, serif;
            background: #e3f0f1;
            color: #2f4f4f;
            padding: 40px 20px;
            text-align: center;
        }

        h2 {
            color: #2a4d49;
            font-size: 4rem;
            font-weight: 600;
            margin-bottom: 30px;
            background: linear-gradient(90deg, #3aafa9, #2b7a78);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 900px;
            background: #f9fdfa;
            border-radius: 14px;
            box-shadow: 0 14px 35px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: box-shadow 0.3s ease;
        }

        table:hover {
            box-shadow: 0 18px 45px rgba(0,0,0,0.15);
        }

        th, td {
            padding: 15px 18px;
            border-bottom: 1px solid #b5ded8;
            text-align: center;
            font-weight: 500;
            font-size: 1.3rem;
            transition: background-color 0.3s ease;
        }

        th {
            background: linear-gradient(90deg, #3aafa9, #2b7a78);
            color: white;
            font-weight: 700;
            letter-spacing: 0.05em;
        }

        tr:hover td {
            background-color: #e1f7f6;
        }

        a.back {
            display: inline-block;
            margin: 30px auto 0;
            padding: 12px 28px;
            background: linear-gradient(90deg, #3aafa9, #2b7a78);
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(58, 175, 169, 0.4);
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        a.back:hover {
            background: linear-gradient(90deg, #2b7a78, #1e4d4a);
            box-shadow: 0 6px 18px rgba(27, 94, 32, 0.6);
        }
    </style>
</head>
<body>

<h2>Device Booking Queue</h2>

<table>
    <thead>
        <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>Device</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $serial = 1;
    while ($row = $r->fetch_assoc()) { ?>
        <tr>
            <td><?= $serial++ ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['device']) ?></td>
            <td><?= htmlspecialchars($row['date']) ?></td>
            <td><?= htmlspecialchars($row['time_slot']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<a href="dashboard_teacher.php" class="back">Back to Dashboard</a>

</body>
</html>
