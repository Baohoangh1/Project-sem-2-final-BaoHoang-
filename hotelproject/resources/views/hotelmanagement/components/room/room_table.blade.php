<table class="table table-bodered">
    <thead>
        <tr>
            <th class="col-sm-1">STT</th>
            <th class="col-sm-2">Tên Khách Sạn</th>
            <th class="col-sm-2">Kiểu Phòng</th>
            <th class="col-sm-2">Tên Phòng</th>
            <th class="col-sm-2">Price</th>
            <th class="col-sm-3">Thao tác</th>
        </tr>
    </thead>
    <tbody>
    @if(!$rooms->isEmpty())
        <input type="text" id="hidden-current-page" value="{{ $rooms->url($rooms->currentPage()) }}" hidden>
        @php($i = 0)
        @foreach($rooms as $room)
            <tr>
                <td>{{ $rooms->firstItem() + $i }}</td>
                <td>{{ $room->hotel_name }}</td>
                <td>{{ $room->room_type }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->price }}</td>
                <td>
                    <button id="edit-room-btn" class="btn btn-primary" data-id="{{ $room->id }}">Cập nhật</button>
                    <button id="delete-room-btn" class="btn btn-danger" data-id="{{ $room->id }}">Xóa bỏ</button>
                </td>
            </tr>
            @php($i++)
        @endforeach
    @else
        <tr>
            <th colspan="5" class="text-center">
                Danh sách trống!
            </th>
        </tr>
    @endif
    </tbody>
</table>
