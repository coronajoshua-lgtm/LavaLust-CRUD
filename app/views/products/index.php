<!DOCTYPE html>
<html>
<head>
    <title>Products</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f4f4;
        }

        h1 {
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
        }

        .add-btn {
            background: #222;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #222;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Product Management</h1>

    <a href="/products/create" class="add-btn">+ Add Product</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>

        <?php if (!empty($products)): ?>

            <?php foreach ($products as $product): ?>

                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->product_name ?></td>
                    <td><?= $product->description ?></td>
                    <td>₱<?= number_format($product->price, 2) ?></td>
                    <td><?= $product->quantity ?></td>
                    <td><?= $product->created_at ?></td>
                    <td>
                        <a href="/products/edit/<?= (int) $product->id ?>">Edit</a>
                        <form action="/products/delete/<?= (int) $product->id ?>" method="post" style="display:inline">
                            <button type="submit" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="7">No products found.</td>
            </tr>

        <?php endif; ?>

    </table>

</body>
</html>
