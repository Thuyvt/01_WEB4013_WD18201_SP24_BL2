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
    <h1>Danh sách khách hàng</h1>
    <button><a href="/customers/create">Tạo mới</a></button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        @if($item->status == 0)
                            <span style="color:red;">Chưa kích hoạt</span>
                        @else
                            <span style="color:green;">Kích hoạt</span>
                        @endif
                    </td>
                    <td>
                        <button>
                            <a href="/customers/{{$item->id}}/edit">Sửa</a>
                        </button>
                        <button><a href="/customers/{{$item->id}}">Chi tiết</a></button>
                        <form action="/customers/{{$item->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
