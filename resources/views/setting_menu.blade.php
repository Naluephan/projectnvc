@extends("adminlte::page")
@section('css')
    <style>
        .content {
            padding: 0 !important;
        }

        .setting-image-1 {
            background-image: url({{asset('images/menu/1.png')}}); /* replace with your image URL */
        }
        .setting-image-2 {
            background-image: url({{asset('images/menu/2.png')}}); /* replace with your image URL */
        }
        .setting-image-3 {
            background-image: url({{asset('images/menu/3.png')}}); /* replace with your image URL */
        }
        .setting-image-4{
            background-image: url({{asset('images/menu/4.png')}}); /* replace with your image URL */
        }

        .setting-image-5{
            background-image: url({{asset('images/menu/5.png')}}); /* replace with your image URL */
        }

        .setting-image-6{
            background-image: url({{asset('images/menu/6.png')}}); /* replace with your image URL */
        }

        .setting-image-7{
            background-image: url({{asset('images/menu/7.png')}}); /* replace with your image URL */
        }

        .setting-image-8{
            background-image: url({{asset('images/menu/8.png')}}); /* replace with your image URL */
        }

        .setting-image-9{
            background-image: url({{asset('images/menu/9.png')}}); /* replace with your image URL */
        }

        .setting-image-10{
            background-image: url({{asset('images/menu/10.png')}}); /* replace with your image URL */
        }


    </style>
@stop
@section('content')
    <div class="row h-100vh">
        <div class="col-12 col-sm-7 bg-light border-right p-4">
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-warehouse"></em> <span class="h6 text-bold">คลังเก็บอุปกรณ์และทรัพย์สินบริษัท</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.tools')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.tools*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6 class="text-bold">หมวดหมู่</h6>
                                <h6 class="text-bold">อุปกรณ์</h6>
                            </span>
                        </a>
                    </div>

                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.asset')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.asset*')) active @endif">
                            <span class="button-image setting-image-2 w-40"></span>
                            <span class="button-text w-60">
                                <h6 class="text-bold">หมวดหมู่</h6>
                                <h6 class="text-bold">ทรัพย์สิน</h6>
                            </span>
                        </a>
                    </div>


                </div>
            </div>
{{--     end row       --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-users"></em> <span class="h6 text-bold">บุคลากร</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.department')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.department*')) active @endif">
                            <span class="button-image setting-image-3 w-40"></span>
                            <span class="button-text w-60">
                                <h6 class="text-bold">แผนก</h6>
                                <h6 class="text-bold">และตำแหน่ง</h6>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            {{--     end row       --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-chalkboard-teacher"></em> <span class="h6 text-bold">งานอำนวยการ</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.building')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.building*')) active @endif">
                            <span class="button-image setting-image-4 w-40"></span>
                            <span class="button-text w-60">
                                <h6 class="text-bold">อาคาร</h6>
                                <h6 class="text-bold">สถานที่</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.security')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.security*')) active @endif">
                            <span class="button-image setting-image-5 w-40"></span>
                            <span class="button-text w-60">
                                <h6 class="text-bold">รักษาความ</h6>
                                <h6 class="text-bold">ปลอดภัย</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.cleanness')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.cleanness*')) active @endif">
                            <span class="button-image setting-image-6 w-40"></span>
                            <span class="button-text w-60">
                                <h6 class="text-bold">รักษา</h6>
                                <h6 class="text-bold">ความสะอาด</h6>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.maintenance')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.maintenance*')) active @endif">
                            <span class="button-image setting-image-7 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">ซ่อมบำรุง</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.pickuptools')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.pickuptools*')) active @endif">
                            <span class="button-image setting-image-8 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">เบิกอุปกรณ์</h6>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            {{--     end row       --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-business-time"></em> <span class="h6 text-bold">วันและเวลาทำงาน</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.worktime')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.worktime*')) active @endif">
                            <span class="button-image setting-image-9 w-40"></span>
                            <span class="button-text w-60">
                                <h6 class="text-bold">เวลาเข้า-ออก</h6>
                                <h6 class="text-bold">การทำงาน</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{route('config.holiday')}}" class="menu-button p-0 w-100 @if(Route::currentRouteNamed('*config.holiday*')) active @endif">
                            <span class="button-image setting-image-10 w-40"></span>
                            <span class="button-text w-60">
                                <h6 class="text-bold">วันหยุด</h6>
                                <h6 class="text-bold">ประจำปี</h6>
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
