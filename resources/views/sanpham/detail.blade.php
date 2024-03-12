@extends('layouts.admin-layout')
@section('admin-content')
<h1>{{$title}}</h1>
@foreach ($detail as $sp)
<p>Id: {{$sp -> id}}</p>
<p>Tên: {{$sp -> name}}</p>
<p>Giá: {{$sp -> price}}</p>
@endforeach
@endsection