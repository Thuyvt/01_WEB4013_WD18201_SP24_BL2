@extends('layouts.admin-layout')
@section('admin-content')
    <h1>Các thành phần trong blade </h1>
    {{-- Hiển thị ảnh --}}
    <img src="{{URL('img/sp01.jpg')}}" alt="" width="100" height="100">
    {{--    Luu ảnh vào thư mục storage--}}
    <img src="{{asset('storage/sp01.jpg')}}" alt="" width="100" height="100"> <br>
    {{--    Hiển thị giá trị--}}
    {{$x = ''}}
    @php
        echo $x;
    @endphp
    <p>Giá trị của x là: {{$x}}</p>
    @if($x == 1)
        <p>Xin chào anh!!</p>
        <p>Hôm nay anh thế nào</p>
    @elseif($x == 2)
        <p>Xin chào chị</p>
    @else
        <p>Xin chào đằng ấy</p>
    @endif
    {{-- unless - if not  --}}
    @unless($x != 3)
        <p>Helo đằng ấy</p>
    @endunless
    @empty($x)
        <p>X không có giá trị</p>
    @endempty
    @isset($x)
        <p>X đã được gán giá trị</p>
    @endisset
    {{ $name = 'thuy' }}
    @switch($name)
        @case('thuy')
            <h3>Xin chào Msr Thuy</h3>
            @break
        @default
            <h3>Không có tên trong hệ thống</h3>
    @endswitch
    {{ $i = 0 }}
    @while($i < 10)
        <h3> i = {{$i}}</h3>
        {{$i++}}
    @endwhile
@endsection
