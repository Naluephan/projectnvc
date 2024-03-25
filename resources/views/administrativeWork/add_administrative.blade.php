@extends('adminlte::page')
@section('css')

    <style>
        .content {
            padding: 0 !important;
        }

        .image-administ {
            background-image: url({{ asset('images/menu/administ.jpg') }});
        }
        .image-administ, .image-administ-profile {
            max-width: 100%;
            justify-content: center;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .image-administ-profile {
            /* max-height: 10rem; */
            padding: 1rem;
        }
        .bg-danger {
            background-color: #e6896a !important;
        }
        .border-danger {
            color: #136E68 !important;
            border-color: #e6896a !important;
        }

        .image-profile {
            max-width:100%;
            min-height: 1rem;
        }
       
    </style>
@stop
@section('content')
   <div class="container-fluid">
    <div class="row h-100vh">
        <div class="col-12 col-sm-7 bg-light border-right p-4">
            <div class="row text-center p-3 bg-danger">
                <div class="col-2">รูปภาพ</div>
                <div class="col-2">ประเภทงาน</div>
                <div class="col-2">รายการ</div>
                <div class="col-2">วัน-เวลาที่เริ่ม</div>
                <div class="col-2">ผู้รับงาน</div>
                <div class="col-2">ความเร่งด่วน</div>
            </div>
            <div class="row text-center mt-3 mb-3 bg-white rounded-3 border border-danger">
                <div class="col-2 rounded-start image-administ"></div>
                <div class="col-2 p-3 m-auto">ประเภทงาน</div>
                <div class="col-2 p-3 m-auto">รายการ</div>
                <div class="col-2 p-3 m-auto">วัน-เวลาที่เริ่ม</div>
                <div class="col-2 p-3">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('images/menu/emp1.png') }}" class="image-profile rounded-circle img-fluid" alt="profile">
                        </div>
                        <div class="col-6 m-auto">ผู้รับงาน</div>
                    </div>
                </div>
                <div class="col-2 p-3 m-auto">ความเร่งด่วน</div>
            </div>
        </div>
        <div class="col-12 col-sm-5 bg-white p-4">
            @yield('side-card')
            @yield('js')
        </div>
    </div>
   </div>
@stop
