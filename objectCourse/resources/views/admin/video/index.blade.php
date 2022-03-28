@extends('/manage/indexn')
@section('content')
    <h1 style="text-align: center;">Danh sách các Video của khóa học {{ $item_course->name }}</h1>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a class="btn btn-info btn-sm" href="{{ route('video.create', ['id_course' => $item_course->id]) }}">Thêm
                    Video</a>
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
                            <th class="col-1">
                                Tên
                            </th>
                            <th class="col-2">
                                Mô Tả
                            </th>
                            <th class="col-2">
                                Hình ảnh
                            </th>
                            <th class="col-4">
                                Video
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data_video))
                            @foreach ($data_video as $key => $item_video)
                                <tr class="item_video{{ $item_video->id }}">
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $item_video->name }}
                                    </td>

                                    <td>

                                        {{ $item_video->desc }}
                                    </td>
                                    <td>
                                        <img src="{{ $item_video->image_path }}" style="width: 150px">

                                    </td>
                                    <td>
                                        <video width="300" controls>
                                            <source src="{{ $item_video->video_path }}" type="video/mp4">
                                        </video>
                                    </td>

                                    <td class="project-actions text-right">


                                        <div>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('video.edit', ['id_course' => $item_course->id, 'id' => $item_video->id]) }}">Sửa</a>
                                            <button class="btn btn-danger btn-sm btn_delete-video"
                                                data-id="{{ $item_video->id }}"
                                                data-url="{{ route('video.delete', ['id' => $item_video->id, 'id_course' => $item_video->id]) }}"><i
                                                    class="fas fa-trash"> </i> Xóa</button>
                                        </div>
                                    </td>


                                </tr>

                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $data_video->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@endsection
@section('js')
    <script>
        function delete_video() {
            var url = $(this).data('url');
            var id = $(this).data('id');
            Swal.fire({
                title: 'Bạn có chắc chắn không ?',
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
                            $('.item_video' + id).remove();
                            Swal.fire(
                                'Dã xóa!',
                                'Bạn đã xóa.',
                                'Thành công'
                            )
                        }
                    })

                }
            })
        }
        $(function() {
            $(document).on('click', '.btn_delete-video', delete_video)
        })
    </script>
@endsection
