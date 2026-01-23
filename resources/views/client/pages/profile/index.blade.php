@extends('client.layouts') {{-- Hãy chắc chắn tên layout đúng với file của bạn --}}

@section('content')
    <div class="container py-5">
        <div class="row">
            {{-- Menu bên trái --}}
            <div class="col-md-3">
                @include('client.pages.profile.layout_menu')
            </div>

            {{-- Nội dung bên phải --}}
            <div class="col-md-9">
                <h3 class="mb-4">Thông tin cá nhân</h3>

                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('client.profile.update') }}" method="POST">
                            @csrf
                            {{-- Họ tên --}}
                            <div class="mb-3">
                                <label class="form-label">Họ tên</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                    required>
                            </div>

                            {{-- Email (Không cho sửa) --}}
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control bg-light" value="{{ $user->email }}" disabled>
                            </div>

                            {{-- Số điện thoại --}}
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                            </div>

                            {{-- KHU VỰC ĐỊA CHỈ (Đã sửa thành Select Box) --}}
                            <div class="mb-3">
                                <label class="form-label">Tỉnh / Thành phố</label>
                                {{-- Thêm id="province-select" --}}
                                <select name="province_id" id="province-select" class="form-control">
                                    <option value="">-- Chọn Tỉnh --</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}"
                                            {{ $user->province_id == $province->id ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phường / Xã</label>
                                {{-- Thêm id="ward-select" --}}
                                <select name="ward_id" id="ward-select" class="form-control">
                                    <option value="">-- Chọn Phường/Xã --</option>
                                    {{-- Nếu user đã có xã cũ, load lại (Optional logic phức tạp, tạm thời để trống load sau) --}}
                                </select>
                            </div>

                            {{-- Ngày sinh --}}
                            <div class="mb-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="date" name="birthday" class="form-control" value="{{ $user->birthday }}">
                            </div>

                            {{-- Giới tính --}}
                            <div class="mb-3">
                                <label class="form-label">Giới tính</label>
                                <select name="gender" class="form-control">
                                    <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Nam</option>
                                    <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Nữ</option>
                                </select>
                            </div>

                            <button class="btn btn-primary">Cập nhật thông tin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Nếu web bạn đã có jquery ở master layout rồi thì bỏ dòng trên đi --}}

    <script>
        $(document).ready(function() {
            // 1. Khi người dùng thay đổi Tỉnh
            $('#province-select').on('change', function() {
                var provinceId = $(this).val();

                // Xóa danh sách xã cũ đi, chỉ để lại option mặc định
                $('#ward-select').html('<option value="">-- Đang tải... --</option>');

                if (provinceId) {
                    // 2. Gửi yêu cầu lên Server lấy danh sách xã
                    $.ajax({
                        url: '/get-wards/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // 3. Khi Server trả dữ liệu về -> Đổ vào ô Select Xã
                            $('#ward-select').html(
                                '<option value="">-- Chọn Phường/Xã --</option>');

                            $.each(data, function(key, ward) {
                                // Dựa vào ảnh database: value là id, hiển thị là name
                                $('#ward-select').append('<option value="' + ward.id +
                                    '">' + ward.name + '</option>');
                            });
                        },
                        error: function() {
                            $('#ward-select').html(
                                '<option value="">-- Lỗi tải dữ liệu --</option>');
                        }
                    });
                } else {
                    $('#ward-select').html('<option value="">-- Chọn Phường/Xã --</option>');
                }
            });

            // (Tùy chọn) Kích hoạt sự kiện change 1 lần khi trang vừa load 
            // để nếu user đang có Tỉnh lưu sẵn thì nó tự load Xã luôn (logic nâng cao)
            // var oldProvince = $('#province-select').val();
            // if(oldProvince) { $('#province-select').trigger('change'); }
        });
    </script>
@endsection
