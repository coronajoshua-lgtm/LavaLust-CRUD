<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Edit Product</title></head>
<body>
    <h1>Edit Product</h1>
    <form action="/products/edit/<?= (int) $product->id ?>" method="post">
        <p><label>Product name<br><input type="text" name="product_name" value="<?= htmlspecialchars($product->product_name, ENT_QUOTES, 'UTF-8') ?>" required></label></p>
        <p><label>Description<br><textarea name="description" rows="4"><?= htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8') ?></textarea></label></p>
        <p><label>Price<br><input type="number" name="price" min="0" step="0.01" value="<?= htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8') ?>" required></label></p>
        <p><label>Quantity<br><input type="number" name="quantity" min="0" step="1" value="<?= (int) $product->quantity ?>" required></label></p>
        <button type="submit">Save Changes</button>
        <a href="/products">Cancel</a>
    </form>
</body>
</html>
