@extends('/manage/indexn')
@section('content')
    <h1 style="text-align: center;">Danh sách các thể loại</h1>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a class="btn btn-info btn-sm" href="{{ route('category.create') }}">Thêm thể loại</a>
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
                            <th style="width: 1%">
                                STT
                            </th>
                            <th style="width: 20%">
                                Tên thể loại
                            </th>
                            <th style="width: 30%">
                                Mô Tả
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data_category))
                            @foreach ($data_category as $key => $item_category)
                                <tr class="item_category{{ $item_category->id }}">
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $item_category->name }}
                                    </td>

                                    <td class="project_progress">

                                        {{ $item_category->desc }}
                                    </td>

                                    <td class="project-actions text-right">


                                        <div>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('category.edit', ['id' => $item_category->id]) }}">Sửa</a>
                                            <button class="btn btn-danger btn-sm btn_delete-category"
                                                data-id="{{ $item_category->id }}"
                                                data-url="{{ route('category.delete') }}"><i class="fas fa-trash"> </i>
                                                Xóa</button>
                                        </div>
                                    </td>


                                </tr>

                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $data_category->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@endsection
@section('js')
    <script>
        function delete_category() {
            var url = $(this).data('url');
            var id = $(this).data('id');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa không ?',
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
                            $('.item_category' + id).remove();
                            Swal.fire(
                                'Xóa!',
                                'Bạn đã xóa.',
                                'Thành công'
                            )
                        }
                    })
                }
            })
        }
        $(function() {
            $(document).on('click', '.btn_delete-category', delete_category)
        })
    </script>
@endsection
