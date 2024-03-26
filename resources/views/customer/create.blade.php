<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h3>Tạo mới khách hàng</h3>
    <div class="container">
        <form action="/customers" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <span class="form-label">Họ và tên:</span>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mt-3">
                <span class="form-label">Số chứng minh thư:</span>
                <input type="text" name="identify_id" class="form-control">
            </div>
            <div class="mt-3">
                <span class="form-label">Giới tính:</span>
                <input type="radio" value="0" name="gender" class="form-check-input">
                <label class="form-check-label">Nam</label>
                <input type="radio" value="1" name="gender" class="form-check-input">
                <label class="form-check-label">Nữ</label>

            </div>
            <div class="mt-3">
                <span class="form-label">Ngày sinh:</span>
                <input type="date" name="date_of_birth" class="form-control">
            </div>
            <div class="mt-3">
                <span class="form-label">Số điện thoại:</span>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="mt-3">
                <span class="form-label">Địa chỉ:</span>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="mt-3">
                <span class="form-label">Trạng thái:</span>
                <input type="checkbox" value="1" name="status" class="form-check-input"> Kích hoạt
            </div>
            <div class="mt-3">
                <span class="form-label">Ảnh đại diện:</span>
                <input type="file" name="img" class="form-control">
            </div>
            <div class="mt-3">
                <span class="form-label">Vai trò:</span>
                <select name="role_id" id="" class="form-control">
                    @foreach($roles as $r)
                        <option value="{{$r->id}}">
                            {{$r->name}}
                        </option>
                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3"> Tạo mới </button>
        </form>
    </div>

</body>
</html>
