@extends('server.layout')
@section('title', 'Sản phẩm')
@section('content')
    <div class="container my-5">

        <!-- Form -->
        <div class="bg-white p-4 rounded shadow mb-5">
            <h2 class="text-xl font-semibold mb-4">Thêm / Cập Nhật Sản Phẩm</h2>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Giá</label>
                    <input type="number" class="form-control" placeholder="Nhập giá">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Số lượng</label>
                    <input type="number" class="form-control" placeholder="Nhập số lượng">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Danh mục</label>
                    <select class="form-select">
                        <option>Điện thoại</option>
                        <option>Laptop</option>
                        <option>Phụ kiện</option>
                    </select>
                </div>

                <div class="col-12 flex gap-2 mt-3">
                    <button class="btn btn-primary px-4">Lưu</button>
                    <button class="btn btn-secondary px-4">Làm mới</button>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Danh Sách Sản Phẩm</h2>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>iPhone 15</td>
                            <td>25,000,000</td>
                            <td>10</td>
                            <td>Điện thoại</td>
                            <td class="flex gap-2">
                                <button class="btn btn-warning btn-sm">Sửa</button>
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>MacBook Pro</td>
                            <td>45,000,000</td>
                            <td>5</td>
                            <td>Laptop</td>
                            <td class="flex gap-2">
                                <button class="btn btn-warning btn-sm">Sửa</button>
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
