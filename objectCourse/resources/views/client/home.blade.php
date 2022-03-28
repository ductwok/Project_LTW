@extends('client.layout.dashboard')

@section('content')
    <!-- home section starts  -->
    <section class="home">
        <div class="image">
            <img src="images/home-img.png" alt="" />
        </div>

        <div class="content">
            <h3>Khoá học dẫn đến thành công</h3>
            <p>
                <span style="color: #fa1d86; font-weight: bold"> EASY LEARN</span> nơi
                chia sẻ các khoá học chất lượng và nó hoàn toàn
                <span style="color: #fa1d86">miễn phí</span>
            </p>
            <a href="{{ route('client.home') }}" class="btn">Bắt đầu học nào!</a>
        </div>
    </section>
    <!-- home section ends -->
    @foreach ($data_course as $item_course)
        <!-- categories section starts  -->
        @if (auth()->check())
            <?php $check = auth()->user()->my_course->contains('id',$item_course->id) ?>;
        @else
            <?php $check = false; ?>
        @endif

        @if ($check)

        @else
            <section class="course-2 item_course-{{ $item_course->id }}" id="">
                <div class="box">
                    <div class="image">
                        <img src="{{ $item_course->image_path }}" />
                    </div>
                    <div class="content">
                        <span>{{ $item_course->name }}</span>
                        <a href="{{ route('client.profile',['id' => $item_course->user->id]) }}">
                            <h3>Giảng viên : {{ $item_course->user->name }}</h3>
                        </a>
                        <p>{{ $item_course->desc }}</p>
                        <p style="color:#fa1d86; font-weight: bold;"> <?php echo number_format($item_course->price, 0); ?> VND</p>
                        <a href="{{ route('client.view_product_detail', ['id' => $item_course->id]) }}"
                            class="btn">Xem thêm</a>

                        <a class="btn {{ auth()->check() ?  "btn-fa1d86" : "" }}" {{  auth()->check() ? "" : "href=".route('logins.form')  }} data-id="{{ $item_course->id }}" data-url="{{ route('client.add_course') }}">Đăng ký khóa học</a>
                        
                        <div class="icons">
                            <a href="#"> <i class="fas fa-book"></i>Khóa học gồm {{ $item_course->video->count() }} bài
                                giảng.</a>
                            <a href="#"> <i class="fas fa-drum-steelpan"></i>Chủ đề về
                                {{ $item_course->category->name }}</a>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    <div>{{ $data_course->links() }}</div>
@endsection
@section('js')
    <script>
        function add_course() {
            var url = $(this).data('url');
            var id_course = $(this).data('id');
            var course = $('.item_course-' + id_course);
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
                    course.remove();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Khóa học đã được thêm vào giỏ hàng',
                        showConfirmButton: false,
                        timer: 1600
                    })
                },
                error: function() {
                    alert('loi');
                }

            })
        }
        $(function() {
            $(document).on('click', '.btn-fa1d86', add_course);
        })
    </script>
@endsection
