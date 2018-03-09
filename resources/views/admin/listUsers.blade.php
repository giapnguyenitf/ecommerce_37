@extends('admin.master')
@section('css')
@endsection
@section('content')
    <h3 class="page-title">@lang('label.list_users')</h3>
    <div class="row">
    <div class="">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
                @include('layouts.notifications')
                <a class="btn btn-success btn-sm" href="{{ route('manage-user.create') }}"><span class="fa fa-plus"></span>&nbsp;@lang('label.add_new_user')</a>
            </div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">@lang('label.user_id')</td>
                            <td class="user">@lang('label.user_name')</td>
                            <td class="email">@lang('label.email')</td>
                            <td class="phone">@lang('label.phone')</td>
                            <td class="date">@lang('label.created_at')</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->created_at->format('m/d/Y') }}</td>
                                <td>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <a class="btn btn-success btn-sm" href="{{ route('manage-user.edit', ['id' => $user->id]) }}"><span class="fa fa-pencil"></span></a>
                                        </div>
                                        <div class="form-group">
                                            {{ Form::open(['route' => ['manage-user.destroy', 'id' => $user->id], 'method' => 'DELETE']) }}
                                                {{ Form::button('<span class="fa fa-times-circle"></span>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm']) }}
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END BASIC TABLE -->
    </div>
@endsection
@section('javascript')
@endsection
