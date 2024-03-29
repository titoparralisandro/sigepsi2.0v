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

    'title' => '',
    'title_prefix' => 'SIGEPSI ',
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

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>SIGEPSI 2.0v</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image ',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',

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

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-blue',
    'usermenu_image' => true,
    'usermenu_desc' => true,
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

    'layout_topnav' => null,     /* esta es para el menu horizontal  */
    'layout_boxed' => null, /* ancho de pagina no usar */
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => true,
    'layout_dark_mode' => null,  /* pone tema oscuro */

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

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

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

    'classes_body' => true,
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => 'text-sm',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => 'nav-flat nav-legacy',
    'classes_topnav' => 'navbar-light',
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
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 350,

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
    'right_sidebar_theme' => '',
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

    'enabled_laravel_mix' => false,
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
        // Sidebar items:
        [
            'can' => 'proyecto.index',
            'text' => 'Gestión de proyectos',
            'icon'    => 'fas fa-fw fa-chalkboard-teacher',
            'submenu' => [
                [
                    'text' => 'Proyectos',
                    'icon'    => 'fas fa-fw fa-paste',
                    'url'  => '/proyecto',
                ],
        ],
        ],
        [
            'can' => 'estructura.index',
            'text' => 'Estrcuturas evaluativas',
            'icon'    => 'fas fa-fw fa-list-alt',
            'submenu' => [
                [
                    'text' => 'Productos',
                    'icon' => 'fas fa-fw fa-tasks',
                    'url'  => '/producto',
                ],
                [
                    'text' => 'Items de estructuras',
                    'icon' => 'fas fa-fw fa-list-ul',
                    'url'  => '/items_estructura',
                ],
                [
                    'text' => 'Estructuras',
                    'icon'    => 'fas fa-fw fa-clipboard-list',
                    'url'  => '/estructura',
                ],
        ],
        ],
        [
            'can' => 'especialidad.index',
            'text'    => 'Administrable',
            'icon'    => 'fas fa-fw fa-cogs',
            'submenu' => [

                [
                    'text'    => 'Académico',
                    'icon'    => 'fas fa-fw fa-school',
                    'submenu' => [
                        [
                            'text' => 'Carreras',
                            'icon' => 'fas fa-fw fa-graduation-cap',
                            'url'  => '/carrera',
                        ],
                        [
                            'text' => 'Especialidades',
                            'icon' => 'fas fa-fw fa-user-graduate',
                            'url'  => '/especialidad',

                        ],
                        [
                            'text' => 'Líneas de Investigación',
                            'icon' => 'fas fa-fw fa-code-branch',
                            'url'  => '/lineas_investigacion',
                        ],
                        [
                            'text' => 'Coordinadores',
                            'icon' => 'fas fa-fw fa-users',
                            'url'  => '/coordinador',
                        ],
                        [
                            'text' => 'Asesores',
                            'icon'    => 'fas fa-fw fa-user-plus',
                            'url'  => '/asesor',
                        ],
                        [
                            'text' => 'Tipos de Asesorias',
                            'icon' => 'fas fa-fw fa-chalkboard-teacher',
                            'url'  => '/tipos_asesoria',
                        ],
                        [
                            'text' => 'Trayectos',
                            'icon' => 'fas fa-fw fa-calendar-check',
                            'url'  => '/trayecto',
                        ],
                        [
                            'text' => 'Trimestres',
                            'icon' => 'fas fa-fw fa-calendar-alt',
                            'url'  => '/trimestre',
                        ],
                        [
                            'text' => 'Turnos',
                            'icon' => 'fas fa-fw fa-clock',
                            'url'  => '/turno',
                        ],
                        ],
                    ],
            ],
        ],
        [
            // 'can' => 'usuarios.index',
            'can' => 'comunidades.index',
            'text' => 'Comunidades',
            'icon'    => 'fas fa-fw fa-city',
            'submenu' => [
                [
                    'text' => 'Comunidades',
                    'icon'    => 'fas fa-fw fa-hotel',
                    'url'  => '/comunidades',
                ],
                [
                    'can' => 'tipos_asesoria.index',
                    'text' => 'Tipos de Comunidades',
                    'icon'    => 'fas fa-fw fa-laptop-house',
                    'url'  => '/tipos_comunidad',
                ],
        ],
        ],
        [
            // 'can' => 'usuarios.index',

            'text' => 'Situaciones',
            'icon'    => 'fas fa-fw fa-handshake',
            'submenu' => [
                [
                    'can' => 'necesidad.index',
                    'text' => 'Necesidades',
                    'icon'    => 'fas fa-fw fa-book-reader',
                    'url'  => '/necesidad',
                ],
                [
                    'can' => 'banca_list',
                    'text' => 'Banco de situaciones',
                    'icon'    => 'fas fa-fw fa-landmark',
                    'url'  => '/situacion',
                ],
        ],
        ],
        ['header' => 'account_settings'],
        [
            // 'can' => 'usuarios.edit',
            'can' => 'usuarios.index',
            'text' => 'Usuarios',
            'icon'    => 'fas fa-fw fa-users',
            'submenu' => [
                [
                    'text' => 'Usuario',
                    'icon'    => 'fas fa-fw fa-user',
                    'url'  => '/usuarios',
                    // 'can' => 'usuarios.index',
                ],
                [
                    'text' => 'Roles',
                    'icon'    => 'fas fa-fw fa-users-cog',
                    'url'  => '#',
                ],
                [
                    'text' => 'Permisos',
                    'icon'    => 'fas fa-fw fa-user-lock',
                    'url'  => '#',
                ],
        ],
        ],
        [
            // 'can' => 'usuarios.index',
            'text' => 'profile',
            'url'  => '/perfil',
            'icon' => 'fas fa-fw fa-user',
        ],

        ['can' => 'reporte',
            'header' => 'Reportes',
            // // 'can' => 'usuarios.index',
        ],
        // [
        //     // // 'can' => 'usuarios.index',
        //     'text' => 'Estadísticas',
        //     'url'  => '#',
        //     'icon' => 'fas fa-fw fa-chart-bar',
        // ],
        [
            // 'can' => 'usuarios.index',
            'can' => 'reporte',
            'text' => 'Reportes',
            'url'  => 'reporte',
            'icon' => 'fas fa-fw fa-file-alt',
        ],
        [
            // 'can' => 'usuarios.index',
            //'can' => 'reporte banca',
            'text' => 'Reportes Banca Situaciones',
            'url'  => 'reporte/banca',
            'icon' => 'fas fa-fw fa-file-alt',
        ],

        [
            'header' => 'Información',
            // 'can' => '',
        ],
        [
            // // 'can' => 'comentario.index',
            'can' => 'reporte',
            'text' => 'Comentarios',
            'url'  => '/comentario',
            'icon' => 'fas fa-fw fa-comments',
        ],
        [
            // 'can' => '',
            'text' => 'Acerca de',
            'url'  => '/a_cerca_de',
            'icon' => 'fas fa-fw fa-info',
        ],
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
                    'location' => 'vendor/datatables/js/jquery.dataTables.min.js',
                    //'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables/js/dataTables.bootstrap4.min.js',
                    //'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css',
                    //'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
               [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js',
                    //'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css',
                    //'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.print.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.colVis.min.js',
                ],
               [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/responsive/js/responsive.bootstrap4.min.js',
                    //'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/responsive/css/responsive.bootstrap4.min.css',
                    //'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
               [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/responsive/js/dataTables.responsive.min.js',
                    //'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
               [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/jszip/jszip.min.js',
                ],
               [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/pdfmake/pdfmake.min.js',
                ],
               [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/pdfmake/vfs_fonts.js',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/select2/js/select2.full.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2/select2-bootstrap4-theme/select2-bootstrap4-theme.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/select2/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2/css/select2.min.css',
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
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2.all.min.js',
                    //'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Toastr' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/toastr/toastr.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/toastr/toastr.min.js',
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
        'Inputmask' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/inputmask/inputmask.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/inputmask/jquery.inputmask.min.js',
                ],
            ],
        ],
        'Bs-stepper' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/bs-stepper/js/bs-stepper.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/bs-stepper/css/bs-stepper.min.css',
                ],
            ],
        ],
        'Dropzone' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/dropzone/min/dropzone-amd-module.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/dropzone/min/dropzone.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/dropzone/dropzone.js.map',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/dropzone/min/basic.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/dropzone/min/dropzone.css',
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
            'url' => true,
            'title' => true,
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
            'use_navbar_items' => true

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
