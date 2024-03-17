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
    </style>
@stop
@section('content')
    <div class="row h-100vh">
        <div class="col-12 col-sm-7 bg-light border-right p-4">
            <div class="card text-center">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
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
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">เกียรติประวัติ</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.entryandexit') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.entryandexit*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
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
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">รถส่วนตัว</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.salary') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.salary*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">เงินเดือน</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.document') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.document*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
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
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>การเข้าสู่ระบบ</h6>
                                <h6>Organics Plus</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.transactionhistory') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.transactionhistory*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
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
                    <h4 class="text-hr-green-app"><em class="fas fa-prayemng-hands"></em> <span
                            class="h6 text-bold">สวัสดิการ</span>
                    </h4>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.equipment') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.equipment*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">อุปกรณ์</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.holiday') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.holiday*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">วันลาหยุด</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.socialsecurity') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.socialsecurity*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
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
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>Organics</h6>
                                <h6>Coins</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.savings') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.savings*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60 d-flex">
                                <h6 class="my-auto text-bold">เงินออม</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.reservefund') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.reservefund*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
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
                            <span class="button-image setting-image-1 w-40"></span>
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
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>Organics</h6>
                                <h6>Hero</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.organicsmaintenance') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.organicsmaintenance*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
                            <span class="button-text w-60">
                                <h6>Organics</h6>
                                <h6>(แจ้งซ่อมบำรุง)</h6>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('profile.comment') }}"
                            class="menu-button p-0 w-100 @if (Route::currentRouteNamed('*profile.comment*')) active @endif">
                            <span class="button-image setting-image-1 w-40"></span>
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
