@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div class="btnadd">
                <a href='insertCate'><button class="btn btn-primary">Add Category</button></a>

            </div>
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>id</strong></th>
                        <th><strong>ชื่อ</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->cate_id }}</th>
                            <th>{{ $category->catename }}</th>
                            <th>
                                {{-- <a href="/editcate/{{ $category->cate_id }}">
                                    <button type="button" class="btn btn-success">แก้ไข</button>
                                </a> --}}

                               

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_{{ $category->cate_id }}">
                                    แก้ไข
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal_{{ $category->cate_id }}" tabindex="-1"
                                    aria-labelledby="modal_{{ $category->cate_id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="get" action="{{ route('updatecate') }}">
                                                <div class="modal-body">
                                                    <div class="col-md-6">

                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="title">ชื่อหมวดหมู่</label>
                                                            <input type="hidden" value="{{ $category->cate_id }}"
                                                                name="cate_id">
                                                            <input type="text" name="catename" class="form-control"
                                                                placeholder="Enter
                                                            post title"
                                                                value="{{ $category->catename }}">
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" href="allcate">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="/deletecate/{{ $category->cate_id }}">
                                    <button type="button" class="btn btn-danger"
                                        onclick="delcate({{ $category->cate_id }})">ลบ</button>
                                </a>


                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </body>

    <script>
        function delcate(cate_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
        //   function delcate(id) {
        //     $.ajax({
        //       type: "DELETE",
        //       url: "{{ url('cate') }}/" + cate_id,
        //       headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //       }
        //       success: (response) => {
        //         if (response){
        //           if (response "success") {
        //             alert('success');
        //             location.reload();
        //         } else if (responsev == "fail") {
        //           alert("fail");
        //         }
        //       }
        //     })
        //   }
        // }
    </script>
@endsection
