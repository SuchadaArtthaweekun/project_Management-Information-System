@extends('layouts.fordashboard')

@section('content')

<body>
    <div class="container">
        
        <div class="row">
            <div class="col-md-6">
                <form method="get" action="{{route('updatecate')}}">
                @csrf
                    <div class="form-group">
                        <label for="title">ชื่อหมวดหมู่</label>
                        <input type="hidden" value="{{$categories->cate_id}}" name="cate_id">
                        <input type="text" name="catename" class="form-control" placeholder="Enter
                        post title" value="{{$categories->catename}}">
                    </div>
                    <button  type="submit" href="allcate">ยืนยัน</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+Or
CXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu
735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMM
V+rV" crossorigin="anonymous"></script>
</body>
    
@endsection