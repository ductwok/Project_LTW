@extends('client.layout.dashboard')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/stylessssss.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-12 col-lg-11 col-xl-10">
                <div class="card card0">
                    <div class="row payment">
                        <div class="col-md-6 d-block p-0 box">
                            <div class="card rounded-0 border-0 card1 pr-xl-4 pr-lg-3">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <h3 class="text-center mt-4 mb-4" id="heading0">Thông tin hóa đơn</h3>
                                    </div>
                                </div>
                                <a href="{{ route('client.view_product_detail',['id' => $course->id]) }}">
                                    <div class="row justify-content-center">
                                        <div class="col-5 fit-image"> <img src="{{ $course->image_path }}" height="200px"
                                                width="200px"> </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <h1 class="text-center mt-4 mb-0" id="sub-heading1" style="text-decoration: none;">{{ $course->name }}</h1>
                                        </div>
                                    </div>
                                </a>
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <a href="{{ route('client.profile',['id' => $course->user->id]) }}">
                                            <p class="text-center mt-0 mb-3" id="sub-heading2" style="text-decoration: none;">Giảng viên :
                                                {{ $course->user->name }} </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <p class="text-center mt-0 mb-3" id="sub-heading2">Đơn giá : <span
                                                style="color:#fa1d86;"> <?php echo number_format($course->price, 0); ?> VND</span>
                                        </p>
                                        <?php
                                        $vnd_to_usd = $course->price / 22810;
                                        ?>
                                        <input class="price_total" data-url={{ route('client.payment_handle') }}
                                            data-id="{{ $course->id }}" id="price_total" type="text"
                                            value="{{ round($vnd_to_usd, 2) }}" hidden="true">
                                    </div>
                                </div>
                                <div class="form-card p-4 pl-5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-12"> <label class="gift"
                                                        style="font-size:15px;">Tên khách hàng</label> </div>
                                                <div class="col-12">
                                                    <h3 class="gift-input">{{ $user->name }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-12"> <label class="gift"
                                                        style="font-size:15px;">Địa chỉ</label>
                                                </div>
                                                <div class="col-12">
                                                    <h3 class="gift-input">{{ $user->address }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12"> <label class="gift"
                                                style="font-size:15px;">Email</label><br>
                                            <h3 class="gift-input">{{ $user->email }}</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12"> <label class="gift"
                                                style="font-size:15px;">Số điện thoại</label><br>
                                            <h3 class="gift-input">{{ $user->phone }}</h3>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-12"> <label class="gift">Số điện thoại</label><br>
                                            <input class="gift-input" type="text" name="msg"
                                                placeholder="Happy Birthday dear friend !"> </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>        
                        <div class="col-md-6 col-sm-12 p-0 box">
                            <div class="card rounded-0 border-0 card2">
                                <div class="form-card">
                                    <h2 id="heading" class="text-center">Phương thức thanh toán</h2>
                                    <div class="radio-group text-center" id="list_method_payment"
                                        data-url="{{ route('client.course_single', ['id' => $course->id]) }}">
                                        @if (isset($_GET['orderId']))
                                            <div class="alert alert-primary" role="alert">
                                                <h2 class="alert-heading">Khóa học đã được thanh toán !</h2>
                                                <p style="font-size:15px;">Đơn hàng đã được thanh toán thành công qua cổng
                                                    thanh toán {{ $_GET['orderType'] }} .</p>
                                                <p style="font-size:15px;">Bây giờ bạn có thể truy cập vào khóa này. <i
                                                        class="far fa-grin-beam"></i> <i class="far fa-grin-beam"></i> <i
                                                        class="far fa-grin-beam"></i></p>
                                                <hr>
                                                <a href="{{ route('client.course_single', ['id' => $course->id]) }}" type="button" class="btn btn-primary btn-lg">Xem
                                                    khóa học</a>
                                            </div>
                                        @else
                                            <div class="text-center mt-5">
                                                <div id="paypal-button"></div>
                                            </div>

                                            <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="{{ route('client.payment_momo') }}">
                                                @csrf
                                                <input type="text" name="total_momo" value="{{ $course->price }}"
                                                    hidden="true">
                                                <input type="text" name="course_id" value="{{ $course->id }}"
                                                    hidden="true">
                                                <input type="text" name="user_id" value="{{ auth()->user()->id }}"
                                                    hidden="true">
                                                {{-- <button type="submit" class="text-center mb-4" style="padding: 10px 6px;
                                                background: rgb(243, 165, 178);
                                                width: 351px;
                                                margin: auto;
                                                border-radius: 29px;
                                                font-size: 14px;"><img src="{{ asset('Images/logo_momo.png') }}"
                                                        style="width:27px;"> Thanh toán atm MOMO</button> --}}
                                            </form>
                                            <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="{{ route('client.payment_momo_qr') }}">
                                                @csrf
                                                <input type="text" name="total_momo" value="{{ $course->price }}"
                                                hidden="true">
                                                <input type="text" name="course_id" value="{{ $course->id }}"
                                                hidden="true">
                                                <input type="text" name="user_id" value="{{ auth()->user()->id }}"
                                                hidden="true">
                                                {{-- <button type="submit" class="text-center mb-4" style=" padding: 10px 6px;
                                                background: #c05d95;
                                                width: 351px;
                                                margin: auto;
                                                border-radius: 29px;
                                                font-size: 14px;"><img src="{{ asset('Images/logo_momo.png') }}"
                                                        style="width:27px;"> Thanh toán mã QR MOMO</button> --}}
                                            </form>
                                        @endif



                                        {{-- <div class='radio selected' data-value="credit"><img
                                                src="https://i.imgur.com/28akQFX.jpg" width="200px" height="60px"></div>

                                        <div class='radio' data-value="paypal"><img src="https://i.imgur.com/5QFsx7K.jpg"
                                                width="200px" height="60px"></div> <br> --}}
                                    </div>
                                    {{-- <h3 id="credit" class="mb-3">Credit card</h3> <input type="text"
                                        name="holdername" placeholder="John Smith">
                                    <div class="row">
                                        <div class="col-12"> <input type="text" name="cardno" id="cr_no"
                                                placeholder="0000 0000 0000 0000" minlength="19" maxlength="19"> </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-9 col-md-7"> <input type="text" name="exp" id="exp"
                                                placeholder="MM/YY" minlength="5" maxlength="5"> </div>
                                        <div class="col-3 col-md-5"> <input type="password" name="cvcpwd"
                                                placeholder="&#9679;&#9679;&#9679;" class="placeicon" minlength="3"
                                                maxlength="3"> </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox custom-control-inline"> <input
                                                    id="chk1" type="checkbox" name="chk" class="custom-control-input">
                                                <label for="chk1" class="custom-control-label">Business account</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <h4 id="total" class="text-center">Total: $69.94 + <span
                                                        class="text-dark">VAT</span></h4>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-8"> <input type="submit" value="PURCHASE CARD"
                                                    class="btn btn-success"> </div>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        var price = document.getElementById('price_total');
        var total = price.value;
        var list_method_payment = document.getElementById('list_method_payment');
        var url_course = list_method_payment.getAttribute('data-url');
        var url_handle_payment = price.getAttribute('data-url');
        var course_id = price.getAttribute('data-id');
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'Ady_pw1oxuvGRNh8gPRIA3pMqKZ6e9V-cLfkWx_t1-InrRyRPEqTL--bo0I7g-E9BpeSSw7AotcunbPP',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'large',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: total,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    /* window.alert('Cảm ơn bạn đã thanh toán'); */
                    Swal.fire(
                        'Thanh toán thành công!',
                        'Cảm ơn bạn đã mua hàng của chúng tôi',
                        'success'
                    )
                    list_method_payment.innerHTML =
                        `<div class="alert alert-primary" role="alert"><h2 class="alert-heading">Khóa học đã được thanh toán !</h2><p style="font-size:15px;">Đơn hàng đã được thanh toán thành công qua cổng thanh toán Paypal .</p><p style="font-size:15px;">Bây giờ bạn có thể truy cập vào khóa này. <i class="far fa-grin-beam"></i> <i class="far fa-grin-beam"></i> <i class="far fa-grin-beam"></i></p><hr><a href="${url_course}" type="button" class="btn btn-primary btn-lg">Xem khóa học</a></div>`;
                    $.ajax({
                        url: url_handle_payment,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        data: {
                            course_id: course_id,
                            total: total,
                            payment_method: "Paypal"
                        },
                        success: function() {

                        },
                        error: function() {
                            alert('error')
                        }

                    })
                });
            }
        }, '#paypal-button');
    </script>
@endsection
