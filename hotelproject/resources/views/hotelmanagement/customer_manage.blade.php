@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Quản lý khách hàng
@stop

@section('contentheader_title')
    Quản lý khách hàng
@stop

@section('main-content')
    <div class="customer-manager-content col-sm-12 m-2">
        <div class="add-notice-area col-sm-12 align-content-sm-center alert" style="display: none">
            <div id="notice-content"></div>
        </div>
        <div class="add-action-area row" style="margin: 10px 0 20px">
            <form id="search-customer-form" class="col-sm-10">
                <button id="search-customer-btn" class="btn btn-primary"><i class="fa fa-search"></i></button>
                <input id="search-customer-input" type="text" placeholder="Nhập khách sạn cần tìm..." value="{!! empty(request()->search) ? '' : request()->search !!}" name="search" style="width: 35%">
            </form>
            <div class="col-sm-2 text-right">
                <button id="add-customer-btn" class="btn btn-success">Thêm mới</button>
            </div>
        </div>
        <div id="customer-list" class="col-sm-12">

        </div>
        @include('hotelmanagement.components.store_customer_modal')
    </div>
@stop

@section('private_script')
    <script src="{{asset('/js/ajax_customer.js') }}" type="text/javascript"></script>
@stop
