<!-- update profile -->
@if (Session::has('update_profile_success'))
    <div class="alert alert-success">
        {{ Session::get('update_profile_success') }}
    </div>
@endif
@if (Session::has('update_profile_fail'))
    <div class="alert alert-danger">
        {{ Session::get('update_profile_fail') }}
    </div>
@endif
<!-- update password -->
@if (Session::has('update_password_success'))
    <div class="alert alert-success">
        {{ Session::get('update_password_success') }}
    </div>
@endif
@if (Session::has('update_password_fail'))
    <div class="alert alert-danger">
        {{ Session::get('update_password_fail') }}
    </div>
@endif
<!-- add product -->
@if (Session::has('add_product_success'))
    <div class="alert alert-success">
        {{ Session::get('add_product_success') }}
    </div>
@endif
@if (Session::has('add_product_fail'))
    <div class="alert alert-danger">
        {{ Session::get('add_product_fail') }}
    </div>
@endif
@if (Session::has('product_not_found'))
    <div class="alert alert-danger">
        {{ Session::get('product_not_found') }}
    </div>
@endif
<!-- add color product -->
@if (Session::has('color_is_existed'))
    <div class="alert alert-danger">
        {{ Session::get('color_is_existed') }}
    </div>
@endif
@if (Session::has('add_color_product_success'))
    <div class="alert alert-success">
        {{ Session::get('add_color_product_success') }}
    </div>
@endif
@if (Session::has('add_color_product_fail'))
    <div class="alert alert-danger">
        {{ Session::get('add_color_product_fail') }}
    </div>
@endif
<!-- import list product -->
@if (Session::has('import_product_success'))
    <div class="alert alert-success">
        {{ Session::get('import_product_success') }}
    </div>
@endif
@if (Session::has('incorrect_file_format'))
    <div class="alert alert-danger">
        {{ Session::get('incorrect_file_format') }}
    </div>
@endif
<!-- update order status to delivering -->
@if (Session::has('order_status_changed'))
    <div class="alert alert-success">
        {{ Session::get('order_status_changed') }}
    </div>
@endif
@if (Session::has('order_not_found'))
    <div class="alert alert-danger">
        {{ Session::get('order_not_found') }}
    </div>
@endif
