<?php
include 'db.php';

$sql = "SELECT * FROM sales ORDER BY sale_date DESC, id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Sales Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-custom {
            border-radius: 6px;
            font-weight: 500;
            padding: 6px 18px;
            font-size: 15px;
        }
        .btn-add {
            background-color: #007bff;
            color: #fff;
        }
        .btn-add:hover {
            background-color: #0056b3;
        }
        .btn-back {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        .card-style {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .action-btns .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body class="container py-5">

    <div class="card-style">
        <h2 class="mb-4 text-center">Sales Records</h2>

        <div class="d-flex justify-content-between mb-3">
            <a href="index.php" class="btn btn-back btn-custom">Back</a>
            <a href="add-sale.php" class="btn btn-add btn-custom">+ Add Sale</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price (per unit)</th>
                        <th>Total</th>
                        <th>Category</th>
                        <th>Sale Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $counter = 1;
                if ($result->num_rows > 0):
                    while($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $counter++ ?></td>
                        <td><?= htmlspecialchars($row["product_name"]) ?></td>
                        <td><?= $row["quantity"] ?></td>
                        <td><?= number_format($row["price"], 2) ?>฿</td>
                        <td><?= number_format($row["quantity"] * $row["price"], 2) ?>฿</td>
                        <td><?= htmlspecialchars($row["category"]) ?></td>
                        <td><?= $row["sale_date"] ?></td>
                        <td class="action-btns">
                            <a href="edit-sale.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete-sale.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php
                    endwhile;
                else:
                ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">No sales records found.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
