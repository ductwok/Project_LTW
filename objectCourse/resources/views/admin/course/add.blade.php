@extends('/manage/indexn')
@section('content')
<h1 style="text-align: center;">Thêm Khóa học</h1>

<form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
@csrf
<section class="content m-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Khóa học</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Tên khóa học</label>
                <input type="text" id="inputName" class="form-control" name="name">
              </div>
              <div class="form-group">
                <label for="inputDescription">Mô tả</label>
                <textarea id="inputDescription" class="form-control"  name="desc" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputName">Giá khóa học</label>
                <input type="number" id="inputPrice" class="form-control" name="price">
              </div>
              <div class="form-group">
                <label for="inputimage">Hình ảnh</label>
                <input type="file" id="inputimage" class="form-control" name="image">
              </div>
              <div class="form-group">
                <img src="#" id="img_preview" style="width:200px;">
              </div>
              <div class="form-group">
                <label for="inputstatus">Trạng thái</label>
                <select class="form-control" id="inputstatus" name="status">
                  <option value="0">Đóng</option>
                  <option value="1" selected>Mở</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputDescription">Thể loại</label>
                <select class="form-control" id="inputstatus" name="category_id">
                  <option value="">Chọn thể loại</option>
                  @foreach ($data_category as $item_category)
                    <option value="{{ $item_category->id }}">{{ $item_category->name }}</option>                   
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="inputDescription">Người thêm</label>
                <select class="form-control" id="inputstatus" name="user_id">
                  <option value="">Chọn người thêm</option>                    
                  @foreach ($data_users as $item_user)
                    <option value="{{ $item_user->id }}">{{ $item_user->name }}</option>                    
                  @endforeach
                </select>
              </div>
              
              
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('course.index') }}" class="btn btn-secondary">Hủy</a>
          <button type="submit"  class="btn btn-success ">Thêm Khóa học</button>
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