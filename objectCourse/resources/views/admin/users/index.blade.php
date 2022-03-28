@extends('/manage/indexn')
@section('content')
    <h1 style="text-align: center;">Danh sách tài khoản người dùng</h1>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a class="btn btn-info btn-sm" href="{{ route('user.create') }}">Thêm người dùng</a>
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
                                Tên người dùng
                            </th>
                            <th class="col-2">
                                Email
                            </th>
                            <th class="col-1">
                                Hình ảnh
                            </th>
                            <th class="col-1">
                                Address
                            </th>
                            <th class="col-2">
                                Phone
                            </th>
                            <th class="col-1">
                                Role
                            </th>
                            <th class="col-2">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data_user))
                            @foreach ($data_user as $key => $item_user)
                                <tr class="item_user{{ $item_user->id }}">
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $item_user->name }}
                                    </td>

                                    <td>

                                        {{ $item_user->email }}
                                    </td>
                                    <td>
                                        <img src="{{ $item_user->image_path }}" style="height:50px">
                                    </td>
                                    <td>
                                        {{ $item_user->address }}
                                    </td>
                                    <td>

                                        {{ $item_user->phone }}
                                    </td>
                                    <td>
                                        @if ($item_user->is_admin)
                                            <p class="text-danger">Admin</p>
                                        @else
                                            <p class="text-success">User</p>
                                        @endif
                                    </td>

                                    <td class="project-actions text-right">
                                        <div>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('user.edit', ['id' => $item_user->id]) }}">Sửa</a>
                                            <button class="btn btn-danger btn-sm btn_delete-user"
                                                data-id="{{ $item_user->id }}"
                                                data-url="{{ route('user.delete') }}"><i class="fas fa-trash"> </i>
                                                Xóa</button>
                                        </div>
                                    </td>


                                </tr>

                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $data_user->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@endsection
@section('js')
    <script>
        function delete_user() {
            var url = $(this).data('url');
            var id = $(this).data('id');
            Swal.fire({
                title: 'Bạn có chắc chắn không ?',
                text: "Bạn có muốn hoàn tác không!",
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
                            $('.item_user' + id).remove();
                            Swal.fire(
                                'Xóa !',
                                'Bạn đã xóa.',
                                'Thành công'
                            )
                        }
                    })
                }
            })
        }
        $(function() {
            $(document).on('click', '.btn_delete-user', delete_user)
        })
    </script>
@endsection
