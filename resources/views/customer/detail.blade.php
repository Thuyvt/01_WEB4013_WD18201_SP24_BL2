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
    <h3>Thông tin chi tiết khách hàng</h3>
    <p>Họ và tên: {{$customer->name}}</p>
    <p>Vai trò khách hàng: {{$customer->role->name}}</p>
</body>
</html>
