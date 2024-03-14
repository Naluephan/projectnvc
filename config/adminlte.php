<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Organics HR',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Organics</b> HR',
    'logo_img' => 'images/logo/hrplust.jpg',
    'logo_img_class' => 'brand-image rounded-circle elevation-0',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Organics HR',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'HR Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => false,
        'img' => [
            'path' => 'images/logo/organics-logo.png',
            'alt' => 'Preloader Image',
            'effect' => 'animation__shake',
            'width' => 120,
            'height' => 80,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => false,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline accent-gray',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => 'rounded-4',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-hr-orange rounded-5',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => 'accent-olive text-sm',
    'classes_brand' => 'border-0',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-olive border-0 elevation-0',
    'classes_sidebar_nav' => 'nav-flat nav-compact',
    'classes_topnav' => 'navbar-dark bg-hr-green-app border-0 navbar-badge',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light1',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => false,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => true,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'ค้นหา',
            'topnav_right' => false,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => false,
        ],

        // Sidebar items:
//        [
//            'type' => 'sidebar-menu-search',
//            'text' => 'ค้นหา',
//        ],
        [
            'text'    => 'หน้าหลัก',
            'icon'    => 'fas fa-fw fa-home',
            'url'     => '#',
            'active'     => ['regex:@^zzzz@'],
//            'label'       => 4,
//            'label_color' => 'hr-menu',
//            'submenu' => [
//                [
//                    'text'    => 'ภาพรวมองค์กร',
//                    'url'     => '#',
//                ],
//                [
//                    'text' => 'สถิติการมาทำงาน',
//                    'active'     => ['regex:@^home@'],
//                    'url'  => '#',
//                ],
//                [
//                    'text' => 'การแจ้งเดือน',
//                    'url'  => '#',
//                    'label'       => 4,
//                    'label_color' => 'hr-menu',
//                ],
//            ],
        ],
//        [
//            'text'        => 'pages',
//            'url'         => 'admin/pages',
//            'icon'        => 'far fa-fw fa-file',
//            'label'       => 4,
//            'label_color' => 'hr-menu',
////            'active'     => ['regex:@^home@'],
//        ],

//        ['header' => 'องค์กร'],
//        [
//            'text'    => 'โครงสร้างองค์กร',
//            'icon'    => 'fas fa-fw fa-sitemap',
//            'submenu' => [
//                [
//                    'text' => 'บริษัท',
//                    'url'  => '/companies/list',
//                    'active'   => ['regex:@^companies/list@'],
//                ],
//                [
//                    'text' => 'หน่วยงาน',
//                    'url'  => '/department/list',
//                    'active'   => ['regex:@^department/list@'],
//                ],
//                [
//                    'text'    => 'ตำแหน่ง',
//                    'url'  => '/position/list',
//                    'active'   => ['regex:@^position/list@'],
//                ],
//                [
//                    'text' => 'ระดับพนักงาน',
//                    'url'  => '/level/list',
//                    'active'   => ['regex:@^level/list@'],
//                ],
//            ],
//        ],
//        [
//            'text'    => 'ข้อมูลพนักงาน',// (Employee Management)
//            'icon'    => 'fas fa-fw fa-users-line',
//            'label'       => 1,
//            'label_color' => 'hr-menu',
//            'submenu' => [
//                [
//                    'text' => 'พนักงาน',
//                    'url'  => '/employees/list',
//                    'active'     => ['regex:@^employees@'],
//                ],
//                [
//                    'text'    => 'อบรมพนักงานใหม่',
//                    'url'     => '#',
//                    'label'       => 1,
//                    'label_color' => 'hr-menu',
//                ],
//                [
//                    'text'    => 'แจ้งเตือนพนักงาน',
//                    'url'     => '/news/notice/employee',
//                ],
//            ],
//        ],
//        [
//            'text'    => 'กฎระเบียบ',
//            'icon'    => 'fas fa-fw fa-scale-balanced',
//            'submenu' => [
//                [
//                    'text' => 'ระเบียบพนักงาน',
//                    'url'  => '#',
//                ],
//                [
//                    'text'    => 'การแต่งกาย',
//                    'url'  => '#',
//                ],
//                [
//                    'text' => 'การเข้างาน',
//                    'url'     => '#',
//                ],
//            ],
//        ],
//        [
//            'text'    => 'สวัสดิการ',//Welfare
//            'icon'    => 'far fa-fw fa-face-smile',
//            'submenu' => [
//                [
//                    'text'    => 'วันหยุด',
//                    'url'     => '/holiday/list',
//                ],
//                [
//                    'text' => 'จัดการฝึกอบรมและสัมมนา',
//                    'url'  => '/tas/list',
//                ],
//                [
//                    'text' => 'RewardCoins',
//                    'url'  => '/rewardcoin/list',
//                ],
//            ],
//        ],
//        ['header' => 'การลงเวลาทำงาน'],
//        [
//            'text' => 'การลงเวลาทำงาน',
//            'url'  => 'admin/settings',
//            'icon' => 'fas fa-fw fa-calendar-days',
//            'label'       => 3,
//            'label_color' => 'hr-menu',
//            'submenu' => [
//                [
//                    'text' => 'การลงเวลาทำงาน',
//                    'url'  => '/pastecard/list',
//                    'icon' => 'fas fa-fw fa-business-time',
//                ],
//                [
//                    'text' => 'การลางาน',
//                    'url'  => '/empleave/list',
//                    'icon' => 'fas fa-fw fa-person-walking-arrow-right',
//                    'label'       => 3,
//                    'label_color' => 'hr-menu',
//                ],
//            ]
//        ],

