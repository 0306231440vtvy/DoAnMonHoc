<?php

return [
    'module' => [
        [
            'name' => 'dashboard',
            'title' => 'Dashboard',
            'icon' => 'fa fa-th-large',
            'route' => 'server.layouts',
        ],
        [
            'name' => 'users',
            'title' => 'Quản lý người dùng',
            'icon' => 'fa fa-user',
            'route' => '',
            'children' => [
                ['title' => 'Danh sách người dùng', 'route' => 'users.index'],
                // ['title' => 'Thêm mới', 'route' => 'users.create'],
            ]
        ],
        // 08-01-2026 thêm vào sidebar roles và permissions
        [
            'name' => 'roles',
            'title' => 'Quản lý Vai Trò',
            'icon' => 'fa fa fa-lock',
            'route' => 'roles.index',
            'children' => [
                ['title' => 'Danh sách danh mục', 'route' => 'roles.index'],
                ['title' => 'Thêm mới danh mục', 'route' => 'roles.create'],
            ]
        ],
        [
            'name' => 'permissions',
            'title' => 'Quản lý Quyền',
            'icon' => 'fa fa-list',
            'route' => 'permissions.index',
            'children' => [
                ['title' => 'Danh sách danh mục', 'route' => 'permissions.index'],
                ['title' => 'Thêm mới danh mục', 'route' => 'permissions.create'],
            ]
        ],
        [
            'name' => 'categories',
            'title' => 'Quản lý Danh mục',
            'icon' => 'fa fa-list',
            'route' => 'categories.index',
            'children' => [
                ['title' => 'Danh sách danh mục', 'route' => 'categories.index'],
                ['title' => 'Thêm mới danh mục', 'route' => 'categories.create'],
            ]
        ],
        [
            'name' => 'products',
            'title' => 'Quản lý Sản phẩm',
            'icon' => 'fa fa-boxes-stacked',
            'route' => 'products.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách sản phẩm', 'route' => 'products.index'],
            ]
        ],
        [
            'name' => 'brands',
            'title' => 'Quản lý Thương hiệu',
            'icon' => 'fa fa-building',
            'route' => 'brands.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách thương hiệu', 'route' => 'brands.index'],
            ]
        ],
        [
            'name' => 'orders',
            'title' => 'Quản lý Hóa đơn',
            'icon' => 'fa fa-credit-card',
            'route' => 'orders.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách hóa đơn', 'route' => 'server.orders.index'],
            ]
        ],
        [
            'name' => 'variants',
            'title' => 'Quản lý Biến thể',
            'icon' => 'fa fa-layer-group',
            'route' => 'variants.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách biến thể', 'route' => 'variants.index'],
            ]
        ],
        [
            'name' => 'contacts',
            'title' => 'Quản lý Liên hệ',
            'icon' => 'fa fa-address-book',
            'route' => 'contacts.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách liên hệ', 'route' => 'contacts.index'],
            ]
        ],
        [
            'name' => 'slides',
            'title' => 'Quản lý Slide',
            'icon' => 'fa fa-images',
            'route' => 'slides.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách slide', 'route' => 'slides.index'],
            ]
        ],
    ]
];
