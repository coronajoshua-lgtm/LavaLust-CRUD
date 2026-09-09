<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
    <h1>Login</h1>
    <?php if ($error): ?>
        <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
    <form action="/login" method="post">
        <p><label>Username<br><input type="text" name="username" required></label></p>
        <p><label>Password<br><input type="password" name="password" required></label></p>
        <button type="submit">Log in</button>
    </form>
    <p>Demo accounts: <code>admin / Admin@123</code> or <code>user / User@12345</code>.</p>
    <p>Need an account? <a href="/register">Register</a></p>
</body>
</html>
