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
                        <?php
                        if (isset($_SESSION['thong_bao']) && $_SESSION['thong_bao']) {
                ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['thong_bao'] ?>
                        </div>
                        <?php
                       unset($_SESSION['thong_bao']); }
                    ?>
                        <div class="box-header">
                            <h3 class="box-title">Bảng Category</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td style="display:flex;">
                                                <a href="{{ route('categories.edit', $item) }}"
                                                    class="btn btn-warning mt-2 ">Edit</a>
                                                <form action="{{ route('categories.destroy', $item) }}" method="post">
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
                            <a href="{{ route('categories.create') }}" class="btn btn-success">Create</a>
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
