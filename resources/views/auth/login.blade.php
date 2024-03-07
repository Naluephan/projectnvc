@extends('auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

{{--@section('auth_header', __('adminlte::adminlte.login_message'))--}}
@section('css')
    <style>
        .login-page {
            background: url({{asset('images/bg.svg') }}) no-repeat 0, 0;
            height: 100vh;
            background-position: center;
            background-size: cover;
            position: relative;
        }
        .login-page:before {
            position: absolute;
            content: " ";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -10;
            background-color: rgba(0, 0, 0, 0);
        }
        .login-logo a, .register-logo a {
            color: #ffffff !important;
        }
    </style>
@stop
@section('auth_body')
    <form action="{{ $login_url }}" method="post">
        @csrf

        {{-- Email field --}}
        <div class="mb-3">
            <span class="mx-2 fas fa-hashtag text-hr-orange"></span><label for="username" class="text-hr-green text-sm">{{ __('adminlte::adminlte.username') }}</label>
            <input type="text" name="username" class=" rounded-5 form-control @error('username') is-invalid @enderror"
                   value="{{ old('username') }}" placeholder="{{ __('adminlte::adminlte.username') }}" autofocus>

{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text rounded-left rounded-5">--}}
{{--                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>--}}
{{--                </div>--}}
{{--            </div>--}}

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="mb-3">
            <span class="mx-2 fas fa-unlock-alt text-hr-orange"></span><label for="username" class="text-hr-green text-sm">{{ __('adminlte::adminlte.password') }}</label>
            <input type="password" name="password" class=" rounded-5 form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}">

{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text rounded-left rounded-5 ">--}}
{{--                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>--}}
{{--                </div>--}}
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
{{--        </div>--}}

        {{-- Login field --}}
{{--        <div class="row">--}}
{{--            <div class="col-7">--}}
{{--                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">--}}
{{--                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                    <label for="remember">--}}
{{--                        {{ __('adminlte::adminlte.remember_me') }}--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
        <div class="row">
            <div class="col-12 pt-3">
                <button type=submit class="btn btn-block  {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
{{--                    <span class="fas fa-sign-in-alt"></span>--}}
                    {{ __('adminlte::adminlte.sign_in') }}
                </button>
            </div>
        </div>

    </form>
@stop

@section('auth_footer')
{{--     Password reset link --}}
    @if($password_reset_url)
        <p class=" m-auto text-sm " style="margin-top: -20px !important;">
            <a class="text-hr-orange" href="{{ $password_reset_url }}">
                {{ __('adminlte::adminlte.i_forgot_my_password') }}
            </a>
        </p>
    @endif

{{--    --}}{{-- Register link --}}
{{--    @if($register_url)--}}
{{--        <p class="my-0">--}}
{{--            <a href="{{ $register_url }}">--}}
{{--                {{ __('adminlte::adminlte.register_a_new_membership') }}--}}
{{--            </a>--}}
{{--        </p>--}}
{{--    @endif--}}
@stop
