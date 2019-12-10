@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Quản lý dịch vụ    
@stop

@section('contentheader_title')
    Quản lý dịch vụ
@stop

@section('main-content')
    <div class="service-manager-content col-sm-12 m-2">
        <div class="add-notice-area col-sm-12 align-content-sm-center alert" style="display: none">
            <div id="notice-content"></div>
        </div>
        <div class="add-action-area row" style="margin: 10px 0 30px">
            <div class="col-sm-10" style="margin: auto 0 auto -15px">
                <form id="search-service-form">
                    <button id="search-service-btn" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    <div class="form-group col-sm-6">
                        <input class="form-control" id="search-service-input" type="text" placeholder="Nhập dịch vụ cần tìm..." value="{!! empty(request()->search) ? '' : request()->search !!}" name="search">
                    </div>
                </form>
            </div>
            <div class="col-sm-2 text-right">
                <button id="add-service-btn" class="btn btn-success">Thêm mới</button>
            </div>
        </div>
        <div id="service-list" class="col-sm-12">

        </div>
        @include('hotelmanagement.components.store_service_modal')
    </div>
@stop
@section('private_script')
    <script src="{{ asset('/js/ajax_service.js') }}" type="text/javascript"></script>
@stop

