$(document).ready(function () {
    loadHotel('/search-hotels');

    $('#search-hotel-btn').click(function (e) {
        e.preventDefault();
        loadHotel('/search-hotels');
    });

    $('#add-hotel-btn').click(function () {
        $('#store-hotel-modal-title').html('Thêm mới Khách sạn:');
        $('#storeHotelForm').trigger('reset'),
        showErrorInput('');
        $('#store-hotel-modal').modal('show');
    });
});

$('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    loadHotel($(this).attr('href'));
});

$('body').on('click', '#delete-hotel-btn', function () {
    $.get('/delete-hotel/'+ $(this).data('id'), function (data) {
        displayNotice(data.status, data.message);
        loadHotel($('#hidden-current-page').val());
    })
});

$('body').on('click', '#edit-hotel-btn', function () {
    $.get('/show-hotel/'+ $(this).data('id'), function (data) {
        $('#store-hotel-modal-title').html('Cập nhật thông tin Khách sạn:');
        $('#storeHotelForm').trigger('reset'),
        showErrorInput('');
        $('#store-hotel-modal').modal('show');
        $('#hotel-id-input').val(data.id);
        $('#hotel-name-input').val(data.name);
        $('#hotel-city-input').val(data.city);
        $('#hotel-address-input').val(data.address);
        $('#hotel-phone-input').val(data.phone);
    });
});

$('body').on('click', '#save-hotel', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/save-hotel',
        type: 'POST',
        data: $('#storeHotelForm').serialize(),
        success: function (data) {
            if(data.status != undefined) {
                $('#store-hotel-modal').modal('hide');
                displayNotice(data.status, data.message);
                loadHotel($('#hidden-current-page').val());
            } else {
                showErrorInput(data.errors);
            }
        }
    })
});

function loadHotel(url) {
    $.ajax({
        url: url,
        type: 'GET',
        data: $('#search-hotel-form').serialize(),
        success: function (data) {
            $('#hotel-list').empty();
            $('#hotel-list').html(data.hotelsTable);
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
    $('#name-error').html(data === '' ? '' : data.name);
    $('#city-error').html(data === '' ? '' : data.city);
    $('#address-error').html(data === '' ? '' : data.address);
    $('#phone-error').html(data === '' ? '' : data.phone);
}
