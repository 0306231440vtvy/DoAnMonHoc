@if ($categories !== [])
    @foreach ($categories as $item)
        <tr>
            <td class="text-center align-middle">
                <span class="badge badge-secondary">{{ $item->id }}</span>
            </td>
            <td class="align-middle">
                <strong>{{ $item->name }}</strong>
            </td>
            <td class="align-middle">
                <small class="text-muted">
                    {{ $item->description ? Str::limit($item->description, 80) : 'Chưa có mô tả' }}
                </small>
            </td>
            <td class="align-middle">
                <code>{{ $item->slug }}</code>
            </td>
            <td class="text-center align-middle">
                @if ($item->publish == 1 || $item->trangthai == 1)
                    <span class="badge badge-success">
                        <i class="fa fa-check"></i> Hiển thị
                    </span>
                @else
                    <span class="badge badge-secondary">
                        <i class="fa fa-eye-slash"></i> Ẩn
                    </span>
                @endif
            </td>
            <td class="text-center align-middle">
                <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-warning btn-lg">
                    <i class="fa fa-edit"></i> Sửa
                </a>
                <form action="{{ route('categories.destroy', $item->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-lg">
                        <i class="fa fa-trash"></i> Xóa
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@else
    <div>Không tồn tại sản phẩm</div>
@endif
