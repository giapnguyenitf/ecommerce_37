$(document).ready(function () {
    $('.cart_quantity_delete').click(function () {
        var key = $(this).attr('id');
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {
                session_key: key,
            },
            success: function (data) {
                $('tr.'+key).empty();
            },
            error: function (data) {
            }
        });
    });

    $('.cart_quantity_input').change(function () {
        var quantity = $(this).val();
        var session_id = $(this).attr('data-key');
        var url = $(this).attr('data-url');
        var last_price = $(this).attr('data-lp');
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {
                session_id: session_id,
                quantity: quantity,
            },
            success: function (data) {
                location.reload();
            },
            error: function (data) {
            }
        });
    });

    $('.color-option').click(function () {
        var color_id = $(this).attr('data-color');
        var session_id = $(this).attr('data-key');
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {
                session_id: session_id,
                color_id: color_id,
            },
            success: function (data) {
                location.reload();
            },
            error: function (data) {
            }
        });
    });
});
