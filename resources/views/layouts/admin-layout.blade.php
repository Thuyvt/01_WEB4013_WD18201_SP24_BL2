<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="background-color: aqua; height:100px;">HEADER</div>
    <!-- Nội dung thay đổi -->
    @yield('admin-content')
    <div style="background-color: red; height:100px;">FOOTER</div>
</body>

</html>