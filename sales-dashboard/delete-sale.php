<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: view-sales.php");
    exit;
}

$id = $_GET['id'];

// ตรวจสอบก่อนลบ
$sql = "SELECT * FROM sales WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$sale = $result->fetch_assoc();

if (!$sale) {
    echo "Record not found.";
    exit;
}

// ลบข้อมูล
$sql = "DELETE FROM sales WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: view-sales.php");
    exit;
} else {
    echo "Error deleting record.";
}
?>
