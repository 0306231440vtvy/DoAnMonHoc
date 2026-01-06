@extends('server.layout')

@section('title', 'Danh sách slide')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Quản lý Slide</h6>
        {{-- <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle"></i> Thêm mới
        </a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-light text-center">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="10%">Tiêu đề</th>
                        <th width="10%">Hình thu nhỏ</th>
                        <th width="10%">STT</th>
                        <th width="25%">Link liên kết</th>
                        <th width="10%">Trạng thái</th>
                        <th width="15%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection