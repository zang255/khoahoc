@extends('client.master')


@section('header')
    @include('client.partials.header')
@endsection

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Course Details</h1>
                            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                                voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                                Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Course Details</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Courses Course Details Section -->
        <section id="courses-course-details" class="courses-course-details section">

            <div class="container" data-aos="fade-up">
                @if (session('thong_bao'))
                    <div class="alert alert-success">
                        {{ session('thong_bao') }}
                    </div>
                    @php
                        
                    @endphp
                @endif

                @if (session('loi'))
                    <div class="alert alert-danger">
                        {{ session('loi') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-8">
                        <img src="{{ asset($course->img_thumb) }}" class="img-fluid" alt="">
                        <h3 style="color: rgb(33, 235, 33)">{{ $course->title }}</h3>
                        <h4>Mô tả:</h4>
                        <p>
                            {{ $course->description }}
                        </p>
                    </div>
                    <div class="col-lg-4">

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Giảng viên</h5>
                            <p><a href="#">{{ $course->instructor->name }}</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Giá</h5>
                            <p>{{ $course->price }}</p>đ
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Danh mục</h5>
                            <p>{{ $course->category->name }}</p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Thời gian học(tháng)</h5>
                            <p>{{ $course->duration }}</p>
                        </div>
                        <div style="display: flex;">
                            {{-- <form action="{{route('clients.vnpay_payment')}}" method="post">
                                @csrf

                            </form> --}}
                            <form action="{{ route('clients.buynow') }}" method="post">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-sqr" style="margin-right: 50px">Mua Ngay</button>
                            </form>
                            

                            <form action="{{ route('clients.addToCart') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sqr">Thêm vào giỏ hàng</button>
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                            </form>
                        </div>



                    </div>
                   @if (session('R_thongbao'))
                       <div class="alert alert-success">
                            {{session('R_thongbao')}}
                       </div>
                   @else
                       
                   @endif
                    <div class="reviews">
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th class="pro-title">Người bình luận</th>
                                    <th class="pro-price">Nội dung</th>
                                    <th class="pro-quantity">Ngày bình luận</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $item)
                                    <tr>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>{{ $item->date }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('clients.addReview') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id??'' }}">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="text" name="comment" class="form-control">
                        <button type="submit" class="btn btn-sqr">Gửi</button>
                    </form>
                    <h3>Khoá học bạn có thể hứng thú</h3>
                    @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="course-item">
                                <img src="{{ asset($item->img_thumb) }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="category">{{ $item->category->name }}</p>
                                        <p class="price">${{ $item->price }}</p>
                                    </div>

                                    <h3><a href="{{ route('clients.courses.show', $item) }}">{{ $item->title }}</a></h3>
                                    <p class="description">{{ $item->description }}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="" class="img-fluid" alt="">
                                            <a href="{{ route('clients.courses.show', $item) }}"
                                                class="trainer-link">{{ $item->instructor->name }}</a>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bi bi-person user-icon"></i>&nbsp;50
                                            &nbsp;&nbsp;
                                            <i class="bi bi-heart heart-icon"></i>&nbsp;65
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                </div>

            </div>

        </section><!-- /Courses Course Details Section -->

        <!-- Tabs Section -->
        <section id="tabs" class="tabs section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Modi sit est</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Unde praesentium sed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Architecto ut aperiam autem id</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                            parde sonata raqer a videna mareta paulona marka</p>
                                        <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                            eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                            minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                            similique accusamus nostrum rem vero</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/tabs/tab-1.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Et blanditiis nemo veritatis excepturi</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                            parde sonata raqer a videna mareta paulona marka</p>
                                        <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et
                                            reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit
                                            ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna
                                            desera vafle de nideran pal</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/tabs/tab-2.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                                        <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim
                                            fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis
                                            aut</p>
                                        <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis
                                            quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae
                                            sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et
                                            harum voluptatem optio quae</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/tabs/tab-3.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                                        <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas
                                            iure porro quis delectus</p>
                                        <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam
                                            necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in
                                            consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a
                                            laborum inventore</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/tabs/tab-4.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                                        <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.
                                        </p>
                                        <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae
                                            ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet.
                                            Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/tabs/tab-5.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Tabs Section -->

    </main>
@endsection

@section('footer')
    @include('client.partials.footer')
@endsection
