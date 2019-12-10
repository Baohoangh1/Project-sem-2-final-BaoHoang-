<table class="table table-bodered">
    <thead>
    <tr>
        <th class="col-sm-1">STT</th>
        <th class="col-sm-4">Tên dịch vụ</th>
        <th class="col-sm-4">Giá dịch vụ</th>
        <th class="col-sm-3">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @if(!$services->isEmpty())
        <input type="text" id="hidden-current-page" value="{{ $services->url($services->currentPage()) }}" hidden>
        @php($i = 0)
        @foreach($services as $service)
            <tr>
                <td>{{ $services->firstItem() + $i }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->price }}</td>
                <td>
                    <button id="edit-service-btn" class="btn btn-primary" data-id="{{ $service->id }}">Cập nhật</button>
                    <button id="delete-service-btn" class="btn btn-danger" data-id="{{ $service->id }}">Xóa bỏ</button>
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

@if(!empty($services))
    <div class=" col-12 pagination justify-content-center mt-3">
        {{ $services->appends(request()->input())->links() }}
    </div>
@endif
