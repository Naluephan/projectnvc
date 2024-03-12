<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar pr-0">
{{--        <div class="user-panel pt-2 pb-2 bg-body-secondary rounded-end-pill">--}}
{{--            <div class="image m-auto d-flex">--}}
{{--                <img src="{{Auth::user()->path_image == null ? asset('uploads/images/employee/profile.png'):asset(Auth::user()->path_image) }}" class="img-circle elevation-0 border" alt="User Image">--}}
{{--                <a href="#" class="d-block text-black flex-fill m-auto pl-2">{{Auth::user()->first_name}} {{Auth::user()->last_name}} </a>--}}
{{--            </div>--}}

{{--        </div>--}}
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul>
        </nav>
    </div>

</aside>
