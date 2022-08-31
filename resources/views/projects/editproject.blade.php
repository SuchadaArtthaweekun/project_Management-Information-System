<head>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/style.css'); ?>">
</head>
{{-- add users --}}
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_addproject">
    Add project
</button>
<!-- Modal -->
<div class="modal fade" id="modal_addproject" tabindex="-1" aria-labelledby="modal_addproject" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <form method="get" action="{{ route('addproject') }}"> --}}
                <form method="get" action="{{ route('addproject') }}">
                <div class="modal-body">
                    <div class="col-md-12">

                        @csrf
                        <div class="form-group">
                            <label for="author">ชื่อผู้ทำคนที่ 1</label>
                            <input type="hidden" name="id">
                            <input type="text" name="author" class="form-control" placeholder="ชื่อผู้ทำคนที่ 1">
                        </div>

                        <div class="form-group">
                            <label for="co_auther">ชื่อผู้ทำคนที่ 2</label>
                            <input type="text" name="co_auther" class="form-control" placeholder="ชื่อ-สกุล (อังกฤษ)">
                        </div>

                        <div class="form-group">
                            <label for="title_th">ชื่อโครงงาน (ไทย)</label>
                            <input type="text" name="title_th" class="form-control" placeholder="ชื่อโครงงาน (ไทย)">
                        </div>

                        <div class="form-group">
                            <label for="title_en">ชื่อโครงงาน (อังกฤษ)</label>
                            <input type="text" name="title_en" class="form-control" placeholder="ชื่อโครงงาน (อังกฤษ)">
                        </div>

                        <div class="form-group">
                            <label for="edition">ปีที่เผยแพร่</label>
                            <input type="number" placeholder="YYYY" min="2017" max="2100" name="edition" action="datepicker" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="article">บทความ</label>
                            <textarea name="article" id="article" cols="30" rows="4" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="abtract">บทคัดย่อ</label>
                            <textarea name="abtract" id="abtract" cols="30" rows="4" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="adviser">ที่ปรึกษา</label>
                            <input type="text" name="adviser" class="form-control" placeholder="ที่ปรึกษา">
                        </div>

                        <div class="form-group">
                            <label for="co_adviser">ที่ปรึกษาร่วม</label>
                            <input type="text" name="co_adviser" class="form-control" placeholder="ที่ปรึกษาร่วม">
                        </div>
                        <div class="form-group">
                            <label for="co_adviser">เพิ่มไฟล์</label>
                            <input type="file" name="co_adviser" id="datepicker" class="form-control" placeholder="ที่ปรึกษาร่วม">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" href="{{ route('alluser') }}">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector("input[type=number]")
    .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
  </script>