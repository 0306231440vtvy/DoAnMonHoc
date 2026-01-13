@extends('server.layout')
@section('title', 'Danh sách danh mục')

@section('content')
    <div class="container">
        <div class="">
            <h1 class="">
                <i class=""></i> Quản lý danh mục
            </h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Thêm mới danh mục
            </a>
        </div>
        <div class="">
            <div class="">
                <h3 class="">Danh sách danh mục</h3>
            </div>
            <div class="">
                <div class="">
                    <table class="">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Slug</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('server.pages.categories.components.table')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
