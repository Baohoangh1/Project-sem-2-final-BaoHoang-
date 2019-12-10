<table class="table table-bodered">
    <thead>
    <tr>
        <th class="col-sm-1">STT</th>
        <th class="col-sm-2">Tên khách hàng</th>
        <th class="col-sm-2">Số điện thoại</th>
        <th class="col-sm-2">Số CMND</th>
        <th class="col-sm-3">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @if(!$customers->isEmpty())
        <input type="text" id="hidden-current-page" value="{{ $customers->url($customers->currentPage()) }}" hidden>
        @php($i = 0)
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customers->firstItem() + $i }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->card }}</td>
                <td>
                    <button id="edit-customer-btn" class="btn btn-primary" data-id="{{ $customer->id }}">Cập nhật</button>
                    <button id="delete-customer-btn" class="btn btn-danger" data-id="{{ $customer->id }}">Xóa bỏ</button>
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

@if(!empty($customers))
    <div class=" col-12 pagination justify-content-center mt-3">
        {{ $customers->appends(request()->input())->links() }}
    </div>
@endif
