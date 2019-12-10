@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Quản lý Phòng
@endsection

@section('contentheader_title')
    Quản lý Phòng
@stop
@section('main-content')
    <div class="room-manager-content col-sm-12 m-2">
        {{--<div class="add-notice-area col-sm-12 align-content-sm-center alert" style="display: none">
            <div id="notice-content"></div>
        </div>--}}
        <div class="add-action-area row" style="margin: 10px 0 30px">
            <form id="search-room-form" class="col-sm-10 row">
                <button id="search-room-btn" class="btn btn-primary"><i class="fa fa-search"></i></button>
                <div class="form-group col-sm-5">
                    <input class="form-control" list="roomList" name="type" placeholder="Tìm kiếm theo kiểu phòng...">
                    <datalist id="roomList">
                        <option value="Phòng standard">
                        <option value="Phòng Superior">
                        <option value="Phòng Deluxe">
                        <option value="Phòng Suite">
                    </datalist>
                </div>
                <div class="form-group col-sm-5">
                    <input class="form-control" list="hotel-name" name="hotel" placeholder="Tìm kiếm theo tên khách sạn...">
                    <datalist id="hotel-name">
                       @if(!$hotelsList->isEmpty())
                            @foreach($hotelsList as $hotel)
                                <option value="{{ $hotel->name }}">
                            @endforeach
                        @endif
                    </datalist>
                </div>
            </form>
            <div class="col-sm-2 text-right">
                <button id="add-room-btn" class="btn btn-success">Thêm mới</button>
            </div>
        </div>
        <div id="room-list" class="col-sm-12">

        </div>
        @include('hotelmanagement.components.room.store_room_modal')
    </div>
@endsection
@section('private_script')
    <script src="{{ asset('/js/ajax_room.js') }}" type="text/javascript"></script>
@stop

