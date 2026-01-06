<?php

return [
    'module' => [
        [
            'name' => 'dashboard',
            'title' => 'Dashboard',
            'icon' => 'fa fa-th-large',
            'route' => 'admin.layouts',
        ],
        [
            'name' => 'users',
            'title' => 'Quản lý người dùng',
            'icon' => 'fa fa-user',
            'route' => 'users.index',
            'children' => [
                ['title' => 'Danh sách', 'route' => 'users.index'],
                // ['title' => 'Thêm mới', 'route' => 'users.create'],
            ]
        ],
        [
            'name' => 'categories',
            'title' => 'Quản lý Danh mục',
            'icon' => 'fa fa-list',
            'route' => 'categories.create',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Thêm mới danh mục', 'route' => 'categories.create'],
            ]
        ],
        [
            'name' => 'products',
            'title' => 'Quản lý Sản phẩm',
            'icon' => 'fa fa-list',
            'route' => 'products.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách sản phẩm', 'route' => 'products.index'],
            ]
        ],
         [
            'name' => 'brands',
            'title' => 'Quản lý Thương hiệu',
            'icon' => 'fa fa-list',
            'route' => 'brands.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách thương hiệu', 'route' => 'brands.index'],
            ]
        ],
        [
            'name' => 'orders',
            'title' => 'Quản lý Hóa đơn',
            'icon' => 'fa fa-list',
            'route' => 'orders.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách hóa đơn', 'route' => 'orders.index'],
            ]
        ],
        [
            'name' => 'variants',
            'title' => 'Quản lý Biến thể',
            'icon' => 'fa fa-list',
            'route' => 'variants.index',
            'children' => [
                // ['title' => 'Danh sách', 'route' => 'users.index'],
                ['title' => 'Danh sách biến thể', 'route' => 'variants.index'],
            ]
        ],
    ]
];