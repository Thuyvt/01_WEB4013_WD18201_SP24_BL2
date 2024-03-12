@extends('layouts.admin-layout')
@section('admin-content')
<h1>{{$title}}</h1>
<p>Hôm nay là ngày {{$x}}</p>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dsSanPham as $sp)
        <tr>
            <td>{{$sp->id}}</td>
            <td>{{$sp->name}}</td>
            <td>{{$sp->price}}</td>
            <td>
                <a href="/san-pham/{{$sp->id}}">
                    <button>Xem chi tiết </button>
                </a> 
                <a href="/san-pham/xoa/{{$sp->id}}">
                    <button>Xóa</button>
                </a> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection