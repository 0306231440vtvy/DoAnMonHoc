@foreach ($products as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->tensp }}</td>
        <td>{{ $item->giaban }}</td>
        <td>{{ $item->discount }} </td>
        <td>{{ $item->soluong }} </td>
        @if ($item->trangthai === 1)
            <td class="badge bg-success">Còn hàng</td>
        @elseif($item->trangthai === 2)
            <td class="badge bg-warning">Hết hàng</td>
        @endif
        <td>
            <div class="action-buttons-inline">
                <a href="{{ route('products.update', $item->id) }}" class="btn btn-action btn-edit">
                    <i class="fa fa-edit"></i> Sửa
                </a>
                <button type="button" class="btn btn-action btn-delete confirm-delete"
                    data-url="{{ route('products.delete', $item->id) }}" data-name="{{ $item->ten }}">
                    <i class="fa fa-trash"></i> Xóa
                </button>
            </div>
        </td>
    </tr>
@endforeach
