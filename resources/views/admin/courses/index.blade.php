@extends('admin.master')

@section('title')
    Danh sách khoá học
@endsection

@section('header')
    @include('admin.partials.header')
@endsection


@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">

                <div class="col-xs-12">
                    <div class="box">
                        @if (session('thong_bao'))
                            <div class="alert alert-success">
                                {{ session('thong_bao') }}
                            </div>
                        @endif
                        <div class="box-header">
                            <h3 class="box-title">Bảng Khoá học</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>price</th>
                                        <th>duration(months)</th>
                                        <th>Instructor</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $currentPage = $data->currentPage();
                                        $perPage = $data->perPage();
                                    @endphp
                                    @foreach ($data as $index => $item)
                                        @php
                                            $number = ($currentPage - 1) * $perPage + $index + 1;
                                        @endphp
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>
                                                <img src="{{ asset($item->img_thumb) }}" alt="" width="100px">
                                            </td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->duration }}</td>
                                            <td>{{ $item->instructor->name }}</td>
                                            <td style="display:flex;">
                                                <a href="{{ route('admins.courses.edit', $item) }}"
                                                    class="btn btn-warning mt-2 ">Edit</a>
                                                <a href="{{ route('admins.courses.show', $item) }}"
                                                    class="btn btn-primary mt-2">Show</a>
                                                <form action="{{ route('admins.courses.destroy', $item) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mt-2"
                                                        onclick="return confirm('Bạn có chắc chắn không?')">
                                                        Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                            <a href="{{ route('admins.courses.create') }}" class="btn btn-success">Create</a>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    {{ $data->links() }}

                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
    </div>
    {{-- <script>
        $(document).ready(function() {
            $('#example2').DataTable();
        }); 
    </script> --}}
@endsection

@section('footer')
    @include('admin.partials.footer')
@endsection
