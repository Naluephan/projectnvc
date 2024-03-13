@extends("adminlte::page")
@section('css')
    <style>
        .content {
            padding: 0 !important;
        }

        .setting-image-1 {
            background-image: url('https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662'); /* replace with your image URL */
        }
        .setting-image-2 {
            background-image: url('https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662'); /* replace with your image URL */
        }
        .setting-image-3 {
            background-image: url('https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662'); /* replace with your image URL */
        }
        .setting-image{
            background-image: url({{asset('images/menu/building.png')}}); /* replace with your image URL */
        }


    </style>
@stop
@section('content')
    <div class="row h-100vh">
        <div class="col-12 col-sm-7 bg-light border-right p-4">
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-warehouse"></em> <span class="h6">คลังเก็บอุปกรณ์และทรัพย์สินบริษัท</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.tools')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.tools*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>หมวดหมู่</h6>
                                <h6>อุปกรณ์</h6>
                            </span>
                        </a>
                    </div>

                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.asset')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.asset*')) active @endif">
                            <span class="button-image setting-image-2 w-40"></span>
                            <span class="button-text w-60">
                                <h6>หมวดหมู่</h6>
                                <h6>ทรัพย์สิน</h6>
                            </span>
                        </a>
                    </div>


                </div>
            </div>
{{--     end row       --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-users"></em> <span class="h6">บุคลากร</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.department')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.department*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>แผนก</h6>
                                <h6>และตำแหน่ง</h6>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            {{--     end row       --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-chalkboard-teacher"></em> <span class="h6">งานอำนวยการ</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.building')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.building*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>อาคาร</h6>
                                <h6>สถานที่</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.security')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.security*')) active @endif">
                            <span class="button-image setting-image w-40"></span>
                            <span class="button-text w-60">
                                <h6>รักษาความ</h6>
                                <h6>ปลอดภัย</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.cleanness')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.cleanness*')) active @endif">
                            <span class="button-image setting-image w-40"></span>
                            <span class="button-text w-60">
                                <h6>รักษา</h6>
                                <h6>ความสะอาด</h6>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.maintenance')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.maintenance*')) active @endif">
                            <span class="button-image setting-image w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto">ซ่อมบำรุง</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.pickuptools')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.pickuptools*')) active @endif">
                            <span class="button-image setting-image w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto">เบิกอุปกรณ์</h6>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            {{--     end row       --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-business-time"></em> <span class="h6">วันและเวลาทำงาน</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.worktime')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.worktime*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>เวลาเข้า-ออก</h6>
                                <h6>การทำงาน</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.holiday')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.holiday*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>วันหยุด</h6>
                                <h6>ประจำปี</h6>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            {{--     end row       --}}
        </div>
        <div class="col-12 col-sm-5 bg-white p-4">
            @yield('side-card')
            @yield('js')
        </div>
    </div>


@stop
