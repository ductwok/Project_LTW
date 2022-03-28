@extends('client.layout.dashboard')
@section('content')
      <!-- header section ends -->

      <section class="heading">
        <h3 name= title>VỀ EASY-LEARN</h3>
        <p><a href="{{ route('client.home') }}">Trang Chủ >></a> VỀ EASY LEARN</p>
      </section>
  
      <!-- about section starts  -->
  
      <section class="about">
        <div class="image">
          <img src="images/about-img.png" alt="" />
        </div>
  
        <div class="content">
          <h3>EASY LEARN thân thiện, dễ tiếp cận, tiếp thu</h3>
          <p>
            <span style="color: #fa1d86; font-weight: bold">EASY LEARN</span> sẽ
            đồng hành cùng bạn xuyên suốt quá trình học tập và làm việc của bạn
          </p>
          <a href="{{ route('client.home') }}" class="btn">Bắt đầu học nào!</a>
        </div>
      </section>
  
      <!-- about section ends -->
@endsection