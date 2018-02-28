$(document).ready(function () {
    $('.color-option').first().attr('checked', true);
    var color_product_id = $('.color-option').first().val();
    var ajax_url = $('.color-option').first().attr('data-url');
    $.get(ajax_url, function (data, status) {
        $('.imglist').empty();
        data.images.forEach(el => {
            $('.imglist').append(`
                    <a data-fancybox="images" href="/storage/thumbnails/${el.file_name}"><img src="/storage/thumbnails/${el.file_name}"></a>
                `)
        });
    });

    $('.color-option').click(function () {
        var color_product_id = $(this).val();
        var ajax_url = $(this).attr('data-url');
        $.get(ajax_url, function(data, status) {
            $('.imglist').empty();
            data.images.forEach(el => {
                $('.imglist').append(`
                    <a data-fancybox="images" href="/storage/thumbnails/${el.file_name}"><img src="/storage/thumbnails/${el.file_name}"></a>
                `)
            });
        });
    });

    $('#add_to_cart_button').click(function() {
        var product_id = $('#product_id').val();
        var quantity = $('#quantity').val();
        var color_id = $("input[name='color']:checked").attr('data-color');
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {
                product_id: product_id,
                quantity: quantity,
                color_id: color_id,
            },
            success: function (data) {
                $('#modalSuccess').modal('show');
                setTimeout(function () {
                    $('#modalSuccess').modal('hide')
                }, 2000);
            },
            error: function (data) {
                $('#modalError').modal('show');
                setTimeout(function () {
                    $('#modalError').modal('hide')
                }, 2000);
            }
        });
    });

})
