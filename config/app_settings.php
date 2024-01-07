<?php
// config/app_settings.php
return [
    // sistema
    'logo' => 'storage/images/app/guzanet.png',
    'nombreEmpresa' => 'Guzanet.',
    'Version' => '1.0.2',

    // definiendo estructura de categorias
    'codigo_categorias' => 2000,
    'niveles_categorias' => 3,
    'categorias' => [
        [
            'nombre' => 'Computación',
            'is_active' => true,
            'subcategoria' => [
                [
                    'nombre' => 'Monitor',
                    'is_active' => true,
                ],
                [
                    'nombre' => 'Impresora',
                    'is_active' => true,
                ],
                [
                    'nombre' => 'Router',
                    'is_active' => true,
                ],
                [
                    'nombre' => 'Scaner',
                    'is_active' => true,
                ],
            ],
        ],
        [
            'nombre' => 'Video',
            'is_active' => true,
            'subcategoria' => [
                [
                    'nombre' => 'Televisor',
                    'is_active' => true,
                ],
                [
                    'nombre' => 'Proyector',
                    'is_active' => true,
                ],
                [
                    'nombre' => 'Cámara video',
                    'is_active' => true,
                ],
                [
                    'nombre' => 'DVD',
                    'is_active' => true,
                    'subcategoria' => [
                        [
                            'nombre' => '60 min',
                            'is_active' => true,
                        ],
                        [
                            'nombre' => '90 min',
                            'is_active' => true,
                        ],
                    ],
                ],
            ],
        ],
    ],

    // menu
    'menu' => [
        // JobTime
        [
            'name' => 'JobTime',
            'url' => null,
            'is_active' => true,
            'icon' => 'chevron-down',
            'submenu' => [
                [
                    'name' => 'Clientes',
                    'url' => '/JobTime/clientes',
                    'icon' => 'collection',
                    'is_active' => true,
                    'submenu' => [
                        [
                            'name' => 'Nuevo',
                            'url' => '/JobTime/clientes/new',
                            'icon' => 'collection',
                            'is_active' => true,
                        ],
                        [
                            'name' => 'Editar',
                            'icon' => 'collection',
                            'url' => '/JobTime/clientes/edit',
                            'is_active' => true,
                        ],
                        [
                            'name' => 'Eliminar',
                            'url' => '/JobTime/clientes/delete',
                            'icon' => 'collection',
                            'is_active' => true,
                        ],
                    ],
                ],
                [
                    'name' => 'Proyecto',
                    'url' => '/JobTime/proyecto',
                    'icon' => 'chart-square-bar',
                    'is_active' => true,
                ],
            ],
        ],

        // Banca
        [
            'name' => 'Banca',
            'url' => null,
            'icon' => 'chevron-down',
            'is_active' => true,
            'submenu' => [
                [
                    'name' => 'Traspasos',
                    'url' => '/banca/traspasos',
                    'icon' => 'cloud-download',
                    'is_active' => true,
                ],
                [
                    'name' => 'Clientes',
                    'url' => '/banca/clientes',
                    'icon' => 'collection',
                    'is_active' => true,
                ],
            ],
        ],
        // Blog
        [
            'name' => 'Blog',
            'url' => '/blog',
            'icon ' => 'annotation',
            'is_active' => true,
        ],
        //dashboard
        [
            'name' => 'dashboard',
            'url' => '/admin',
            'icon' => 'chevron-down',
            'is_active' => true,
            'submenu' => [
                [
                    'name' => 'Categorias',
                    'url' => '/categorias',
                    'icon' => 'tag',
                    'is_active' => true,
                    'vertical' => true,
                ],
                [
                    'name' => 'Marcadores',
                    'url' => '/marcadores',
                    'icon' => 'bookmark',
                    'is_active' => true,
                    'vertical' => true,
                ],
                [
                    'name' => 'Proyecto',
                    'url' => '/tablas/13000',
                    'icon' => 'information-circle',
                    'is_active' => true,
                    'vertical' => true,
                ],
                [
                    'name' => 'Configuraciones',
                    'url' => '/tablas',
                    'icon' => 'cog',
                    'is_active' => true,
                    'vertical' => true,
                ],
                [
                    'name' => 'Banca - cuentas',
                    'url' => '/tablas/50000',
                    'icon' => 'currency-euro',
                    'is_active' => true,
                    'vertical' => true,
                ],
                [
                    'name' => 'Iconos',
                    'url' => '/iconos',
                    'icon' => 'information-circle',
                    'is_active' => true,
                    'vertical' => true,
                ],
                [
                    'name' => 'To Do',
                    'url' => '/todo',
                    'icon' => 'information-circle',
                    'is_active' => true,
                    'vertical' => true,
                ],
                [
                    'name' => 'Usuarios',
                    'url' => '/admin/usuarios',
                    'icon' => 'user',
                    'is_active' => true,
                    'vertical' => true,
                ],
                [
                    'name' => 'Roles',
                    'url' => '/admin/roles',
                    'icon' => 'cube',
                    'is_active' => false,
                    'vertical' => true,
                ],
                [
                    'name' => 'Permisos',
                    'url' => '/admin/permisos',
                    'icon' => 'cube-transparent',
                    'is_active' => true,
                    'vertical' => true,
                ],
            ],
            // acerca de...
            [
                'name' => 'Acerca de',
                'url' => '/acercade',
                'icon' => 'heart',
                'is_active' => true,
            ],
            // Agrega más elementos de menú según sea necesario
        ],
    ],
];
