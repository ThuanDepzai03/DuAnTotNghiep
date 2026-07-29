<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Admin</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f0f2f5;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2 style="text-align: center;">ADMIN PANEL</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form action="index.php?action=check_login" method="POST">
            <input type="text" name="user" placeholder="Tên đăng nhập" required>
            <input type="password" name="pass" placeholder="Mật khẩu" required>
            <button type="submit" name="btn_login">Đăng nhập</button>
        </form>
    </div>
</body>

</html>