@extends('client.layout.dashboard')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('content')
    <!-- header section ends -->
    <section class="heading">
        <h3>KHÓA HỌC {{ $item_course->name }}</h3>
        <p><a href="{{ route('client.home') }}">Trang Chủ >></a> Bài Giảng</p>
    </section>

    <!-- course-3 section starts  -->

    <section class="course-3">
        @if (auth()->check())
            @if (auth()->user()->my_course_payment->contains('id', $item_course->id))
                @foreach ($item_course->video as $item_video)
                    <div class="box" data-toggle="modal" data-target="#exampleModalCenter{{ $item_video->id }}">
                        <div class="video">
                            <i class="fas fa-play"></i>
                            {{-- <img src="https://i.ytimg.com/vi/DiUzrz2G_Cw/maxresdefault.jpg" alt=""> --}}
                            <video src="{{ $item_video->video_path }}"></video>
                        </div>
                        <div class="content">
                            <h3>{{ $item_video->name }}</h3>
                            <p>Bởi {{ $item_course->user->name }}</p>
                        </div>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $item_video->id }}">
                  Launch demo modal
                </button> --}}
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter{{ $item_video->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">{{ $item_video->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <video width="100%" controls>
                                        <source src="{{ $item_video->video_path }}" type="video/mp4">
                                    </video>
                                    <h2 class="mt-3">{{ $item_video->desc }}</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <h2>Bạn chưa tham gia khóa học này hoặc chưa thanh toán !</h2>
            <a href="{{ route('client.view_product_detail',['id' => $item_course->id]) }}" style="font-size:15px;">Nhấn đường link này để mua khóa học này</a>
            @endif
        @else
            <h2>Bạn chưa tham gia khóa học này hoặc chưa thanh toán !</h2>
            <a href="{{ route('client.view_product_detail',['id' => $item_course->id]) }}">Nhấn đường link này để mua khóa học này</a>
        @endif
    </section>

    <!-- footer section starts  -->

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
