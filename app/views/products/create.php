<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Create Product</title></head>
<body>
    <h1>Add Product</h1>
    <form action="/products/create" method="post">
        <p><label>Product name<br><input type="text" name="product_name" required></label></p>
        <p><label>Description<br><textarea name="description" rows="4"></textarea></label></p>
        <p><label>Price<br><input type="number" name="price" min="0" step="0.01" required></label></p>
        <p><label>Quantity<br><input type="number" name="quantity" min="0" step="1" required></label></p>
        <button type="submit">Create Product</button>
        <a href="/products">Cancel</a>
    </form>
</body>
</html>
