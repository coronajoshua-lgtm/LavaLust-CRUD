<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        :root {
            --bg-1: #fffaf6;
            --bg-2: #eef9ff;
            --panel: rgba(255, 255, 255, 0.94);
            --primary: #7d8ff7;
            --primary-dark: #5f6ed3;
            --secondary: #8ed7c7;
            --accent: #f9d7e8;
            --text: #2d2a3c;
            --muted: #57536d;
            --border: #e6d9fb;
            --shadow: rgba(125, 143, 247, 0.18);
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
            width: min(500px, 92vw);
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: 0 20px 45px var(--shadow);
            padding: 32px 28px;
        }

        h1 {
            margin: 0 0 10px;
            text-align: center;
            color: var(--primary-dark);
            font-size: 2.1rem;
        }

        .subtitle {
            margin: 0 0 24px;
            text-align: center;
            color: var(--muted);
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
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(125, 143, 247, 0.12);
        }

        button {
            border: none;
            border-radius: 12px;
            padding: 13px 18px;
            background: linear-gradient(135deg, var(--primary), #a6c8ff);
            color: white;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(125, 143, 247, 0.2);
            transition: transform 0.15s ease;
        }

        button:hover {
            transform: translateY(-1px);
        }

        .footer {
            margin-top: 18px;
            text-align: center;
            color: var(--muted);
        }

        a {
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 700;
        }

        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="auth-card">
        <h1>Create Account</h1>
        <p class="subtitle">Join our dashboard</p>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form action="/register" method="post">
            <div>
                <label>Username
                    <input type="text" name="username" required>
                </label>
            </div>

            <div>
                <label>Password
                    <input type="password" name="password" minlength="8" required>
                </label>
            </div>

            <button type="submit">Create account</button>
        </form>

        <p class="footer">Already have an account? <a href="/login">Log in</a></p>
    </div>
</body>
</html>