//        ['header' => 'เงินเดือน'],
//        [
//            'text'    => 'เงินเดือน',
//            'icon'    => 'fas fa-fw fa-money-bill-wave',
//            'submenu' => [
//                [
//                    'text' => 'ค่าล่วงเวลา',
//                    'url'  => 'admin/settings',
//                    'icon' => 'far fa-fw fa-clock',
//
//                ],
//                [
//                    'text' => 'เงินเดือน',
//                    'url'  => '/saraly/list',
//                    'icon' => 'fas fa-fw fa-money-bill-wave',
//                ],
//                [
//                    'text' => 'สลิปเงินเดือน',
//                    'url'  => 'admin/settings',
//                    'icon' => 'fas fa-fw fa-file-lines',
//                ],
//                [
//                    'text' => 'แม่แบบเงินเดือน',
//                    'url'  => '/saraly/template/list',
//                    'icon' => 'fas fa-fw fa-file-lines',
//                ],
//
//                [
//                    'text' => 'แจ้งขอสลิปเงินเดือนย้อนหลัง',
//                    'url'  => '/request/saraly/slip',
//                    'icon' => 'fas fa-fw fa-file-lines',
//                ],
//            ],
//        ],
        [
            'text'    => 'ภาพรวมและสถิติ',
            'icon'    => 'fas fa-fw fa-chart-line',
            'url'  => '#',
            'active'     => ['regex:@^zzzz@'],

        ],
        [
            'text'    => 'งานของฉัน',
            'icon'    => 'fas fa-fw fa-user-tag',
            'submenu' => [
                [
                    'text' => 'เป้าหมายการทำงาน',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-crosshairs',
                    'active'     => ['regex:@^zzzz@'],

                ],
                [
                    'text' => 'งานที่ได้รับมอบหมาย',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-user-check',
                    'active'     => ['regex:@^zzzz@'],
                ],
                [
                    'text' => 'สิ่งที่ต้องทำ',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-clipboard-list',
                    'active'     => ['regex:@^zzzz@'],
                ],
                [
                    'text' => 'โน๊ต',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-clipboard',
                    'active'     => ['regex:@^zzzz@'],
                ],

            ],
        ],
        [
            'text'    => 'ประกาศและข่าวสาร',
            'icon'    => 'fas fa-fw fa-bullhorn',
            'submenu' => [
                [
                    'text' => 'เพิ่มรายการประกาศและข่าวสาร',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-plus',
                    'active'     => ['regex:@^zzzz@'],
                ],
                [
                    'text' => 'รายการประกาศ',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-list-ul',
                    'active'     => ['regex:@^zzzz@'],
                ],

            ],
        ],
        [
            'text'    => 'บุคคลากร',
            'icon'    => 'fas fa-fw fa-users',
            'submenu' => [
                [
                    'text' => 'เพิ่มบุคคลากร',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-user-plus',
                    'active'     => ['regex:@^zzzz@'],

                ],
                [
                    'text' => 'รายชื่อบุคคลากร',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-list-ul',
                    'active'     => ['regex:@^zzzz@'],
                ],

            ],
        ],
        [
            'text'    => 'งานอำนวยการ',
            'icon'    => 'fas fa-fw fa-chalkboard-teacher',
            'submenu' => [
                [
                    'text' => 'สร้างงานใหม่',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-plus-circle',
                    'active'     => ['regex:@^zzzz@'],
                ],
                [
                    'text' => 'ตารางงาน',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-archive',
                    'active'     => ['regex:@^zzzz@'],
                ],
                [
                    'text' => 'รายการงาน',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-clipboard-list',
                    'active'     => ['regex:@^zzzz@'],
                ],
                [
                    'text' => 'รายการการจัดการ',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-tasks',
                    'active'     => ['regex:@^zzzz@'],
                ],
            ],
        ],
        [
            'text'    => 'คลัง (เก็บอุปกรณ์)',
            'icon'    => 'fas fa-fw fa-warehouse',
            'submenu' => [
                [
                    'text' => 'เพิ่มรายการอุปกรณ์',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-plus-circle',
                    'active'     => ['regex:@^zzzz@'],

                ],
                [
                    'text' => 'รายการอุปกรณ์',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-list',
                    'active'     => ['regex:@^zzzz@'],
                ],

            ],
        ],
        [
            'text'    => 'บัญชีทรัพย์สินบริษัท',
            'icon'    => 'fas fa-fw fa-chair',
            'submenu' => [
                [
                    'text' => 'เพิ่มรายการทรัพย์สิน',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-plus-circle',
                    'active'     => ['regex:@^zzzz@'],

                ],
                [
                    'text' => 'รายการทรัพย์สิน',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-list',
                    'active'     => ['regex:@^zzzz@'],
                ],

            ],
        ],
        [
            'text' => 'รายงานสถานการณ์',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-building',
            'active'     => ['regex:@^zzzz@'],
        ],
        [
            'text'    => 'Organics Hero',
            'icon'    => 'fas fa-fw fa-building',
            'submenu' => [
                [
                    'text' => 'เพิ่มภารกิจ',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-plus-circle',
                    'active'     => ['regex:@^zzzz@'],

                ],
                [
                    'text' => 'รายการภารกิจ',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-list',
                    'active'     => ['regex:@^zzzz@'],
                ],
                [
                    'text' => 'ส่งภารกิจ',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-flag',
                    'active'     => ['regex:@^zzzz@'],
                ],
            ],
        ],
//        ['header' => 'ข้อมูลส่วนตัว'],
        [
            'text' => 'การตั้งค่า',
            'url'  => '/config',
            'icon' => 'fas fa-fw fa-cog',
            'active'     => ['regex:@^config@'],
        ],
        [
            'text' => 'โปรไฟล์',
            'url'  => 'profile',
            'icon' => 'fas fa-fw fa-user',
            'active'     => ['regex:@^profile@'],

        ],
//        [
//            'text' => 'เปลี่ยนรหัสผ่าน',
//            'url'  => 'admin/settings',
//            'icon' => 'fas fa-fw fa-lock',
//        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
