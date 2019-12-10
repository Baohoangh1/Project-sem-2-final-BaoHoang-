$(document).ready(function () {
    loadRoom('/search-rooms');

    $('#search-room-btn').click(function (e) {
        e.preventDefault();
        loadRoom('/search-rooms');
    });

    $('#add-room-btn').click(function () {
        $('#store-room-modal-title').html('Thêm mới phòng:');
        $('#storeRoomForm').trigger('reset'),
        showErrorInput('');
        $('#store-room-modal').modal('show');
    });
});

$('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    loadRoom($(this).attr('href'));
});

$('body').on('click', '#delete-room-btn', function () {
    $.get('/delete-room/'+ $(this).data('id'), function (data) {
        displayNotice(data.status, data.message);
        loadRoom($('#hidden-current-page').val());
    })
});

$('body').on('click', '#edit-room-btn', function () {
    $.get('/show-room/'+ $(this).data('id'), function (data) {
        $('#store-room-modal-title').html('Cập nhật thông tin phòng:');
        $('#storeRoomForm').trigger('reset'),
        showErrorInput('');
        $('#store-room-modal').modal('show');
        $('#room-id-input').val(data.id);
        $('#hotel-name-input').val(data.hotel_id);
        $('#room-type-input').val(data.room_type);
        $('#room-name-input').val(data.name);
        $('#room-price-input').val(data.price);
    });
});

$('body').on('click', '#save-room', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/save-room',
        type: 'POST',
        data: $('#storeRoomForm').serialize(),
        success: function (data) {
            if(data.status != undefined) {
                $('#store-room-modal').modal('hide');
                displayNotice(data.status, data.message);
                loadRoom($('#hidden-current-page').val());
            } else {
                showErrorInput(data.errors);
            }
        }
    })
});

function loadRoom(url) {
    $.ajax({
        url: url,
        type: 'GET',
        data: $('#search-room-form').serialize(),
        success: function (data) {
            $('#room-list').empty();
            $('#room-list').html(data.roomsTable);
        }
    });
}

function displayNotice(status, message) {
    if(status == 'success') {
        createNoticeBar('alert-danger', 'alert-success', message);
    } else {
        createNoticeBar('alert-success', 'alert-danger', message);
    }
    setTimeout(function () {
        $('.add-notice-area').hide();
    }, 5000);
}

function createNoticeBar(old_class, new_class, message) {
    $('.add-notice-area').show();
    $('.add-notice-area').removeClass(old_class);
    $('.add-notice-area').addClass(new_class);
    $('#notice-content').html(message);
}

function showErrorInput(data) {
    $('#hotelName-error').html(data === '' ? '' : data.hotel_id);
    $('#type-error').html(data === '' ? '' : data.room_type);
    $('#roomName-error').html(data === '' ? '' : data.name);
    $('#price-error').html(data === '' ? '' : data.price);
}
