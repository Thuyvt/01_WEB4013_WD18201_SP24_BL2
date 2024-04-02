@extends('layouts.admin-layout')
@section('admin-content')
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label"> Email </label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label"> Password </label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success"> Đăng nhập</button>
        <a href="/forgot-password">Quên mật khẩu</a>
    </form>
@endsection
