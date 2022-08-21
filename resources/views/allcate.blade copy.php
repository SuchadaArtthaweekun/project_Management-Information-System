@extends('layouts.fordashboard')

@section('content')

<body>
    <div class="table-responsive">
        <div>
            <a href='insertCate'><button>Add Category</button></a>
            
        </div>
        <table class="table table-striped table-hover table-condensed">
          <thead>
            <tr>
              <th><strong>id</strong></th>
              <th><strong>ชื่อ</strong></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <th>{{$category->cate_id}}</th>
              <th>{{$category->catename}}</th>
              <th>
                <a href="/editcate/{{ $category->cate_id}}">
                    <button type="button" class="btn btn-success" >แก้ไข</button>
                </a>
                <a href="/deletecate/{{ $category->cate_id}}">
                    <button type="button" class="btn btn-danger" onclick="delcate({{ $category->cate_id }})">ลบ</button>
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