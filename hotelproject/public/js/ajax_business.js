$(document).ready(function () {
    loadBusiness('/search-bills');

    $(function () {
        var dfDate = new Date();
        $('#start-date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            defaultDate: dfDate.setHours(0, 0, 0),
        });
    });

    $(function () {
        var dfDate = new Date();
        $('#end-date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            defaultDate: dfDate.setHours(23, 59, 59),
        });
    });

    $('#search-business-btn').click(function (e) {
        e.preventDefault();
        loadBusiness('/search-bills');
    })

    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        loadBusiness($(this).attr('href'));
    });
});

function loadBusiness(url) {
    $.ajax({
        url: url,
        type: 'GET',
        data: $('#search-business-form').serialize(),
        success: function(data) {
            $('#hotel-business-list').empty();
            $('#hotel-business-list').html(data.businessTable);
        }
    })
}


