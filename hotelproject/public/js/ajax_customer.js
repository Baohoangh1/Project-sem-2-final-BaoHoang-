$(document).ready(function () {
    loadData('/search-customer');

    $('#search-customer-btn').click(function (e) {
        e.preventDefault();
        loadData('/search-customer');
    });

    $('#add-customer-btn').click(function () {
        $('#store-customer-modal-title').html('Thêm mới khách hàng:');
        $('#storecustomerForm').trigger('reset'),
        showErrorInput('');
        $('#store-customer-modal').modal('show');
    });
});

$('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    loadData($(this).attr('href'));
});

$('body').on('click', '#delete-customer-btn', function () {
    $.get('/delete-customer/'+ $(this).data('id'), function (data) {
        displayNotice(data.status, data.message);
        loadData($('#hidden-current-page').val());
    })
});

$('body').on('click', '#edit-customer-btn', function () {
    $.get('/show-customer/'+ $(this).data('id'), function (data) {
        $('#store-customer-modal-title').html('Cập nhật thông tin khách hàng:');
        $('#storecustomerForm').trigger('reset'),
        showErrorInput('');
        $('#store-customer-modal').modal('show');
        $('#customer-id-input').val(data.id);
        $('#customer-name-input').val(data.name);
        $('#customer-phone-input').val(data.phone);
        $('#customer-card-input').val(data.card);
    });
});

$('body').on('click', '#save-customer', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/save-customer',
        type: 'POST',
        data: $('#storecustomerForm').serialize(),
        success: function (data) {
            if(data.status != undefined) {
                $('#store-customer-modal').modal('hide');
                displayNotice(data.status, data.message);
                loadData($('#hidden-current-page').val());
            } else {
                showErrorInput(data.errors);
            }
        }
    })
});

function loadData(url) {
    $.ajax({
        url: url,
        type: 'GET',
        data: $('#search-customer-form').serialize(),
        success: function (data) {
            $('#customer-list').empty();
            $('#customer-list').html(data.customersTable);
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
    $('#phone-error').html(data === '' ? '' : data.phone);
    $('#card-error').html(data === '' ? '' : data.card);
}
