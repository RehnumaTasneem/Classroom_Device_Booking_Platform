<?php 
include '../db.php';

// Handle status update
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $id = intval($_POST['id']);
        $status = $_POST['status'];
        if ($id && in_array($status, ['Approved', 'Rejected'])) {

            // Get current booking's date, time and id
            $stmt = $conn->prepare("SELECT date, time_slot, id FROM bookings WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $current = $stmt->get_result()->fetch_assoc();
            $currentDate = $current['date'];
            $currentTime = $current['time_slot'];
            $currentId = $current['id'];

            // Check if any earlier pending request exists
            $stmt = $conn->prepare("
                SELECT COUNT(*) as pending_before 
                FROM bookings 
                WHERE status = 'Pending' AND (
                    date < ? OR
                    (date = ? AND time_slot < ?) OR
                    (date = ? AND time_slot = ? AND id < ?)
                )
            ");
            $stmt->bind_param("sssssi", $currentDate, $currentDate, $currentTime, $currentDate, $currentTime, $currentId);
            $stmt->execute();
            $result = $stmt->get_result();
            $countData = $result->fetch_assoc();

            if ($countData['pending_before'] > 0) {
                echo json_encode(["success" => false, "message" => "Please process earlier bookings first (by date, time & request order)."]);
                exit;
            }

            // Update status
            $stmt = $conn->prepare("UPDATE bookings SET status=? WHERE id=?");
            $stmt->bind_param("si", $status, $id);
            $stmt->execute();
            echo json_encode(["success" => true]);
            exit;
        }
    }

    // Handle delete request
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $id = intval($_POST['id']);
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM bookings WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            echo json_encode(["success" => true]);
            exit;
        }
    }
}

// Fetch all booking requests
$r = $conn->query("SELECT * FROM bookings ORDER BY date, time_slot, id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Booking Requests</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background: #e0f2fe;
            margin: 0; padding: 30px;
            color:rgb(26, 60, 155);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        h2 {
            margin-bottom: 25px;
            color:rgb(14, 77, 144);
            font-weight: 700;
            letter-spacing: 0.05em;
            font-size: 4rem;
        }
        table {
            border-collapse: collapse;
            width: 95%;
            max-width: 1200px;
            background: white;
            box-shadow: 0 8px 20px rgba(14, 116, 144, 0.15);
            border-radius: 12px;
            overflow: hidden;
            table-layout: fixed;
        }
        th, td {
            padding: 16px 20px;
            text-align: center;
            font-size: 1.3rem;
            border-bottom: 1px solid #bae6fd;
            word-wrap: break-word;
        }
        th {
            background: linear-gradient(90deg,rgb(60, 113, 248),rgb(120, 165, 241));
            color: white;
            font-weight: 600;
            letter-spacing: 0.05em;
        }
        tr:hover {
            background-color: #bfdbfe;
        }
        td:nth-child(1) { width: 60px; }
        td:nth-child(2) { width: 150px; }
        td:nth-child(3) { width: 120px; }
        td:nth-child(4) { width: 120px; }
        td:nth-child(5) { width: 120px; }
        td:nth-child(6) { width: 120px; }
        td:nth-child(7) { width: 200px; }

        a {
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 600;
            margin: 0 4px;
            display: inline-block;
            user-select: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        a.approve {
            background-color: #bfdbfe;
            color: #1e40af;
        }
        a.approve:hover,
        a.approve:focus {
            background-color: #3b82f6;
            color: white;
            outline: none;
        }
        a.reject {
            background-color: #fecaca;
            color: #b91c1c;
        }
        a.reject:hover,
        a.reject:focus {
            background-color: #dc2626;
            color: white;
            outline: none;
        }
        a.delete {
            background-color:rgb(226, 239, 252);
            color: #1e40af;
        }
        a.delete:hover,
        a.delete:focus {
            background-color: #3b82f6;
            color: white;
        }

        .back-link {
            margin-top: 30px;
            font-size: 1.2rem;
            color:rgb(38, 63, 174);
            text-decoration: none;
            font-weight: 700;
            padding: 10px 24px;
            border-radius: 10px;
            background:rgb(186, 216, 253);
            box-shadow: 0 5px 12px rgba(14, 116, 144, 0.3);
            transition: background-color 0.3s ease, color 0.3s ease;
            user-select: none;
            display: inline-block;
        }
        .back-link:hover,
        .back-link:focus {
            background-color:rgb(2, 94, 199);
            color: white;
            outline: none;
        }
    </style>
</head>
<body>

<h2>Booking Requests</h2>
<table role="table" aria-label="Booking Requests">
    <thead>
    <tr>
        <th scope="col">Serial</th>
        <th scope="col">Name</th>
        <th scope="col">Device</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody id="booking-body">
    <?php 
    $serial = 1;
    while ($row = $r->fetch_assoc()) { 
    ?>
        <tr id="row-<?php echo $row['id']; ?>">
            <td><?php echo $serial++; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['device']); ?></td>
            <td><?php echo htmlspecialchars($row['date']); ?></td>
            <td><?php echo htmlspecialchars($row['time_slot']); ?></td>
            <td class="status"><?php echo htmlspecialchars($row['status']); ?></td>
            <td class="action-cell">
                <?php if ($row['status'] === 'Pending') { ?>
                    <a href="#" class="approve" onclick="updateStatus(<?php echo $row['id']; ?>, 'Approved')" aria-label="Approve request">Approve</a>
                    <a href="#" class="reject" onclick="updateStatus(<?php echo $row['id']; ?>, 'Rejected')" aria-label="Reject request">Reject</a>
                <?php } else { ?>
                    <a href="#" class="delete" onclick="deleteRequest(<?php echo $row['id']; ?>)" aria-label="Delete request">Delete</a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<a href="dashboard_admin.php" class="back-link" aria-label="Back to admin dashboard">Back to Dashboard</a>

<script>
function updateStatus(id, status) {
    if (!confirm("Are you sure to " + status + " this request?")) return;

    fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
            action: "update",
            id: id,
            status: status
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const row = document.getElementById("row-" + id);
            row.querySelector(".status").innerText = status;
            row.querySelector(".action-cell").innerHTML = `<a href="#" class="delete" onclick="deleteRequest(${id})" aria-label="Delete request">Delete</a>`;
        } else {
            alert(data.message || "Failed to update status.");
        }
    });
}

function deleteRequest(id) {
    if (!confirm("Do you want to delete this request?")) return;

    fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
            action: "delete",
            id: id
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const row = document.getElementById("row-" + id);
            row.remove();
            updateSerialNumbers();
        }
    });
}

function updateSerialNumbers() {
    let serial = 1;
    document.querySelectorAll("#booking-body tr").forEach(row => {
        row.querySelector("td:first-child").innerText = serial++;
    });
}
</script>

</body>
</html>
