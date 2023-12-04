@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form">


                            <div class="{{ $auth_type ?? 'login' }}-logo">
                                <a href="{{ $dashboard_url }}">

                                    @if (config('adminlte.auth_logo.enabled', false))
                                        <img src="{{ asset(config('adminlte.auth_logo.img.path')) }}"
                                             alt="{{ config('adminlte.auth_logo.img.alt') }}"
                                             @if (config('adminlte.auth_logo.img.class', null))
                                                class="{{ config('adminlte.auth_logo.img.class') }}"
                                             @endif
                                             @if (config('adminlte.auth_logo.img.width', null))
                                                width="{{ config('adminlte.auth_logo.img.width') }}"
                                             @endif
                                             @if (config('adminlte.auth_logo.img.height', null))
                                                height="{{ config('adminlte.auth_logo.img.height') }}"
                                             @endif>
                                    @else
                                        <img src="{{ asset(config('adminlte.logo_img')) }}"
                                             alt="{{ config('adminlte.logo_img_alt') }}" height="150">
                                    @endif

                                    <div>
                                        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                                    </div>
                                </a>
                            </div>

                            <div class=" {{ config('adminlte.classes_auth_card', '') }}">

                                @hasSection('auth_header')
                                    <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                                        <h3 class="card-title float-none text-center">
                                            @yield('auth_header')
                                        </h3>
                                    </div>
                                @endif

                                <div class=" bg-transparent {{ config('adminlte.classes_auth_body', '') }}">
                                    @yield('auth_body')
                                </div>

                                @hasSection('auth_footer')
                                    <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                                        @yield('auth_footer')
                                    </div>

                                @endif
                                <div class="row mt-5">
                                    <div class="col-3"> <img class="img-thumbnail bg-transparent border-0 shadow-none" src="{{asset('images/logo/cosme1.png')}}" alt="Organics cosme"></div>
                                    <div class="col-3"> <img class="img-thumbnail bg-transparent border-0 shadow-none" src="{{asset('images/logo/inno1.png')}}" alt="Organics cosme"></div>
                                    <div class="col-3"> <img class="img-thumbnail bg-transparent border-0 shadow-none" src="{{asset('images/logo/gf1.png')}}" alt="Organics cosme"></div>
                                    <div class="col-3"> <img class="img-thumbnail bg-transparent border-0 shadow-none" src="{{asset('images/logo/dr_jel1.png')}}" alt="Organics cosme"></div>

                                </div>
                            </div>

                </div>

                <div class="login100-more" style="background-image: url({{asset('images/bg4.jpg')}})">
                </div>
            </div>
        </div>
    </div>


@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
