@extends('admin.master')

@section('title')
    Thêm mới Danh mục
@endsection


@section('header')
    @include('admin.partials.header')
@endsection


@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('content')
    <?php
        if (isset($_SESSION['thong_bao']) && $_SESSION['thong_bao']) {
?>
    <div class="alert alert-success">
        <?= $_SESSION['thong_bao'] ?>
    </div>
    <?php
       unset($_SESSION['thong_bao']); }
    ?>

    <div class="content-wrapper">
        <form action="{{ route('categories.store') }}" class="form" method="post">
            @csrf

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>


            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Trở về trang danh sách</a>
        </form>
    </div>
@endsection

@section('footer')
    @include('admin.partials.footer')
@endsection
