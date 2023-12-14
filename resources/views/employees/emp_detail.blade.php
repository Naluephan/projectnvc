@extends('adminlte::page')
{{-- header --}}
@section('content_header_title')
    ข้อมูลพนักงาน
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> ข้อมูลพนักงาน </li>
@stop

{{-- end header --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body card-outline card-cyan">
                        @php
                            $profile_img = asset('uploads/images/employee/profilef.png');
                            if ($emp->gender_id == 1) {
                                $profile_img = asset('uploads/images/employee/profile.png');
                            }
                            if ($emp->image) {
                                $profile_img = asset("uploads/images/employee/{$emp->image}");
                            }
                            $full_name = $emp->pre_name . $emp->f_name . ' ' . $emp->l_name . ' (' . $emp->n_name . ')';
                            function convertDateFormat($inputDate)
                            {
                                // แยกปี เดือน และวัน
                                $parts = explode('-', $inputDate);
                                $year = $parts[0];
                                $month = $parts[1];
                                $day = $parts[2];

                                // แปลงเดือนเป็นชื่อเดือน
                                $monthNames = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
                                $monthName = $monthNames[(int) $month - 1];

                                // แสดงผลลัพธ์
                                $result = $day . ' ' . $monthName . ' พ.ศ. ' . $year;

                                return $result;
                            }

                            $birthday = convertDateFormat($emp->birthday);
                        @endphp
                        <center>
                            <img src="{{ $profile_img }}" alt="avatar" class="rounded-circle img-fluid" id="profile"
                                style="width: 150px;">
                            <h5 class="" id="full_name">{{ $full_name }}</h5>
                            <p class="text-muted mb-1" id="company">{{ $emp->company->name_th }}</p>
                            <p class="text-muted mb-4" id="position">ตำแหน่ง {{ $emp->position->name_th }}</p>
                        </center>
                        <hr>
                        <h6>Level</h6>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body card-outline card-cyan">
                        <h3>ข้อมูลพนักงาน</h3>
                        <p class="ml-5 mt-3"><b>ชื่อ-สกุล</b> {{ $full_name }}</p>
                        <p class="ml-5"><b>เพศ</b> {{ $emp->gender_id }}</p>
                        <p class="ml-5"><b>วันเกิด</b> {{ $birthday }}</p>
                        <p class="ml-5"><b>บัตรประชาชน</b> {{ $emp->id_card }}</p>
                        <p class="ml-5"><b>ที่อยู่</b> {{ $emp->current_add }}</p>
                        <p class="ml-5"><b>เบอร์โทร</b> {{ $emp->mobile }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                            </div>
                          </nav>
                          <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">1</div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">2</div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">3</div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(() => {
            $(".select2").select2({
                width: "100%",
            });
        })
    </script>
@stop
