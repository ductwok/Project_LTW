<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home</title>
    
    <!-- font awesome cdn link  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/stylesss.css') }}" />
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
    <!-- header section starts  -->

    @include('client.partial.header')

    <!-- header section ends -->

    <!-- home section starts  -->

    @yield('content')

    <!-- home section ends -->

    <!-- categories section starts  -->
    {{-- <section class="course-2">
      <div class="box">
        <div class="image">
          <img src="images/main-course-1.png" alt="" />
        </div>
        <div class="content">
          <span>PHP</span>
          <a href="/course-3"><h3>PHP using Laravel Framework</h3></a>
          <p>Laravel là một framework nổi tiếng của ngôn ngữ PHP</p>
          <a href="/course-3" class="btn">Xem thêm</a>
          <div class="icons">
            <a href="#"> <i class="fas fa-book"></i> 12 modules </a>
            <a href="#"> <i class="fas fa-clock"></i> 6 hours </a>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- categories section ends -->

    <!-- footer section starts  -->

    @include('client.partial.footer')

    <!-- footer section ends -->

    <!-- custom js file link  -->
    <script src="{{ asset('js/scriptsss.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
    
</body>

</html>
