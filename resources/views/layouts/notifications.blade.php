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
