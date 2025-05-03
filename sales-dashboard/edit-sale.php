<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: view-sales.php"); // กลับหน้าหลักหากไม่มี id
    exit;
}

$id = $_GET['id'];
$error = '';
$success = '';

// อ่านข้อมูลเดิม
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

// บันทึกการแก้ไข
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $sale_date = $_POST['sale_date'];

    if (!$product_name || !$quantity || !$price || !$category || !$sale_date) {
        $error = "Please fill in all fields.";
    } else {
        $sql = "UPDATE sales SET product_name=?, quantity=?, price=?, category=?, sale_date=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sidssi", $product_name, $quantity, $price, $category, $sale_date, $id);
        if ($stmt->execute()) {
            $success = "Record updated successfully.";
            header("Location: view-sales.php");
            exit;
        } else {
            $error = "Error updating record.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="mb-4">Edit Sale Record</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="<?= htmlspecialchars($sale['product_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="<?= $sale['quantity'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="<?= $sale['price'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="<?= htmlspecialchars($sale['category']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Sale Date</label>
            <input type="date" name="sale_date" class="form-control" value="<?= $sale['sale_date'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="view-sales.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
