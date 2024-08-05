@extends('admin.master')

@section('title')
    Cập nhật Danh mục {{ $category->name }}
@endsection

@section('header')
    @include('admin.partials.header')
@endsection


@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('content')
    <div class="content-wrapper">
        <?php
        if (isset($_SESSION['thong_bao']) && $_SESSION['thong_bao']) {
?>
        <div class="alert alert-success">
            <?= $_SESSION['thong_bao'] ?>
        </div>
        <?php
       unset($_SESSION['thong_bao']); }
    ?>
        <form action="{{ route('categories.update', $category) }}" class="form" method="post">
            @csrf
            {{-- vì là sử dụng resource trong route nên phải sử dụng thêm 1 phương thức là put để update --}}
            @method('put')

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                    value="{{ $category->name }}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Trở về trang danh sách</a>
        </form>
    </div>
@endsection

@section('footer')
    @include('admin.partials.footer')
@endsection
