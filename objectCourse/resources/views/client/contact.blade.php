@extends('client.layout.dashboard')
@section('content')
    <!-- header section ends -->
    <section class="heading">
        <h3>LIÊN HỆ</h3>
        <p><a href="/">Trang Chủ >></a> LIÊN HỆ</p>
    </section>

    <!-- contact -->

    <section class="contact">
        <div class="icons-container">
            <div class="icons">
                <i class="fas fa-phone"></i>
                <h3>Số điện thoại</h3>
                <p>+84 77 676 3650</p>
                
            </div>

            <div class="icons">
                <i class="fas fa-envelope"></i>
                <h3>Email</h3>
                <p>ishare@gmail.com</p>
                <p>ishare-supporter@gmail.com</p>
            </div>

            <div class="icons">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Địa chỉ</h3>
                <p>33 Xô Viết Nghệ Tĩnh - Đà Nẵng</p>
            </div>
        </div>

        <div class="row">
            <form>
                <h3>Đăng ký để xem nhiều khoá học hơn</h3>
                <input type="text" placeholder="Họ và tên" class="box" />
                <input type="number" placeholder="Số điện thoại" class="box" />
                <input type="email" placeholder="Email" class="box" />
                <textarea name="" placeholder="Bạn muốn nhắn nhủ e-learning điều gì" id="" cols="30" rows="10"></textarea>
                <button class="btn send_request" >Gửi thôi nào!</button>
            </form>

            <iframe class="map"
                src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=đại học đông á&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <!-- footer section starts  -->
@endsection
@section('js')
    <script>
        function send_request(e) {
            e.preventDefault();
            Swal.fire(
                'Gửi yêu cầu!',
                'Bạn đã gửi yêu cầu cho quản trị viên.',
                'Thành công !'
            )
        }
        $(function() {
            $(document).on('click','.send_request',send_request)
        })
    </script>
@endsection
