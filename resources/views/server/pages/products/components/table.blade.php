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
        {{-- <td><span class="label label-primary">Điện thoại</span></td> --}}
        <td>
            {{-- <a href="{{ route('products.update') }}" class="btn btn-warning btn-md">Sửa</a> --}}
            <a href="{{ route('products.delete', $item->id) }}" class="btn btn-danger btn-md">Xóa</a>
        </td>
    </tr>
@endforeach
