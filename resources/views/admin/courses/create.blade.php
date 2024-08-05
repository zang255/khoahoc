@extends('admin.master')

@section('title')
    Thêm mới Khoá học
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admins.courses.store') }}" class="form" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                    value="{{ old('title') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Price:</label>
                <input type="number" class="form-control" id="price" placeholder="Enter price"
                    name="price"value="{{ old('price') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Description:</label>
                <textarea type="text" class="form-control" id="description" placeholder="Enter description"
                    name="description">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Duration(months):</label>
                <input type="number" class="form-control" id="duration" placeholder="Enter duration"
                    name="duration"value="{{ old('duration') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="category" class="form-label">Category:</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="instructor" class="form-label">Instructor:</label>
                <select name="instructor_id" id="instructor_id" class="form-control">
                    @foreach ($instructors as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="img_thumb" class="form-label">Image:</label>
                <input type="file" name="img_thumb" id="img_thumb" class="form-control-file">
            </div>



            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('admins.courses.index') }}" class="btn btn-primary">Trở về trang danh sách</a>
        </form>
    </div>
@endsection

@section('footer')
    @include('admin.partials.footer')
@endsection
