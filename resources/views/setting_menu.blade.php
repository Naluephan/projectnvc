@extends('adminlte::page')
@section('css')
    <style>
        .content {
            padding: 0 !important;
        }

        .setting-image-1 {
            background-image: url({{ asset('images/menu/1.png') }});
            /* replace with your image URL */
        }

        .setting-image-2 {
            background-image: url({{ asset('images/menu/2.png') }});
            /* replace with your image URL */
        }

        .setting-image-3 {
            background-image: url({{ asset('images/menu/3.png') }});
            /* replace with your image URL */
        }

        .setting-image-4 {
            background-image: url({{ asset('images/menu/4.png') }});
            /* replace with your image URL */
        }

        .setting-image-5 {
            background-image: url({{ asset('images/menu/5.png') }});
            /* replace with your image URL */
        }

        .setting-image-6 {
            background-image: url({{ asset('images/menu/6.png') }});
            /* replace with your image URL */
        }

        .setting-image-7 {
            background-image: url({{ asset('images/menu/7.png') }});
            /* replace with your image URL */
        }

        .setting-image-8 {
            background-image: url({{ asset('images/menu/8.png') }});
            /* replace with your image URL */
        }

        .setting-image-9 {
            background-image: url({{ asset('images/menu/9.png') }});
            /* replace with your image URL */
        }

        .setting-image-10 {
            background-image: url({{ asset('images/menu/10.png') }});
            /* replace with your image URL */
        }

        .setting-image-administ {
            background-image: url({{ asset('images/menu/administ.jpg') }});
            /* replace with your image URL */
        }
        .setting-image-company {
            background-image: url({{ asset('images/menu/company.png') }});
            /* replace with your image URL */
        }
        .setting-image-leave {
            background-image: url({{ asset('images/menu/leaveType.jpg') }});
            /* replace with your image URL */
        }

        .setting-image-12 {
            background-image: url({{ asset('images/menu/12.png') }});
            /* replace with your image URL */
        }
    </style>leaveType
@stop
@section('content')
    <div class="row h-100vh">
        <div class="col-12 col-sm-7 bg-light border-right p-4">
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-warehouse"></em> <span
                            class="h6 text-bold">คลังเก็บอุปกรณ์และทรัพย์สินบริษัท</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.tools') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.tools*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>หมวดหมู่</h6>
                                <h6>อุปกรณ์</h6>
                            </span>
                        </a>
                    </div>

                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.asset') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.asset*')) active @endif">
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
                    <h4 class="text-hr-green-app"><em class="fas fa-users"></em> <span class="h6 text-bold">บุคลากร</span>
                    </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('companies.create') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*companies.create*')) active @endif">
                            <span class="button-image setting-image-company w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">บริษัท</h6>
                                {{-- <h6>และตำแหน่ง</h6> --}}
                            </span>
                        </a>
                    </div>

                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.department') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.department*')) active @endif">
                            <span class="button-image setting-image-3 w-40"></span>
                            <span class="button-text w-60">
                                <h6>แผนก</h6>
                                <h6>และตำแหน่ง</h6>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            {{-- start row News Category --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><i class="fa-regular fa-newspaper"></i> <span
                            class="h6 text-bold">ข่าวสาร</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('news.topic.category') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*news.topic.category*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>ข่าวสาร</h6>
                                <h6>กิจกรรม</h6>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            {{-- End row News Category --}}

            {{--     end row       --}}

            {{-- start row Administrative work Categories --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-chalkboard-teacher"></em> <span
                            class="h6 text-bold">งานอำนวยการ</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('administrative.work.categories') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*administrative.work.categories*')) active @endif">
                            <span class="button-image setting-image-administ w-40"></span>
                            <span class="button-text w-60">
                                <h6 class="text-bold">เพิ่มประเภท</h6>
                                <h6 class="text-bold">งานอำนวยการ</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.building') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.building*')) active @endif">
                            <span class="button-image setting-image-4 w-40"></span>
                            <span class="button-text w-60">
                                <h6>อาคาร</h6>
                                <h6>สถานที่</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.security') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.security*')) active @endif">
                            <span class="button-image setting-image-5 w-40"></span>
                            <span class="button-text w-60">
                                <h6>รักษาความ</h6>
                                <h6>ปลอดภัย</h6>
                            </span>
                        </a>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.cleanness') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.cleanness*')) active @endif">
                            <span class="button-image setting-image-6 w-40"></span>
                            <span class="button-text w-60">
                                <h6>รักษา</h6>
                                <h6>ความสะอาด</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.maintenance') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.maintenance*')) active @endif">
                            <span class="button-image setting-image-7 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">ซ่อมบำรุง</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.pickuptools') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.pickuptools*')) active @endif">
                            <span class="button-image setting-image-8 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">เบิกอุปกรณ์</h6>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            {{-- End row Administrative work Categories --}}

            {{--     end row       --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-business-time"></em> <span
                            class="h6 text-bold">วันและเวลาทำงาน</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.worktime') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.worktime*')) active @endif">
                            <span class="button-image setting-image-9 w-40"></span>
                            <span class="button-text w-60">
                                <h6>เวลาเข้า-ออก</h6>
                                <h6>การทำงาน</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.holiday') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.holiday*')) active @endif">
                            <span class="button-image setting-image-10 w-40"></span>
                            <span class="button-text w-60">
                                <h6>วันหยุด</h6>
                                <h6>ประจำปี</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('categories.leave.create') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*categories.leave.create*')) active @endif">
                            <span class="button-image setting-image-leave w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">ประเภทวันหยุด</h6>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            {{--     end row       --}}

            {{-- start Item Organics Coins --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-users"></em> <span class="h6 text-bold">Organics
                            Coins</span> </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('config.itemorganicscoins') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*config.itemorganicscoins*')) active @endif">
                            <span class="button-image setting-image-12 w-40"></span>
                            <span class="button-text w-60">
                                <h6>Item</h6>
                                <h6>Organics Coins</h6>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            {{-- End Item Organics Coins --}}

        </div>
        <div class="col-12 col-sm-5 bg-white p-4">
            @yield('side-card')
            @yield('js')
        </div>
    </div>


@stop
