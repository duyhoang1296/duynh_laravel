@extends('layouts.admin')
@section('header')
	<h1>Bạn không có quyền, xin mời liên hệ với Admin</h1>
	<p> <a href="{{ route('dashboard') }}">Quay lại trang chủ</a href=""></p>
@endsection