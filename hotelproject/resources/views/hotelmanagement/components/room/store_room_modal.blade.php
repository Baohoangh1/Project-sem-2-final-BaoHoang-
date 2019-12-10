<div id="store-room-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="store-room-modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="storeRoomForm">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="id" id="room-id-input" value="" hidden>
                    </div>
                    {{-- <div class="form-group">
                        <label for="hotel-name-input">Tên Khách Sạn:</label>
                        <input type="text" name="hotel_id" class="form-control" id="hotel-name-input" placeholder="Nhập khách sạn...">
                        <p id="hotelName-error" class="text-danger"></p>
                    </div> --}}
                    <div class="form-group">
                            <label for="hotel-name-input">Tên Khách Sạn:</label>
                            <input type="text" class="form-control" list="hotel-name" name="hotel_id" id="hotel-name-input" placeholder="Tên khách sạn...">
                            <datalist id="hotel-name">
                               @if(!$hotelsList->isEmpty())
                                    @foreach($hotelsList as $hotel_id)
                                        <option value="{{ $hotel_id->id }}">
                                    @endforeach
                                @endif
                            </datalist>
                        </div>
                    {{-- <div class="form-group">
                        <label for="room-type-input">Kiểu Phòng:</label>
                        <input type="text" name="room_type" class="form-control" id="room-type-input" placeholder="Nhập kiểu phòng...">
                        <p id="type-error" class="text-danger"></p>
                    </div> --}}
                    <div class="form-group">
                        <label for="room-type-input">Kiểu Phòng:</label>
                        <input type="text" class="form-control" list="roomList" name="room_type" id="room-type-input" placeholder="kiểu phòng...">
                        <datalist id="roomList">
                            <option value="Phòng standard">
                            <option value="Phòng Superior">
                            <option value="Phòng Deluxe">
                            <option value="Phòng Suite">
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="room-name-input">Tên Phòng:</label>
                        <input type="text" name="name" class="form-control" id="room-name-input" placeholder="Nhập tên Phòng...">
                        <p id="roomName-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="room-price-input">Giá:</label>
                        <input type="tel" name="price" class="form-control" id="room-price-input" placeholder="Nhập giá...">
                        <p id="price-error" class="text-danger"></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button id="save-room" type="button" class="btn btn-primary">Lưu lại</button>
            </div>
        </div>
    </div>
</div>
