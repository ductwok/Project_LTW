@extends('client.layout.dashboard')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ asset('css/stylesssssss.css') }}">
@endsection
@section('content')
    <main class="container">
        <!-- Left Column / Headphones Image -->
        <div class="left-column">
            <img src="{{ $course->image_path }}" class="active" alt="">
        </div>

        <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <span>Thông tin về khóa học</span>
                <h1>{{ $course->name }}</h1>
                <p style="display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;">{{ $course->desc }}</p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">

                <!-- Product Color -->
                <div class="product-color">
                    <span>Thể loại</span>

                    <div class="color-choose">
                        <h2>{{ $course->category->name }}</h2>
                    </div>

                </div>

                <!-- Cable Configuration -->
                <div class="cable-config">
                    <span>Số bài giảng</span>

                    <div class="cable-choose">
                        <h2>Khóa học gồm {{ $course->video->count() }} bài giảng</h2>
                    </div>

                    <a href="{{ route('client.profile', ['id' => $course->user->id]) }}"><i class="fas fa-user-cog"></i>
                        Người giảng : {{ $course->user->name }}</a>
                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <span><?php echo number_format($course->price, 0); ?> VND</span>
                @if (auth()->check())
                    <?php $check = auth()->check() ?>
                @else
                    <?php $check = false; ?>
                @endif
                <div class="check_login" data-id="{{ $check }}"></div>
                @if ($check)
                    @if (auth()->user()->my_course_payment->contains('id',$course->id))
                        <a href="{{ route('client.course_single',['id' => $course->id]) }}" class="cart-btn" style="cursor: pointer;" >Học ngay</a>
                        
                    @elseif (auth()->user()->my_course_not_payment->contains('id',$course->id))
                    <form action="{{ route('client.payment') }}" method="GET">
                        @csrf
                        <input type="text" name="user_id" hidden="true" value="{{ auth()->user()->id }}">
                        <input type="text" name="course_id" hidden="true" value="{{ $course->id }}">
                        <button type="submit" class="cart-btn" style="cursor: pointer;">Thanh
                            toán</button>
                    </form>
                    @else
                    <button class="cart-btn btn-add_course mr-4" style="cursor: pointer;"
                        data-url="{{ route('client.add_course') }}" data-id="{{ $course->id }}">Thêm giỏ hàng</button>
                    <form action="{{ route('client.payment') }}" method="GET">
                        @csrf
                        <input type="text" name="user_id" hidden="true" value="{{ auth()->user()->id }}">
                        <input type="text" name="course_id" hidden="true" value="{{ $course->id }}">
                        <button type="submit" class="cart-btn" style="cursor: pointer;">Thanh
                            toán</button>
                    </form>

                    @endif
                @else
                    <button class="cart-btn" style="cursor: pointer;" data-toggle="modal"
                        data-target="#exampleModal">Add to carte</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><h3>Thông báo</h3></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h3>Vui lòng đăng nhập để sử dụng tính năng này <i class="far fa-grin-beam"></i> <i class="far fa-grin-beam"></i> <i class="far fa-grin-beam"></i></h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                    <a href="{{ route('logins.form') }}" class="btn btn-primary">Đăng nhập</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
@section('js')

<script>
        function add_course() {
            var url = $(this).data('url');
            var id_course = $(this).data('id');
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                data: {
                    id_course: id_course
                },
                success: function(data) {
                    $('.btn-add_course').remove();
                    Swal.fire({
                        title: 'Thêm thành công!',
                        text: 'Thêm khóa học vào giỏ hàng thành công',
                        imageUrl: data,
                        imageWidth: 400,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                    })
                },
                error: function() {
                    alert('loi');
                }

            })
        };

        $(function() {
            $(document).on('click', '.btn-add_course', add_course);
        })
        </script>
 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
@endsection
