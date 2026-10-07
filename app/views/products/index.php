<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <style>
        :root {
            --bg-1: #fdf7ff;
            --bg-2: #edfaff;
            --panel: rgba(255, 255, 255, 0.9);
            --panel-strong: #ffffff;
            --primary: #7d7ce4;
            --primary-dark: #4f4fb8;
            --secondary: #8ed7d0;
            --accent: #f8dfe8;
            --text: #2d2a3c;
            --muted: #5f5a7b;
            --border: #e7dffb;
            --table-header: #f1ebff;
            --row-alt: #fff9fc;
            --shadow: rgba(125, 124, 228, 0.14);
            --danger: #c86a6a;
            --success: #4d9d90;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 40px 24px;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2));
            color: var(--text);
        }

        .page {
            max-width: 1200px;
            margin: 0 auto;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 24px;
            box-shadow: 0 20px 45px var(--shadow);
            padding: 28px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        h1 {
            margin: 0;
            color: var(--primary-dark);
            font-size: clamp(2rem, 3vw, 2.6rem);
        }

        .add-btn,
        .logout-btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), #9bb5ff);
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            box-shadow: 0 12px 20px rgba(125, 124, 228, 0.2);
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: transform 0.15s ease;
        }

        .logout-btn {
            background: linear-gradient(135deg, #f4a7b8, #f7c0c9);
            color: #5a2a36;
            box-shadow: 0 12px 20px rgba(244, 167, 184, 0.2);
        }

        .add-btn:hover,
        .logout-btn:hover {
            transform: translateY(-1px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--panel-strong);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid var(--border);
            text-align: left;
            vertical-align: top;
            color: var(--text);
        }

        th {
            background: var(--table-header);
            color: var(--primary-dark);
            font-weight: 800;
        }

        tr:nth-child(even) {
            background: var(--row-alt);
        }

        td {
            line-height: 1.5;
        }

        .actions-cell {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .link-btn,
        .delete-btn {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            transition: transform 0.15s ease;
        }

        .link-btn {
            background: #eef5ff;
            border-color: #d7e7ff;
            color: var(--primary-dark);
        }

        .delete-btn {
            background: #fff0f3;
            border-color: #f5d4dd;
            color: var(--danger);
        }

        .link-btn:hover,
        .delete-btn:hover,
        .add-btn:hover {
            transform: translateY(-1px);
        }

        form {
            display: inline;
            margin: 0;
        }

        .empty {
            text-align: center;
            color: var(--muted);
            font-weight: 600;
            padding: 30px 12px;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px 12px;
            }

            .page {
                padding: 18px 14px;
            }

            .topbar {
                align-items: flex-start;
            }

            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="topbar">
            <h1>Product Management</h1>

            <div class="topbar-actions">
                <?php if ($is_admin): ?>
                    <a href="/products/create" class="add-btn">+ Add Product</a>
                <?php endif; ?>

                <form action="/logout" method="post">
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>

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
                            <div class="actions-cell">
                                <?php if ($is_admin): ?>
                                    <a class="link-btn" href="/products/edit/<?= (int) $product->id ?>">Edit</a>
                                    <form action="/products/delete/<?= (int) $product->id ?>" method="post">
                                        <button class="delete-btn" type="submit" onclick="return confirm('Delete this product?')">Delete</button>
                                    </form>
                                <?php else: ?>
                                    View only
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td class="empty" colspan="7">No products found.</td>
                </tr>

            <?php endif; ?>

        </table>
    </div>
</body>
</html>
