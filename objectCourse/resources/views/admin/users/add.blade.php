@extends('/manage/indexn')
@section('content')
<h1 style="text-align: center;">Thêm Người dùng</h1>

<form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
@csrf
<section class="content m-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Người dùng</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Tên người dùng</label>
                <input type="text" id="inputName" class="form-control" name="name">
              </div>
              <div class="form-group">
                <label for="inputemail">Email</label>
                <textarea id="inputemail" class="form-control"  name="email" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputaddress">Địa chỉ</label>
                <input type="text" id="inputaddress" class="form-control" name="address">
              </div>
              <div class="form-group">
                <label for="inputpassword">Mật khẩu</label>
                <input type="password" id="inputpassword" class="form-control" name="password">
              </div>
              <div class="form-group">
                <label for="inputpassword2">Nhập lại mật khẩu</label>
                <input type="password" id="inputpassword2" class="form-control" name="password2">
              </div>
              <div class="form-group">
                <label for="inputphone">Số điện thoại</label>
                <input type="text" id="inputphone" class="form-control" name="phone">
              </div>
              <div class="form-group">
                <label for="inputimage">Hình ảnh</label>
                <input type="file" id="inputimage" class="form-control" name="image">
              </div>
              <div class="form-group">
                <img src="#" id="img_preview" style="width:200px;">
              </div>
              <div class="form-group">
                <label for="inputrole">Role</label>
                <select class="form-control" id="inputrole" name="is_admin">
                  <option value="0" selected>User</option>
                  <option value="1">Admin</option>
                </select>
              </div>
              <div class="form-group">
                @if (session()->get('message'))
                <h5 class="text-danger">{{ session()->get('message') }}</h5>
                @endif
                
              </div>
              
              
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('user.index') }}" class="btn btn-secondary">Hủy</a>
          <button type="submit"  class="btn btn-success ">Thêm người dùng</button>
        </div>
      </div>
    </section>
</form>


@endsection
@section('js')
  <script>
    var loadFile = function(event) {
      var output = document.getElementById('img_preview');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };

    $(function(){
      $(document).on('change','#inputimage',loadFile)
    })
    
  </script>
@endsection