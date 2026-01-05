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
    ]
];
