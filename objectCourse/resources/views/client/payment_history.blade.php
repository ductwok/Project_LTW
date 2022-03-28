@extends('client.layout.dashboard')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/stylessssssss.css') }}">
@endsection
@section('content')
    <div class="container justify-content-center mt-50 mb-50">
        <h2>Lịch sử thanh toán</h2>

    </div>
    <div class="container justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-10">
                <?php
                if (auth()->check()) {
                    $check = true;
                } else {
                    $check = false;
                }
                ?>
                @if ($check)
                <?php $user = App\User::find(auth()->user()->id); ?>
                    @foreach ($user->my_course_payment as $item_course)
                        <div class="card card-body mb-3 col-12">
                            <div
                                class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="mr-2 mb-3 mb-lg-0"> <img src="https://i.imgur.com/5Aqgz7o.jpg" width="150"
                                        height="150" alt=""> </div>
                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold"> <a href="#" data-abc="true"
                                            style="font-size:20px;">{{ $item_course->name }}</a> </h6>
                                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"
                                                style="font-size:16px;">Giảng Viên : {{ $item_course->user->name }}</a></li>
                                    </ul>
                                    <p class="mb-3" style="font-size:16px;">Tài khoản thanh toán : {{ auth()->user()->name }}</p>
                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item" style="font-size:16px;">Hình thức thanh toán : </li>
                                        <li class="list-inline-item" style="font-size:16px;">{{ $item_course->pivot->payment_method }}<i
                                                class="fab fa-paypal text-primary"></i></li>
                                    </ul>
                                </div>
                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                    <h3 class="mb-0 font-weight-semibold mb-5" style="font-size:20px; color:#fa1d86;">{{ $item_course->pivot->price }}
                                        VND</h3>
                                    <a href="{{ route('client.course_single',['id' => $item_course->id]) }}"type="button" class="btn btn-primary mt-4 text-white btn-lg"><i
                                            class="icon-cart-add mr-2"></i>Xem khóa học</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                @endif

            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
