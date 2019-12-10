@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Quản lý kinh doanh
@endsection

@section('private-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@stop


@section('contentheader_title')
    Quản lý kinh doanh
@stop
@section('main-content')
    <div class="business-manager-content col-sm-12 m-2">
        <div class="add-action-area row" style="margin: 10px 0 30px -15px">
            <form id="search-business-form" class="col-sm-10 row">
                <button id="search-business-btn" class="btn btn-primary" style="margin-top: 25px"><i class="fa fa-search"></i></button>
                <div class="form-group col-sm-4">
                    <label for="start-date">Từ ngày:</label>
                    <div class='input-group date' id='start-date'>
                        <input name="start_date" type='text' class="form-control"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label for="end-date">Đến ngày:</label>
                    <div class='input-group date' id='end-date'>
                        <input name="end_date" type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
{{--                <div class="form-group col-sm-3">--}}
{{--                    <label for='hotel'>Khách sạn:</label>--}}
{{--                    <input class="form-control" list="hotel-name" name="hotel">--}}
{{--                    <datalist id="hotel-name">--}}
{{--                        @if(!$hotelsList->isEmpty())--}}
{{--                            @foreach($hotelsList as $hotel)--}}
{{--                                <option value="{{ $hotel }}">--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </datalist>--}}
{{--                </div>--}}
            </form>
{{--            <div class="col-sm-2 text-right" style="margin-top: 25px">--}}
{{--                <button class="btn btn-success">Thêm mới</button>--}}
{{--            </div>--}}
        </div>
    </div>
    <div id="hotel-business-list" class="col-sm-12">

    </div>
</div>
@endsection
@section('private_script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('/js/ajax_business.js') }}" type="text/javascript"></script>
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
@stop
