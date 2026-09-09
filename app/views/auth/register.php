<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Register</title></head>
<body>
    <h1>Create Account</h1>
    <?php if ($error): ?>
        <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
    <form action="/register" method="post">
        <p><label>Username<br><input type="text" name="username" required></label></p>
        <p><label>Password<br><input type="password" name="password" minlength="8" required></label></p>
        <button type="submit">Create account</button>
    </form>
    <p>Already have an account? <a href="/login">Log in</a></p>
</body>
</html>
