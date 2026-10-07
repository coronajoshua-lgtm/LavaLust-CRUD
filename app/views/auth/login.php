<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --bg-1: #fdf7ff;
            --bg-2: #ecfaff;
            --panel: rgba(255, 255, 255, 0.9);
            --panel-strong: #ffffff;
            --primary: #7a6ad8;
            --primary-dark: #5d4dc5;
            --secondary: #89d7d3;
            --accent: #f9d7df;
            --text: #2d2a3c;
            --muted: #5f5a7b;
            --border: #e0d9f8;
            --shadow: rgba(122, 106, 216, 0.18);
            --danger: #c96b6b;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2));
            color: var(--text);
        }

        .auth-card {
            width: min(480px, 92vw);
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: 0 20px 45px var(--shadow);
            padding: 32px 28px;
            backdrop-filter: blur(8px);
        }

        h1 {
            margin: 0 0 10px;
            font-size: 2.1rem;
            color: var(--primary-dark);
            text-align: center;
        }

        .subtitle {
            margin: 0 0 24px;
            text-align: center;
            color: var(--muted);
            font-size: 0.98rem;
        }

        .error {
            margin-bottom: 16px;
            padding: 10px 12px;
            border-radius: 10px;
            background: #fde9eb;
            border: 1px solid #f0c1c6;
            color: var(--danger);
            font-weight: 600;
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

        input {
            width: 100%;
            margin-top: 8px;
            padding: 12px 14px;
            border: 1.5px solid var(--border);
            border-radius: 12px;
            background: #fffafc;
            color: var(--text);
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(122, 106, 216, 0.12);
        }

        button {
            border: none;
            border-radius: 12px;
            padding: 13px 18px;
            background: linear-gradient(135deg, var(--primary), #a992ff);
            color: #ffffff;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 10px 20px rgba(122, 106, 216, 0.2);
        }

        button:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(122, 106, 216, 0.25);
        }

        .info {
            margin-top: 20px;
            text-align: center;
            color: var(--muted);
            font-size: 0.96rem;
            line-height: 1.6;
        }

        code {
            background: #f6f0ff;
            color: var(--primary-dark);
            padding: 2px 8px;
            border-radius: 8px;
            border: 1px solid var(--border);
            font-weight: 700;
        }

        a {
            color: var(--primary-dark);
            font-weight: 700;
            text-decoration: none;
        }

        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="auth-card">
        <h1>Login</h1>
        <p class="subtitle">Welcome back</p>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form action="/login" method="post">
            <div>
                <label>Username
                    <input type="text" name="username" required>
                </label>
            </div>

            <div>
                <label>Password
                    <input type="password" name="password" required>
                </label>
            </div>

            <button type="submit">Log in</button>
        </form>

        <p class="info">Demo accounts: <code>admin / Admin@123</code> or <code>user / User@12345</code>.</p>
        <p class="info">Need an account? <a href="/register">Register</a></p>
    </div>
</body>
</html>
