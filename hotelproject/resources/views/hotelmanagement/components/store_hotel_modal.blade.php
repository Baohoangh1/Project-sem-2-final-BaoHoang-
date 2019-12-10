<div id="store-hotel-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="store-hotel-modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="storeHotelForm">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="id" id="hotel-id-input" value="" hidden>
                    </div>
                    <div class="form-group">
                        <label for="hotel-name-input">Tên khách sạn:</label>
                        <input type="text" name="name" class="form-control" id="hotel-name-input" placeholder="Nhập tên khách sạn...">
                        <p id="name-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="hotel-city-input">Thành phố:</label>
                        <input type="text" name="city" class="form-control" id="hotel-city-input" placeholder="Nhập thành phố...">
                        <p id="city-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="hotel-address-input">Địa chỉ:</label>
                        <input type="text" name="address" class="form-control" id="hotel-address-input" placeholder="Nhập địa chỉ...">
                        <p id="address-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="hotel-phone-input">Số điện thoại:</label>
                        <input type="tel" name="phone" class="form-control" id="hotel-phone-input" placeholder="Nhập số điện thoại...">
                        <p id="phone-error" class="text-danger"></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button id="save-hotel" type="button" class="btn btn-primary">Lưu lại</button>
            </div>
        </div>
    </div>
</div>
