<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác thực email</title>
</head>
<body>
    <h2>Xác thực email tài khoản</h2>
    <p>Vui lòng bấm nút bên dưới để xác thực email của bạn. Liên kết có hiệu lực trong 24 giờ.</p>
    <p>
        <a href="{{ $verificationUrl }}" style="display:inline-block;padding:10px 16px;background:#d10024;color:#fff;text-decoration:none;">
            Xác thực email
        </a>
    </p>
    <p>Nếu bạn không tạo tài khoản, hãy bỏ qua email này.</p>
</body>
</html>
