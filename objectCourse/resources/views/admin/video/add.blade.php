@extends('/manage/indexn')
@section('content')
<h1 style="text-align: center;">Thêm Video khóa học "{{ $item_course->name }}"</h1>

<form method="post" action="{{ route('video.store',['id_course'=>$item_course->id]) }}" enctype="multipart/form-data">
@csrf
<section class="content m-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Video</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Tên</label>
                <input type="text" id="inputName" class="form-control" name="name">
              </div>
              <input type="hidden" value="{{ $item_course->id }}" name="course_id">
              <div class="form-group">
                <label for="inputdesc">Mô tả</label>
                <textarea id="inputdesc" class="form-control"  name="desc" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputimage">Hình ảnh</label>
                <input type="file" id="inputimage" class="form-control" name="image">
              </div>
              <div class="form-group">
                <img src="#" id="img_preview" style="width:200px;">
              </div>
              <div class="form-group">
                <label for="inputvideo">Video</label>
                <input type="file" id="inputvideo" class="form-control" name="video">
              </div>
              <div class="form-group">
                <video width="300" id="video_preview" controls>
                  <source src="#" type="video/mp4">
                </video>
              </div>
              
              
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('video.index',['id_course'=>$item_course->id]) }}" class="btn btn-secondary">Hủy</a>
          <button type="submit"  class="btn btn-success ">Thêm Video</button>
        </div>
      </div>
    </section>
</form>


@endsection
@section('js')
  <script>
    var preview_image = function(event) {
      var output = document.getElementById('img_preview');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
    var preview_video = function(evt) {
      var $source = $('#video_preview');
      $source[0].src = URL.createObjectURL(this.files[0]);
      $source.parent()[0].load();
    }

    $(function(){
      $(document).on('change','#inputimage',preview_image)
      $(document).on('change','#inputvideo',preview_video)
    })
    
  </script>
@endsection