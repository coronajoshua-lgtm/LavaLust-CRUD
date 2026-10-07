<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        :root {
            --bg-1: #fdf7ff;
            --bg-2: #edf9ff;
            --panel: rgba(255, 255, 255, 0.96);
            --primary: #8c7af2;
            --primary-dark: #5f54d1;
            --text: #2d2a3c;
            --muted: #5f5a7b;
            --border: #e4d9fb;
            --shadow: rgba(140, 122, 242, 0.18);
            --soft-pink: #f8d9e7;
            --soft-blue: #dff7ff;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 40px 24px;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2));
            color: var(--text);
        }

        .form-card {
            max-width: 640px;
            margin: 0 auto;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: 0 20px 45px var(--shadow);
            padding: 32px 28px;
        }

        h1 {
            margin: 0 0 24px;
            font-size: 2rem;
            text-align: center;
            color: var(--primary-dark);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        label {
            display: block;
            font-weight: 700;
            color: var(--text);
        }

        input, textarea {
            width: 100%;
            margin-top: 8px;
            padding: 12px 14px;
            border: 1.5px solid var(--border);
            background: #fffafc;
            color: var(--text);
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            resize: vertical;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(140, 122, 242, 0.12);
        }

        .actions {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-top: 8px;
        }

        button, .cancel-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.98rem;
            border: none;
            cursor: pointer;
            transition: transform 0.15s ease;
        }

        button {
            background: linear-gradient(135deg, var(--primary), #a7b8ff);
            color: #fff;
            box-shadow: 0 10px 20px rgba(140, 122, 242, 0.2);
        }

        .cancel-button {
            background: #f4ebff;
            color: var(--primary-dark);
            border: 1px solid var(--border);
        }

        button:hover, .cancel-button:hover {
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="form-card">
        <h1>Add Product</h1>
        <form action="/products/create" method="post">
            <div>
                <label>Product name
                    <input type="text" name="product_name" required>
                </label>
            </div>

            <div>
                <label>Description
                    <textarea name="description" rows="4"></textarea>
                </label>
            </div>

            <div>
                <label>Price
                    <input type="number" name="price" min="0" step="0.01" required>
                </label>
            </div>

            <div>
                <label>Quantity
                    <input type="number" name="quantity" min="0" step="1" required>
                </label>
            </div>

            <div class="actions">
                <button type="submit">Create Product</button>
                <a class="cancel-button" href="/products">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
