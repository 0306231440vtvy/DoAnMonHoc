@extends('client.layouts')
@section('title', 'order')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active"><a href="{{ route('profile') }}">Thông tin cá nhân</a></li>
                    <li class="list-group-item"><a href="{{ route('orders.index') }}">Đơn hàng của tôi</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-header">Thông tin tài khoản</div>
                    <div class="card-body">
                        <p><strong>Họ tên:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $user->phone ?? 'Chưa cập nhật' }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $user->address ?? 'Chưa cập nhật' }}</p>
                        <p><strong>Giới tính:</strong> {{ $user->gender == 1 ? 'Nam' : 'Nữ' }}</p>
                        <p><strong>Ngày sinh:</strong> {{ $user->birthday ?? 'Chưa cập nhật' }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Sản phẩm yêu thích & Đã mua</div>
                    <div class="card-body">
                        <h5>Yêu thích</h5>
                        {{-- <ul>
                        @foreach ($favorites as $item)
                            <li>{{ $item->name }}</li>
                        @endforeach
                    </ul> --}}
                        <hr>
                        <h5>Đã đánh giá (Đã mua)</h5>
                        {{-- <ul>
                        @foreach ($reviewed as $item)
                            <li>{{ $item->name }} - {{ $item->pivot->rating }} sao</li>
                        @endforeach
                    </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
