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
})
