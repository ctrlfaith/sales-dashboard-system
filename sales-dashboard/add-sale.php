<!DOCTYPE html>
<html>
<head>
    <title>Add Sale</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .card {
            width: 500px;
            margin: 60px auto;
            padding: 25px 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #222;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #444;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            box-sizing: border-box;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .button {
            padding: 8px 20px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
        }

        .button.save {
            background-color: #007bff;
            color: white;
        }

        .button.save:hover {
            background-color: #0056b3;
        }

        .button.back {
            background-color: #6c757d;
            color: white;
        }

        .button.back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Add Sale Record</h2>
    <form action="save-sale.php" method="post">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" required>

        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" min="1" required>

        <label for="price">Price per Unit</label>
        <input type="number" step="0.01" name="price" required>

        <label for="category">Category</label>
        <input type="text" name="category" required>

        <label for="sale_date">Sale Date</label>
        <input type="date" name="sale_date" required>

        <div class="form-buttons">
            <a href="index.php" class="button back">Back</a>
            <input type="submit" value="Save" class="button save">
        </div>
    </form>
</div>

</body>
</html>
