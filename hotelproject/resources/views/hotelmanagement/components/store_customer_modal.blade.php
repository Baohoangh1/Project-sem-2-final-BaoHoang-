<div id="store-customer-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="store-customer-modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="storecustomerForm">
                    <div class="form-group">
                        <input type="text" name="id" id="customer-id-input" value="" hidden>
                    </div>
                    <div class="form-group">
                        <label for="customer-name-input">Tên khách hàng:</label>
                        <input type="text" name="name" class="form-control" id="customer-name-input" placeholder="Nhập tên khách hàng...">
                        <p id="name-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="customer-phone-input">Số điện thoại:</label>
                        <input type="text" name="phone" class="form-control" id="customer-phone-input" placeholder="Nhập số điện thoại...">
                        <p id="phone-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="customer-card-input">Số CMND:</label>
                        <input type="text" name="card" class="form-control" id="customer-card-input" placeholder="Nhập số chứng minh thư">
                        <p id="card-error" class="text-danger"></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button id="save-customer" type="button" class="btn btn-primary">Lưu lại</button>
            </div>
        </div>
    </div>
</div>
