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
<h3>Cập nhật thông tin khách hàng</h3>
<div class="container">
    <form action="/customers/{{$customer->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mt-3">
            <span class="form-label">Họ và tên:</span>
            <input type="text" name="name" value="{{$customer->name}}" class="form-control">
        </div>
        <div class="mt-3">
            <span class="form-label">Số chứng minh thư:</span>
            <input type="text" name="identify_id" value="{{$customer->identify_id}}" class="form-control">
        </div>
        <div class="mt-3">
            <span class="form-label">Giới tính:</span>
            <input type="radio" value="0" name="gender" checked="{{$customer->gender == 0 ? 'true' : 'false'}}" class="form-check-input">
            <label class="form-check-label">Nam</label>
            <input type="radio" value="1" name="gender" checked="{{$customer->gender == 1 ? 'true' : 'false'}}" class="form-check-input">
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

{{--            <img src="{{asset('storage/{{$customer->img}}')}}" alt="">--}}
            <span class="form-label">Ảnh đại diện:</span>
            <input type="file" name="img" class="form-control">
        </div>
        <button type="submit" class="btn btn-success mt-3"> Cập nhật </button>
    </form>
</div>

</body>
</html>
