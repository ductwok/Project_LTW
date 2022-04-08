@extends('/manage/indexn')
@section('content')
    <h1 style="text-align: center;">Danh sách các khóa học</h1>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a class="btn btn-info btn-sm" href="{{ route('course.create') }}">Thêm khóa học</a>
                <div class="message" style="display: inline">
                    @if (session()->get('message'))
                        <span class="ml-4 text-success">{{ session()->get('message') }}</span>
                    @endif
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>

                        <tr>
                            <th class="col-1">
                                STT
                            </th>
                            <th class="col-2">
                                Tên thể khóa học
                            </th>
                            <th class="col-2">
                                Mô Tả
                            </th>
                            <th class="col-2">
                                Giá
                            </th>
                            <th class="col-1">
                                Hình ảnh
                            </th>
                            <th class="col-1">
                                Trạng thái
                            </th>
                            <th class="col-2">
                                Người thêm
                            </th>

                            <th class="col-1">
                                Thể loại
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data_course))
                            @foreach ($data_course as $key => $item_course)
                                <tr class="item_course{{ $item_course->id }}">
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $item_course->name }}
                                    </td>

                                    <td>

                                        {{ $item_course->desc }}
                                    </td>
                                    <td>

                                        {{ $item_course->price }}
                                    </td>
                                    <td>
                                        <img src="{{ $item_course->image_path }}" style="height:50px">
                                    </td>
                                    <td>
                                        @if ($item_course->status == 0)
                                            <p class="text-danger">Đóng</p>
                                        @else
                                            <p class="text-success">Mở</p>
                                        @endif
                                    </td>
                                    <td>

                                        {{ $item_course->user->name }}
                                    </td>
                                    <td>

                                        {{ $item_course->category->name }}
                                    </td>

                                    <td class="project-actions text-right">
                                        <div>
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('video.index', ['id_course' => $item_course->id]) }}"><i
                                                    class="fas fa-video"></i> Video</a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('course.edit', ['id' => $item_course->id]) }}">Sửa</a>

                                                
                                            <button class="btn btn-danger btn-sm btn_delete-course"
                                                data-id="{{ $item_course->id }}"
                                                data-url="{{ route('course.delete') }}"><i class="fas fa-trash"> </i>
                                                Xóa</button>
                                        </div>
                                    </td>


                                </tr>

                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $data_course->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@endsection
@section('js')
    <script>
        function delete_course() {
            var url = $(this).data('url');
            var id = $(this).data('id');
            Swal.fire({
                title: 'Bạn chắc chắn muốn xóa không ?',
                text: "Bạn có muốn hoàn tác không !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa !'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {
                            $('.message').html(data);
                            $('.item_course' + id).remove();
                            Swal.fire(
                                'Xóa!',
                                'Bạn đã xóa .',
                                'Thành công'
                            )
                        }
                    })
                }
            })
        }
        $(function() {
            $(document).on('click', '.btn_delete-course', delete_course)
        })
    </script>
@endsection
