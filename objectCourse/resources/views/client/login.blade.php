<html>
  <head>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="{{ asset('css/styless.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
      <form>
        @csrf
          <h1>Đăng Ký</h1>
          {{-- <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          </div> --}}
            <input type="text" placeholder="Tên" class="reg_name">     
       
            <input type="email" placeholder="Email" class="reg_email">    
    
            <input type="text" placeholder="Số điện thoại" class="reg_phone">

            <input type="text" placeholder="Địa chỉ" class="reg_address">
  
            <input type="password" placeholder="Mật khẩu" class="reg_password">
     
            <input type="password" placeholder="Nhập lại mật khẩu" class="reg_password2">

            <div class="message_pass"></div>
            <input type="hidden" class="reg_image" value="https://pbs.twimg.com/profile_images/661849802808926209/iTJBkswa_400x400.jpg">
          <br />
            <!-- <button type="submit" class=""><a style="text-decoration: none; color:white;">Sign up</a></button> -->
            <button class="sub_register" data-url="{{ route('logins.register') }}">Tạo!</button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form method="post" action="{{ route('logins.login') }}">
          @csrf
          <h1>Đăng Nhập</h1>
          {{-- <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          </div> --}}
          {{-- <span>or use your account</span> --}}
          <input type="email" name="log_email" placeholder="Email" />
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

          <input type="password" name="log_password" placeholder="Mật khẩu" />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @if (session()->get('message'))
            <div class="text-danger">{{ session()->get('message') }}</div>
          @endif
          <a href="{{ route('logins.resetpass') }}">Quên mật khẩu?</a>
          <button type="submit" class=""><a style="text-decoration: none; color:white;">Đăng nhập</a></button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>CHÀO MỪNG BẠN QUAY TRỞ LẠI!</h1>
            <p>
              Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn
            </p>
            <button class="ghost" id="signIn">Đăng Nhập</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Xin Chào!</h1>
            <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
            <button class="ghost" id="signUp">Đăng ký</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      const signUpButton = document.getElementById("signUp");
      const signInButton = document.getElementById("signIn");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
      });
      signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
      });
    </script>
    <script>
      function sub_register(e){
        e.preventDefault();
        var url = $(this).data('url');
        var name = $('.reg_name').val();
        var phone = $('.reg_phone').val();
        var email = $('.reg_email').val();
        var address = $('.reg_address').val();
        var image = $('.reg_image').val();
        var password = $('.reg_password').val();
        var password2 = $('.reg_password2').val();
        $.ajax({
          url:url,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method:"POST",
          data:{
            name:name,
            phone:phone,
            email:email,
            address:address,
            image:image,
            password:password,
            password2:password2
          },
          success:function(data){
            $('.message_pass').html(data);
          }
        })
        
      }
      $(function(){
        $(document).on('click','.sub_register',sub_register)
      })
    </script>
  </body>
</html>
