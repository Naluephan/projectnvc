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
                                    <img class="rounded-circle img-lg m-auto" src="https://img5.pic.in.th/file/secure-sv1/imagec72dd098a99da40b.png" alt="image profile">
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
                                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} ({{ Auth::user()->first_name }} {{ Auth::user()->last_name }})
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
                                        <span class="text-md position-absolute text-hr-green-app" style="top: 3px; left: 50px">{{ Auth::user()->username }}</span>
                                        <i class="fas fa-copyright position-absolute hr-text-gold" style="top: -1px"></i>
                                    </h2>

                                </div>
                                <div class="col-12 col-sm-9">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 text-md">
                                            <i class="fab fa-bitcoin hr-text-gold text-lg"></i>
                                            <span class="hr-text-gold" style="">Organic Coin : </span><span class="text-white">500 Coin</span>
                                        </div>
                                        <div class="col-12 col-sm-6 text-md">
                                            <i class="fas fa-star hr-text-gold text-lg"></i>
                                            <span class="hr-text-gold" style="">Organic Hero : </span><span class="text-white">Level 1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            {{-- Start Card --}}
{{--            <div class="header pr-3 py-3 rounded-4">--}}
{{--                <div class="card rounded-4 bg-hr-card">--}}
{{--                    <div class="card-body img-profile py-3 rounded-4">--}}
{{--                        <div class="icon-edit d-flex justify-content-end">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 25px;">--}}
{{--                                <path--}}
{{--                                    d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"--}}
{{--                                    style="fill:white" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-sm-3">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <div class="header-profile">--}}
{{--                                            <div class="flex-shrink-0 d-flex justify-content-center">--}}
{{--                                                <img src="https://img5.pic.in.th/file/secure-sv1/imagec72dd098a99da40b.png"--}}
{{--                                                    alt="Generic placeholder image" class="img-fluid rounded-circle"--}}
{{--                                                    style="width: 100px;">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12">--}}
{{--                                        <div class="footer-content py-2"--}}
{{--                                            style="display: flex; justify-content: center; align-items: center;">--}}
{{--                                            <svg class="icon-content" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                viewBox="0 0 512 512" width="35px">--}}
{{--                                                <path--}}
{{--                                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm117.1 346.8c-1.6 1.9-39.8 45.7-109.9 45.7-84.7 0-144.5-63.3-144.5-145.6 0-81.3 62-143.4 143.8-143.4 67 0 102 37.3 103.4 38.9a12 12 0 0 1 1.2 14.6l-22.4 34.7c-4 6.3-12.8 7.4-18.2 2.3-.2-.2-26.5-23.9-61.9-23.9-46.1 0-73.9 33.6-73.9 76.1 0 39.6 25.5 79.7 74.3 79.7 38.7 0 65.3-28.3 65.5-28.6 5.1-5.6 14.1-5 18.5 1.1l24.5 33.6a12 12 0 0 1 -.6 14.9z"--}}
{{--                                                    style="fill:gold" />--}}
{{--                                            </svg>--}}
{{--                                            <div class="text-buttom rounded-4"--}}
{{--                                                style="height: 30px; width: 160px; background-color: white; display: flex; justify-content: center; align-items: center;">--}}
{{--                                                <span class="text-bold">{{ Auth::user()->username }}</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-12 col-sm-7">--}}
{{--                                <div class="header-text">--}}
{{--                                    <h2 style="color: white;">สวัสดี</h2>--}}
{{--                                    <h5 style="color: white;">{{ Auth::user()->first_name }}--}}
{{--                                        {{ Auth::user()->last_name }}--}}
{{--                                        ({{ Auth::user()->first_name }} {{ Auth::user()->last_name }})</h5>--}}
{{--                                </div>--}}
{{--                                <div class="footer-content pt-4 pb-2">--}}
{{--                                    <div class="row pt-2">--}}
{{--                                        <div class="col-12 col-sm-6 pb-2">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"--}}
{{--                                                style="width: 25px;">--}}
{{--                                                <path--}}
{{--                                                    d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-141.7-35.3c4.9-33-20.2-50.7-54.6-62.6l11.1-44.7-27.2-6.8-10.9 43.5c-7.2-1.8-14.5-3.5-21.8-5.1l10.9-43.8-27.2-6.8-11.2 44.7c-5.9-1.3-11.7-2.7-17.4-4.1l0-.1-37.5-9.4-7.2 29.1s20.2 4.6 19.8 4.9c11 2.8 13 10 12.7 15.8l-12.7 50.9c.8 .2 1.7 .5 2.8 .9-.9-.2-1.9-.5-2.9-.7l-17.8 71.3c-1.3 3.3-4.8 8.4-12.5 6.5 .3 .4-19.8-4.9-19.8-4.9l-13.5 31.1 35.4 8.8c6.6 1.7 13 3.4 19.4 5l-11.3 45.2 27.2 6.8 11.2-44.7a1038.2 1038.2 0 0 0 21.7 5.6l-11.1 44.5 27.2 6.8 11.3-45.1c46.4 8.8 81.3 5.2 96-36.7 11.8-33.8-.6-53.3-25-66 17.8-4.1 31.2-15.8 34.7-39.9zm-62.2 87.2c-8.4 33.8-65.3 15.5-83.8 10.9l14.9-59.9c18.4 4.6 77.6 13.7 68.8 49zm8.4-87.7c-7.7 30.7-55 15.1-70.4 11.3l13.5-54.3c15.4 3.8 64.8 11 56.8 43z"--}}
{{--                                                    style="fill:gold" />--}}
{{--                                            </svg>--}}
{{--                                            <span class="text-md text-bold pl-1" style="color: gold;">Organic Coin : </span>--}}
{{--                                            <span class="text-md " style="color: white;">500 Coin</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-12 col-sm-6 pb-2">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"--}}
{{--                                                style="width: 25px;">--}}
{{--                                                <path--}}
{{--                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"--}}
{{--                                                    style="fill:gold" />--}}
{{--                                            </svg>--}}
{{--                                            <span class="text-md text-bold pl-1" style="color: gold;">Organic Hero :--}}
{{--                                            </span><span class="text-md "style="color: white;">Level 1</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            {{-- End Card --}}

            <div class="row">
                <div class="col-12 mb-3">
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
            </div>
            {{--     end row       --}}
            <div class="row">
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
            </div>
            {{-- start row News Category --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="text-hr-green-app"><em class="fas fa-mountain"></em> <span
                            class="h6 text-bold">ภารกิจ</span> </h4>
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
            </div>
            {{-- End row News Category --}}

        </div>
        <div class="col-12 col-sm-5 bg-white p-4">
            @yield('side-card-profile')
            @yield('js')
        </div>
    </div>


@stop
