@extends('client.layout.dashboard')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/stylesssss.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="card mt-4 mb-3">
            <div class="card-header">
                <h2>Khóa học đã thanh toán</h2>
            </div>
            <div class="card-body">
                <div class="col-12 row">
                    @foreach (auth()->user()->my_course_payment as $course)
                        <div class="col-xs-12 col-md-6 bootstrap snippets bootdeys course_{{ $course->id }}">
                            <!-- product -->
                            <div class="product-content product-wrap clearfix">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                        <div class="product-image">
                                            <a href="{{ route('client.view_product_detail', ['id' => $course->id]) }}">
                                                <img src="{{ $course->image_path }}" alt="194x228" class="img-responsive"
                                                    style="width:100%;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-12 col-xs-12">
                                        <div class="product-deatil">
                                            <h5 class="name">
                                                <a
                                                    href="{{ route('client.view_product_detail', ['id' => $course->id]) }}">
                                                    {{ $course->name }}
                                                </a>
                                                <a href="#">
                                                </a>
                                                <style>
                                                    .lecturers:hover {
                                                        color: #224bcf;
                                                    }
                                                    .lecturers {
                                                        font-size: 13px;
                                                        color: #9aa7af;
                                                        margin-top: 10px;
                                                    }

                                                </style>
                                                <a 
                                                    href="{{ route('client.profile', ['id' => $course->user->id]) }}">
                                                    <p class="lecturers">

                                                        Giảng viên :
                                                        {{ $course->user->name }}
                                                    </p>
                                                </a>

                                            </h5>
                                            <p class="price-container">
                                                <span style="color:#fa1d86;"><?php echo number_format($course->price, 0); ?> VND</span>
                                            </p>
                                            <span class="tag1"></span>
                                        </div>
                                        <div class="description">
                                            <p style="display: -webkit-box;
                                                                    -webkit-line-clamp: 3;
                                                                    -webkit-box-orient: vertical;
                                                                    overflow: hidden;
                                                                    text-overflow: ellipsis;">{{ $course->desc }}</p>
                                        </div>
                                        <div class="product-info smart-form ">
                                            <div class="row">
                                                <div class="col-md-7 col-sm-7 col-xs-7 mb-4">
                                                    <a href="{{ route('client.course_single', ['id' => $course->id]) }}"
                                                        class="btn btn-primary">Xem bài giảng</a>

                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-5 ">
                                                    <a class="btn btn-danger delete_course" data-id="{{ $course->id }}"
                                                        data-url="{{ route('client.delete_course') }}">Xóa khóa học</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end product -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div
            style="width:97.2%;height:2px;background-color:rgb(158, 152, 152); margin-top:0px;border-radius: 20px; margin: auto;">
        </div>

        <div class="card mt-3 mb-3">
            <div class="card-header">
                <h2>Khóa học chưa thanh toán</h2>
            </div>

            <div class="card-body">
                <div class="col-12 row">
                    @foreach (auth()->user()->my_course_not_payment as $course2)
                        <div
                            class="col-xs-12 col-md-6 bootstrap snippets bootdeys item_course course_{{ $course2->id }}">
                            {{-- button xoa --}}
                            <a class="delete_course" data-id="{{ $course2->id }}"
                                data-url="{{ route('client.delete_course') }}">
                                <p class="button_delete"><i class="fas fa-times"></i></p>
                            </a>
                            <!-- product -->
                            <div class="product-content product-wrap clearfix">
                                <div class="row">
                                    <div class="col-md-5 col-sm-12 col-xs-12">
                                        <div class="product-image">
                                            <a href="{{ route('client.view_product_detail', ['id' => $course2->id]) }}">
                                                <img src="{{ $course2->image_path }}" alt="194x228"
                                                    class="img-responsive" style="width:100%;">
                                            </a>
                                            <span class="tag2 hot">
                                                HOT
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-12 col-xs-12">
                                        <div class="product-deatil">
                                            <h5 class="name">
                                                <a
                                                    href="{{ route('client.view_product_detail', ['id' => $course2->id]) }}">
                                                    {{ $course2->name }}
                                                </a>
                                                <a href="{{ route('client.profile', ['id' => $course2->user->id]) }}">
                                                    <p class="lecturers">Giảng viên :
                                                        {{ $course2->user->name }}</p>
                                                </a>
                                            </h5>
                                            <p class="price-container">
                                                <span style="color:#fa1d86;"><?php echo number_format($course2->price, 0); ?> VND</span>
                                            </p>
                                            <span class="tag1"></span>
                                        </div>
                                        <div class="description">
                                            <p style="display: -webkit-box;
                                                                -webkit-line-clamp: 3;
                                                                -webkit-box-orient: vertical;
                                                                overflow: hidden;
                                                                text-overflow: ellipsis;">{{ $course2->desc }}</p>
                                        </div>
                                        <div class="product-info smart-form">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-5 col-xs-5 mb-4">
                                                    <a href="{{ route('client.view_product_detail', ['id' => $course2->id]) }}"
                                                        class="btn btn-primary">Xem thêm</a>

                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-5">
                                                    <form action="{{ route('client.payment') }}" method="GET">
                                                        @csrf
                                                        <input type="text" name="user_id" hidden="true" value="{{ auth()->user()->id }}">
                                                        <input type="text" name="course_id" hidden="true" value="{{ $course2->id }}">
                                                        <button type="submit" class="btn btn-danger">Thanh
                                                            toán</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end product -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        function delete_course() {
            var url = $(this).data('url');
            var id_course = $(this).data('id');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa khóa học này không ?',
                text: "Khóa học sẽ xóa khỏi danh sách khóa học của bạn !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa khóa học',
                cancelButtonText: 'Thoát'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        data: {
                            id_course: id_course
                        },
                        success: function(data) {
                            $('.course_' + id_course).remove();
                            Swal.fire(
                                'Xóa!',
                                'Bạn đã xóa thành công khóa học',
                                'success'
                            )
                        },
                        error: function() {
                            alert('loi')
                        }
                    })
                }
            })

        }
        $(function() {
            $(document).on('click', '.delete_course', delete_course)
        })
    </script>
@endsection
