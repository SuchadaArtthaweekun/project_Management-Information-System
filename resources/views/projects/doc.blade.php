@extends('layouts.web')

@section('content')
    <div class="container">
        <form action="" class="Docid">

            <body>
                <div class="titleProjects">
                    <h5>{{ $project[0]->title_th }}</h5>
                    <h5> {{ $project[0]->title_en }}</h5>
                </div>

                <ul>
                    <li>ผู้จัดทำ : {{ $project[0]->author }} {{ $project[0]->co_author }}</li>
                    {{-- <li>ที่ปรึกษา : {{ $project[0]->adviser}}  {{ $project[0]->co_adviser}}</li> --}}
                    <li>ที่ปรึกษา : {{ $project[0]->adviser_fullname_th }}
                        {{-- @foreach ($project as $pro)
                            @foreach ($adviser as $adv)
                                <?php if ($pro->adviser == $adv->adviser_id) {
                                    echo $adv->adviser_fullname_th;
                                }
                                
                                if ($pro->co_adviser == $adv->adviser_id) {
                                    echo $adv->adviser_fullname_th;
                                } ?>
                               
                            @endforeach
                        @endforeach --}}


                    </li>
                    <li>
                        หมวดหมู่โครงงาน : {{ $project[0]->catename }}

                    </li>
                </ul>
                <div class="abs">
                    <p>
                        {{ $project[0]->abtract }}
                    </p>
                </div>
                <p>ยอดเข้าชม : {{ $project[0]->view_counter }} ยอดดาวน์โหลด : {{ $documents[0]->download_counter }}
                    <?php
                    // if ($project[0]->project_id = $documents[0]->project_id) {
                    //     echo $documents[0]->download_counter ;
                    // }
                    ?>

                </p>

                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th>ลำดับ.</th>
                            <th>ชื่อไฟล์</th>
                            <th>ประเภท</th>
                            <th>ดู</th>
                            <th>ดาวน์โหลด</th>
                        </tr>
                        {{-- @foreach ($files as $key => $file) --}}
                        @foreach ($project as $key => $file)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $file->docname }}</td>
                                <td>{{ $file->doc_type }}</td>
                                <td class="view"><a href="/documents/{{ $file->docname }}" target="_blank"> <i
                                            class="fa-solid fa-eye"></i>
                                
                                <td class="download">
                                    <a href="/get-file/{{ $file->doc_id }}/{{ $file->docname }}" target="_blank"
                                        class="a_download">
                                        <div class="download">
                                            <x-icons.download />
                                            <div class="sumdownload">
                                                <?php
                                                if ($file->doc_id = $file->doc_id) {
                                                    echo $file->download_counter;
                                                }
                                                ?>
                                            </div>
                                        </div>


                                    </a>
                                </td>
                                {{-- <td><a href="/file/download/{{$file->docname}}"><?php if (projects . project_id == documents . project_id) {
                                    echo $file;
                                } ?></a></td> --}}


                            </tr>
                        @endforeach



                    </table>

                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
                </script>

            </body>
        </form>
    </div>
@endsection
