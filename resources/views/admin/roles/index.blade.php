@extends('admin.master')

@section('title')
    RoleList
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
                        <div class="box-header">
                            <h3 class="box-title">Bảng Role</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Vai trò</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $stt = 0;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td style="display:flex;">
                                                <a href="{{ route('roles.edit', $item) }}"
                                                    class="btn btn-warning mt-2 ">Edit</a>
                                                <a href="{{ route('roles.show', $item) }}"
                                                    class="btn btn-primary mt-2 ">Show</a>
                                                <form action="{{ route('roles.destroy', $item) }}" method="post">
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
                                {{-- <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                            <a href="{{route('roles.create')}}" class="btn btn-success">Create</a>
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
