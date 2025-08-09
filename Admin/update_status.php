<?php 
include '../db.php';

$id = $_GET['id'];
$status = $_GET['status'];

// Update booking status
$conn->query("UPDATE bookings SET status='$status' WHERE id=$id");

// Redirect back to the bookings view
header('Location: view_bookings.php');
exit;
?>
