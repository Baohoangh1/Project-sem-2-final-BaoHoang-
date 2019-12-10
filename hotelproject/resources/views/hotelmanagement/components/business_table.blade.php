<table class="table table-bodered">
    <thead>
        <tr>
            <th class="col-sm-1">STT</th>
            <th class="col-sm-2">Ngày</th>
            <th class="col-sm-3">Doanh thu</th>
            <th class="col-sm-3"></th>
        </tr>
    </thead>
    <tbody>
    @if(!$bills->isEmpty())
        <input type="text" id="hidden-current-page" value="{{ $bills->url($bills->currentPage()) }}" hidden>
        @php($i = 0)
        @foreach($bills as $bill)
            <tr>
                <td>{{ $bill->firstItem() + $i }}</td>
                <td>{{ $bill->created_at }}</td>
                <td>{{ $bill->price }}</td>
                <td id="bill-chart"></td>
            </tr>
            @php($i++)
        @endforeach
    @else
        <tr>
            <th colspan="5" class="text-center">
                Dữ liệu trống!
            </th>
        </tr>
    @endif
    </tbody>
</table>

@if(!empty($bills))
    <div class=" col-12 pagination justify-content-center mt-3">
        {{ $bills->appends(request()->input())->links() }}
    </div>
@endif
