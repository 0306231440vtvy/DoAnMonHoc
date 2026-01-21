@extends('client.layouts')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <div class="text-success fs-1 mb-2">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <h3 class="text-success">Đặt hàng thành công!</h3>
                        <p class="text-muted">
                            Cảm ơn bạn đã mua hàng tại cửa hàng của chúng tôi.
                        </p>
                    </div>

                    <hr>

                    <h5 class="mb-3">Thông tin đơn hàng</h5>

                    <ul class="list-group mb-4">
                        <li class="list-group-item">
                            <strong>Mã đơn hàng:</strong> {{ $order->name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Ngày đặt:</strong>
                            {{ \Carbon\Carbon::parse($order->ngaydat)->format('d/m/Y') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Số điện thoại:</strong> {{ $order->sdtnhan }}
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ $order->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Trạng thái:</strong>
                            <span class="badge bg-warning text-dark">
                                Chờ xác nhận
                            </span>
                        </li>
                    </ul>

                    <h5 class="mb-3">Sản phẩm đã đặt</h5>

                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Sản phẩm</th>
                                <th class="text-center">SL</th>
                                <th class="text-end">Đơn giá</th>
                                <th class="text-end">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->chiTiet as $item)
                                <tr>
                                    <td>{{ $item->sanpham->tensp }}</td>
                                    <td class="text-center">{{ $item->soluong }}</td>
                                    <td class="text-end">
                                        {{ number_format($item->dongia) }} đ
                                    </td>
                                    <td class="text-end fw-bold">
                                        {{ number_format($item->thanhtien) }} đ
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Tổng tiền</th>
                                <th class="text-end text-danger">
                                    {{ number_format($order->chiTiet->sum('thanhtien')) }} đ
                                </th>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="text-center mt-4">
                        <a href="{{ route('layouts') }}"
                           class="btn btn-primary px-4">
                            Về trang chủ
                        </a>
                        <a href="{{ route('carts') }}"
                           class="btn btn-outline-secondary ms-2">
                            Quay lại giỏ hàng
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection