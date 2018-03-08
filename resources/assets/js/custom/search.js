$(document).ready(function () {
    $('#search').keyup(function () {
        var keyword = $('#search').val();
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {
                keyword: keyword,
            },
            success: function (data) {
                console.log(data);
                $('.live-search').removeClass('hidden');
                $('.live-search').empty();
                var url = 'http://localhost:8000/product/detail/';
                var img_url = '/storage/thumbnails/';
                data.forEach(element => {
                    $('.live-search').append(`
                        <li>
                            <a href="${url+element.id}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-responsive" src="${img_url+element.thumbnail}" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="product-name">
                                            <h4>${element.name}</h4>
                                            <h5>${element.price + ' ' + Lang.get('label.vnd')}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    `);
                });
            },
            error: function (data) {
            }
        });
        $(document).click(function () {
            $('.live-search').addClass('hidden');
        });
    });
});
