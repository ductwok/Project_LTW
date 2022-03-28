@extends('/manage/indexn')
@section('content')
<h1 style="text-align: center;">Cập nhật category "{{ $item_category->name }}"</h1>
<form method="post" action="{{ route('category.update',['id' => $item_category->id]) }}">
@csrf
<section class="content m-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Chủ đề</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Tên chủ đề</label>
                <input type="text" id="inputName" class="form-control" name="edit_name" value="{{ $item_category->name }}">
              </div>
              <div class="form-group">
                <label for="inputDescription">Mô tả</label>
                <textarea id="inputDescription" class="form-control"  name="edit_desc" rows="4">{{$item_category->desc}}</textarea>
              </div>

              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="row">
        <div class="col-12">
          <a href="{{ route('category.index') }}" class="btn btn-secondary">Hủy</a>
          <button type="submit"  class="btn btn-success ">lưu</button>
        </div>
      </div>
      </div>
      
    </section>
</form>


@endsection