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

    $('#stars li').on('mouseover', function() {
        var onStar = parseInt($(this).data('value'), 10);

        $(this).parent().children('li.star').each(function(e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });

        }).on('mouseout', function() {
        $(this).parent().children('li.star').each(function(e) {
            $(this).removeClass('hover');
        });
    });


  $('#stars li').on('click', function() {
        var onStar = parseInt($(this).data('value'), 10);
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        } else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
        responseMessage(msg);
    });

    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }

    $('.btn-review').click(function () {
        var stars = parseInt($('#stars li.selected').last().data('value'), 10);
        var messages = $('#review').val();
        var product_id = $('#product_id').val();
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {
                stars: stars,
                messages: messages,
                product_id: product_id,
            },
            success: function (data) {
                $('.review-box-content').prepend(`
                    <div class="review-item">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="user-info-box">
                                    <div class="avatar-user-review">
                                        <img src="${'/storage/thumbnails/'+data.user.avatar}" alt="">
                                    </div>
                                    <div class="name-user-review">${data.user.name}</div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="star-rating">
                                    <div class='rating-star'>
                                            <ul id='stars-rated'>
                                                <li class='star selected' title='Poor' data-value='1'>
                                                    ${data.stars}&nbsp;<i class='fa fa-star fa-fw'></i>
                                                </li>

                                            </ul>
                                        </div>
                                </div>
                                <div class="date-rating"><span>${data.created_at}</span></div>
                                <div class="review-messages">${data.messages}</div>
                            </div>
                        </div>
                    </div>
                `);
                $('#review').val('');
                $('html,body').animate({
                    scrollTop: $("#review-box").offset().top},
                    'slow'
                );
            },
            error: function (data) {
                $('.errors').text(data.responseJSON.message);
            }
        });
    });
});
