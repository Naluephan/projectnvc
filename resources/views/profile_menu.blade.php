@extends('adminlte::page')
@section('css')
    <style>
        .footer-content .icon-content {
            position: absolute;
            top: 50%;
            left: 25px;
            transform: translateY(-50%);
            z-index: 2;
        }

        @media only screen and (max-width: 576px) {
            .card-body .header-text {
                padding-top: 1rem;
            }

            .footer-content .icon-content {
                top: 50%;
                left: 80px;
            }
        }

        .content {
            padding: 0 !important;
        }

        .profile-footer {
            line-height: 38px;
        }

        .profile-position {
            height: 30px;
        }

        .img-profile {
            background-image: url({{ asset('images/profile-menu/img_profile.png') }});
            background-size: cover;
        }

        .setting-image-1 {
            background-image: url({{ asset('images/profile-menu/1.png') }});
            /* replace with your image URL */
        }

        .setting-image-2 {
            background-image: url({{ asset('images/profile-menu/2.png') }});
            /* replace with your image URL */
        }

        .setting-image-3 {
            background-image: url({{ asset('images/profile-menu/3.png') }});
            /* replace with your image URL */
        }

        .setting-image-4 {
            background-image: url({{ asset('images/profile-menu/4.png') }});
            /* replace with your image URL */
        }

        .setting-image-5 {
            background-image: url({{ asset('images/profile-menu/5.png') }});
            /* replace with your image URL */
        }

        .setting-image-6 {
            background-image: url({{ asset('images/profile-menu/6.png') }});
            /* replace with your image URL */
        }

        .setting-image-7 {
            background-image: url({{ asset('images/profile-menu/7.png') }});
            /* replace with your image URL */
        }

        .setting-image-8 {
            background-image: url({{ asset('images/profile-menu/8.png') }});
            /* replace with your image URL */
        }

        .setting-image-9 {
            background-image: url({{ asset('images/profile-menu/9.png') }});
            /* replace with your image URL */
        }

        .setting-image-10 {
            background-image: url({{ asset('images/profile-menu/10.png') }});
            /* replace with your image URL */
        }

        .setting-image-11 {
            background-image: url({{ asset('images/profile-menu/11.png') }});
            /* replace with your image URL */
        }

        .setting-image-12 {
            background-image: url({{ asset('images/profile-menu/12.png') }});
            /* replace with your image URL */
        }

        .setting-image-13 {
            background-image: url({{ asset('images/profile-menu/13.png') }});
            /* replace with your image URL */
        }

        .setting-image-14 {
            background-image: url({{ asset('images/profile-menu/14.png') }});
            /* replace with your image URL */
        }

        .setting-image-15 {
            background-image: url({{ asset('images/profile-menu/15.png') }});
            /* replace with your image URL */
        }

        .setting-image-16 {
            background-image: url({{ asset('images/profile-menu/16.png') }});
            /* replace with your image URL */
        }

        .setting-image-17 {
            background-image: url({{ asset('images/profile-menu/17.png') }});
            /* replace with your image URL */
        }

        .setting-image-18 {
            background-image: url({{ asset('images/profile-menu/18.png') }});
            /* replace with your image URL */
        }
    </style>
