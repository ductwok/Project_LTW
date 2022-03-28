@extends('client.layout.dashboard')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9fa
        }

        .padding {
            padding: 3rem !important
        }

        .user-card-full {
            overflow: hidden
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px
        }

        .m-r-0 {
            margin-right: 0px
        }

        .m-l-0 {
            margin-left: 0px
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px
        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
            background: linear-gradient(to right, #ee5a6f, #f29263)
        }

        .user-profile {
            padding: 20px 0
        }

        .card-block {
            padding: 1.25rem
        }

        .m-b-25 {
            margin-bottom: 25px
        }

        .img-radius {
            border-radius: 5px
        }

        h6 {
            font-size: 14px
        }

        .card .card-block p {
            line-height: 25px
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px
            }
        }

        .card-block {
            padding: 1.25rem
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .card .card-block p {
            line-height: 25px
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .text-muted {
            color: #919aa3 !important
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .f-w-600 {
            font-weight: 600
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .user-card-full .social-link li {
            display: inline-block
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

    </style>
@endsection
@section('content')
@if (auth()->check())
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img
                                        src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius"
                                        alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{ auth()->user()->name }}</h6>
                                @if ( auth()->user()->is_admin )
                                <p>Quản trị viên</p>
                                
                                @else
                                <p>Người dùng</p>
                                    
                                @endif
                                <div style="cursor: pointer;">
                                    <i class="fas fa-edit" style="font-size:18px;"></i> <span style="font-size:12px;">Sửa thông tin</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông tin tài khoản</h6>
                                <form action="{{ route('client.update_profile') }}" method="post" class="row" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Tên người dùng</p>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail2" value="{{ auth()->user()->name }}">
                                    </div>
                                    <div >
                                        <input type="text" name="id" value="{{ auth()->user()->id }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <input type="text" name="email" class="form-control" id="exampleInputEmail3" value="{{ auth()->user()->email }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Số điện thoại</p>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail4" value="{{ auth()->user()->phone }}">
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="m-b-10 f-w-600">Địa chỉ</p>
                                        <input type="text" name="address" class="form-control" id="exampleInputEmail5" value="{{ auth()->user()->address }}">
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <a href="{{ route('client.profile',['id' => auth()->user()->id]) }}"><i class="fas fa-angle-left"></i> Quay về </a>
                                    </div>
                                </form>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="m-b-10 f-w-600">Bạn đăng tham gia 9 khóa học</p>
                                        <a href="{{ route('client.course') }}" style="font-size:13px;" class="text-muted f-w-400">Nhấn vào đây để học ngay nào <i class="far fa-grin-beam"></i> <i class="far fa-grin-beam"></i> <i class="far fa-grin-beam"></i></a>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="facebook" data-abc="true"><i
                                                class="mdi mdi-facebook feather icon-facebook facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="twitter" data-abc="true"><i
                                                class="mdi mdi-twitter feather icon-twitter twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="instagram" data-abc="true"><i
                                                class="mdi mdi-instagram feather icon-instagram instagram"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    
@endif
    
@endsection