@extends('server.layout')
@section('title', 'Danh sách danh mục')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-list-alt"></i> Quản lý danh mục
            </h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Thêm mới danh mục
            </a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
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
