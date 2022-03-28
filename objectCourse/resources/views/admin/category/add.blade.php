@extends('/manage/indexn')
@section('content')
<h1 style="text-align: center;">Thêm thể loại</h1>

<form method="post" action="{{ route('category.store') }}">
@csrf
<section class="content m-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thể loại</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Tên thể loại</label>
                <input type="text" id="inputName" class="form-control" name="name">
              </div>
              <div class="form-group">
                <label for="inputDescription">Mô tả</label>
                <textarea id="inputDescription" class="form-control"  name="desc" rows="4"></textarea>
              </div>
              
              
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('category.index') }}" class="btn btn-secondary">Hủy</a>
          <button type="submit"  class="btn btn-success ">Thêm chủ đề</button>
        </div>
      </div>
    </section>
</form>


@endsection