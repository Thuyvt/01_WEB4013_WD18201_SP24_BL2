<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/forgot-password" method="POST">
        @csrf
        Nhập địa chỉ email của bạn
        <input type="email" name="email">
        <button type="submit"> Gửi xác nhận</button>
    </form>
</body>
</html>
