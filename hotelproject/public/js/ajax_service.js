$(document).ready(function () {
    loadService('/search-services');

    $('#search-service-btn').click(function (e) {
        e.preventDefault();
        loadService('/search-services');
    });

    $('#add-service-btn').click(function () {
        $('#store-service-modal-title').html('Thêm mới dịch vụ:');
        $('#storeServiceForm').trigger('reset'),
        showErrorInput('');
        $('#store-service-modal').modal('show');
    });
});

$('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    loadService($(this).attr('href'));
});

$('body').on('click', '#delete-service-btn', function () {
    $.get('/delete-service/'+ $(this).data('id'), function (data) {
        displayNotice(data.status, data.message);
        loadService($('#hidden-current-page').val());
    })
});

$('body').on('click', '#edit-service-btn', function () {
    $.get('/show-service/'+ $(this).data('id'), function (data) {
        $('#store-service-modal-title').html('Cập nhật thông tin dịch vụ:');
        $('#storeServiceForm').trigger('reset'),
        showErrorInput('');
        $('#store-service-modal').modal('show');
        $('#service-id-input').val(data.id);
        $('#service-name-input').val(data.name);
        $('#service-price-input').val(data.price);
    });
});

$('body').on('click', '#save-service', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/save-service',
        type: 'POST',
        data: $('#storeServiceForm').serialize(),
        success: function (data) {
            if(data.status != undefined) {
                $('#store-service-modal').modal('hide');
                displayNotice(data.status, data.message);
                loadService($('#hidden-current-page').val());
            } else {
                showErrorInput(data.errors);
            }
        }
    })
});

function loadService(url) {
    $.ajax({
        url: url,
        type: 'GET',
        data: $('#search-service-form').serialize(),
        success: function (data) {
            $('#service-list').empty();
            $('#service-list').html(data.servicesTable);
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
    $('#price-error').html(data === '' ? '' : data.price);

}
