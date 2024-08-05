@extends('admin.master')

@section('title')
    Chi tiết khoá học {{ $course->name }}
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
                                        <th>fieldName</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($course->toArray() as $field => $value)
                                        <tr>
                                            <td>{{ Ucfirst($field) }}</td>
                                            <td>
                                                @if ($field == 'img_thumb')
                                                    <img src="{{ asset($value) }}" alt="" width="100px">
                                                @elseif ($field == 'instructor_id')
                                                    {{ $course->instructor->name }}
                                                @elseif($field == 'category_id')
                                                    {{ $course->category->name }}
                                                @else()
                                                    {{ $value }}
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>

                            <a href="{{ route('admins.courses.index') }}" class="btn btn-success">Trở lại danh sách</a>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
    </div>
@endsection

@section('footer')
    @include('admin.partials.footer')
@endsection
