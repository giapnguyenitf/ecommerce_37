$(document).ready(() => {
    let parent_id = $('#parent_id').val();
    let get_categories_url = $('#parent_id').attr('data-url');
    $.get(get_categories_url, function(data, status){
        data.forEach(element => {
            if(element.id == parent_id){
                let sub_categories = element.sub_categories;
                $('#sub_category_id option').remove();
                sub_categories.forEach(el => {
                    $('#sub_category_id').append($('<option></option>')
                    .attr('value', el.id)
                    .text(el.name));
                });
            }
        });
    });

    $('#parent_id').change(() => {
        let parent_id = $('#parent_id').val();
        $.get(get_categories_url, function(data, status){
            data.forEach(element => {
                if(element.id == parent_id){
                    let sub_categories = element.sub_categories;
                    $('#sub_category_id option').remove();
                    sub_categories.forEach(el => {
                        $('#sub_category_id').append($('<option></option>')
                        .attr('value', el.id)
                        .text(el.name));
                    });
                }
            });
        });
    });
});
