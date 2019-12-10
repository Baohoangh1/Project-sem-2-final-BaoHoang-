<table class="table table-bodered">
    <thead>
    <tr>
        <th class="col-sm-1">STT</th>
        <th class="col-sm-2">Tên khách sạn</th>
        <th class="col-sm-2">Thành phố</th>
        <th class="col-sm-2">Địa chỉ</th>
        <th class="col-sm-2">Số điện thoại:</th>
        <th class="col-sm-3">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @if(!$hotels->isEmpty())
        <input type="text" id="hidden-current-page" value="{{ $hotels->url($hotels->currentPage()) }}" hidden>
        @php($i = 0)
        @foreach($hotels as $hotel)
            <tr>
                <td>{{ $hotels->firstItem() + $i }}</td>
                <td>{{ $hotel->name }}</td>
                <td>{{ $hotel->city }}</td>
                <td>{{ $hotel->address }}</td>
                <td>{{ $hotel->phone }}</td>
                <td>
                    <button id="edit-hotel-btn" class="btn btn-primary" data-id="{{ $hotel->id }}">Cập nhật</button>
                    <button id="delete-hotel-btn" class="btn btn-danger" data-id="{{ $hotel->id }}">Xóa bỏ</button>
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

@if(!empty($hotels))
    <div class=" col-12 pagination justify-content-center mt-3">
        {{ $hotels->appends(request()->input())->links() }}
    </div>
@endif
