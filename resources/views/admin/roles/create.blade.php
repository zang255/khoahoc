@extends('admin.master')

@section('title')
    Thêm mới Vai trò
@endsection


@section('header')
    @include('admin.partials.header')
@endsection


@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('content')
    @php
        if (isset($_SESSION['thong bao']) && $_SESSION['thong bao']) {
        }
    @endphp
    <div class="content-wrapper">
        <form action="{{ route('roles.store') }}" class="form" method="post">
            @csrf

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>


            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Trở về trang danh sách</a>
        </form>
    </div>
@endsection
