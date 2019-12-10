<div id="store-service-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="store-service-modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="storeServiceForm">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="id" id="service-id-input" value="" hidden>
                    </div>
                    <div class="form-group">
                        <label for="service-name-input">Tên dịch vụ:</label>
                        <input type="text" name="name" class="form-control" id="service-name-input" placeholder="Nhập tên dịch vụ...">
                        <p id="name-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="service-price-input">Giá dịch vụ:</label>
                        <input type="text" name="price" class="form-control" id="service-price-input" placeholder="Nhập giá dịch vụ...(VND)">
                        <p id="price-error" class="text-danger"></p>
                    </div>                   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button id="save-service" type="button" class="btn btn-primary">Lưu lại</button>
            </div>
        </div>
    </div>
</div>
