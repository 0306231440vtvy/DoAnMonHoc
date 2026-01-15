@extends('client.layouts')

@section('content')
    <div class="col-md-9">
        <h3>Danh sách đơn hàng (Mục 31)</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>{{ number_format($order->total) }} VNĐ</td>
                        <td>
                            @if ($order->status == 1)
                                <span class="badge bg-warning">Chờ xử lý</span>
                            @elseif($order->status == 2)
                                <span class="badge bg-info">Đang giao</span>
                            @elseif($order->status == 0)
                                <span class="badge bg-danger">Đã hủy</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Xem chi tiết</a>

                            @if ($order->status == 1)
                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn chắc chắn muốn hủy?')">Hủy đơn</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
