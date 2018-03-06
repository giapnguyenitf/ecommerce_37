<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4>{{ Auth::user()->name }}</h4>
        </div>
        <div class="panel-body">
            <ul>
                <li><a href="{{ route('profile.index') }}"><i class="fa fa-user"></i> @lang('label.account_info')</a></li>
                <li><a href="{{ route('user.listOrder') }}"><i class="fa fa-shopping-bag"></i> @lang('label.list_orders')</a></li>
                <li><a href=""><i class="fa fa-star"></i> @lang('label.my_ratings')</a></li>
            </ul>
        </div>
    </div>
</div>