@stop
@section('content')
    <div class="row h-100vh">
        <div class="col-12 col-sm-7 bg-light border-right p-4">
            <div class="card img-profile w-100 rounded-4 shadow-none bg-transparent">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-3 d-flex">
                            <img class="rounded-circle img-lg m-auto"
                                src="https://img5.pic.in.th/file/secure-sv1/imagec72dd098a99da40b.png" alt="image profile">
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12 pl-4">
                                    <h2 class="text-white">สวัสดี
                                        <em class="fas fa-edit float-end text-lg"></em>
                                    </h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 pl-4 mt-2">
                                    <h5 class="text-white">
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                        ({{ Auth::user()->first_name }} {{ Auth::user()->last_name }})
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent profile-footer">
                    <div class="row">
                        <div class="col-12 col-sm-3 d-flex">
                            <h2 class="w-100 bg-white profile-position rounded-pill">
                                <span class="text-md position-absolute text-hr-green-app"
                                    style="top: 3px; left: 50px">{{ Auth::user()->username }}</span>
                                <i class="fas fa-copyright position-absolute hr-text-gold" style="top: -1px"></i>
                            </h2>

                        </div>
                        <div class="col-12 col-sm-9">
                            <div class="row">
                                <div class="col-12 col-sm-6 text-md">
                                    <i class="fab fa-bitcoin hr-text-gold text-lg"></i>
                                    <span class="hr-text-gold" style="">Organic Coin : </span><span
                                        class="text-white">500 Coin</span>
                                </div>
                                <div class="col-12 col-sm-6 text-md">
                                    <i class="fas fa-star hr-text-gold text-lg"></i>
                                    <span class="hr-text-gold" style="">Organic Hero : </span><span
                                        class="text-white">Level 1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Start Card --}}


            {{-- End Card --}}

            <div class="mb-3">
                <h4 class="text-hr-green-app"><em class="fas fa-user-alt"></em> <span
                        class="h6 text-bold">ข้อมูลของฉัน</span> </h4>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.profile') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.profile*')) active @endif">
                        <span class="button-image setting-image-1 w-40"></span>
                        <span class="button-text w-60 d-flex">
                            <h6 class="my-auto text-bold">ข้อมูลส่วนตัว</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.honor') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.honor*')) active @endif">
                        <span class="button-image setting-image-2 w-40"></span>
                        <span class="button-text w-60 d-flex">
                            <h6 class="my-auto text-bold">เกียรติประวัติ</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.entryandexit') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.entryandexit*')) active @endif">
                        <span class="button-image setting-image-3 w-40"></span>
                        <span class="button-text w-60">
                            <h6>การเข้า</h6>
                            <h6>ออกงาน</h6>
                        </span>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.privatecar') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.privatecar*')) active @endif">
                        <span class="button-image setting-image-4 w-40"></span>
                        <span class="button-text w-60 d-flex">
                            <h6 class="my-auto text-bold">รถส่วนตัว</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.salary') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.salary*')) active @endif">
                        <span class="button-image setting-image-5 w-40"></span>
                        <span class="button-text w-60 d-flex">
                            <h6 class="my-auto text-bold">เงินเดือน</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.document') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.document*')) active @endif">
                        <span class="button-image setting-image-6 w-40"></span>
                        <span class="button-text w-60">
                            <h6>เอกกสาร</h6>
                            <h6>และสัญญา</h6>
                        </span>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.loginorganicsplus') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.loginorganicsplus*')) active @endif">
                        <span class="button-image setting-image-7 w-40"></span>
                        <span class="button-text w-60">
                            <h6>การเข้าสู่ระบบ</h6>
                            <h6>Organics Plus</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.transactionhistory') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.transactionhistory*')) active @endif">
                        <span class="button-image setting-image-8 w-40"></span>
                        <span class="button-text w-60">
                            <h6>ประวัติการ</h6>
                            <h6>ทำรายการ</h6>
                        </span>
                    </a>
                </div>
            </div>
            {{--     end row       --}}

            <div class="col-12 mb-3">
                <h4 class="text-hr-green-app"><em class="fas fa-praying-hands"></em> <span
                        class="h6 text-bold">สวัสดิการ</span>
                </h4>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.equipment') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.equipment*')) active @endif">
                        <span class="button-image setting-image-9 w-40"></span>
                        <span class="button-text w-60 d-flex">
                            <h6 class="my-auto text-bold">อุปกรณ์</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.holiday') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.holiday*')) active @endif">
                        <span class="button-image setting-image-10 w-40"></span>
                        <span class="button-text w-60 d-flex">
                            <h6 class="my-auto text-bold">วันลาหยุด</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.socialsecurity') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.socialsecurity*')) active @endif">
                        <span class="button-image setting-image-11 w-40"></span>
                        <span class="button-text w-60 d-flex">
                            <h6 class="my-auto text-bold">ประกันสังคม</h6>
                        </span>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.organicscoins') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.organicscoins*')) active @endif">
                        <span class="button-image setting-image-12 w-40"></span>
                        <span class="button-text w-60">
                            <h6>Organics</h6>
                            <h6>Coins</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.savings') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.savings*')) active @endif">
                        <span class="button-image setting-image-13 w-40"></span>
                        <span class="button-text w-60 d-flex">
                            <h6 class="my-auto text-bold">เงินออม</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.reservefund') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.reservefund*')) active @endif">
                        <span class="button-image setting-image-14 w-40"></span>
                        <span class="button-text w-60">
                            <h6>กองทุนสำรอง</h6>
                            <h6>เลี้ยงชีพ</h6>
                        </span>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.groupinsurance') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.groupinsurance*')) active @endif">
                        <span class="button-image setting-image-15 w-40"></span>
                        <span class="button-text w-60 d-flex">
                            <h6 class="my-auto text-bold">ประกันกลุ่ม</h6>
                        </span>
                    </a>
                </div>
            </div>
            {{-- start row News Category --}}

            <div class="col-12 mb-3">
                <h4 class="text-hr-green-app"><em class="fas fa-mountain"></em> <span class="h6 text-bold">ภารกิจ</span>
                </h4>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.organicshero') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.organicshero*')) active @endif">
                        <span class="button-image setting-image-16 w-40"></span>
                        <span class="button-text w-60">
                            <h6>Organics</h6>
                            <h6>Hero</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.organicsmaintenance') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.organicsmaintenance*')) active @endif">
                        <span class="button-image setting-image-17 w-40"></span>
                        <span class="button-text w-60">
                            <h6>Organics</h6>
                            <h6>(แจ้งซ่อมบำรุง)</h6>
                        </span>
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('profile.comment') }}"
                        class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.comment*')) active @endif">
                        <span class="button-image setting-image-18 w-40"></span>
                        <span class="button-text w-60">
                            <h6>เสนอความ</h6>
                            <h6>คิดเห็น</h6>
                        </span>
                    </a>
                </div>
            </div>
            {{-- End row News Category --}}

        </div>
        <div class="col-12 col-sm-5 bg-white p-4">
            @yield('side-card-profile')
            @yield('js')
        </div>
    </div>


@stop
