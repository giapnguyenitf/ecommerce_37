@extends('admin.master')
@section('css')
@endsection
@section('content')
    <h3 class="page-title">@lang('label.list_products')</h3>
    @include('layouts.notifications')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <a class="btn btn-success btn-sm" href="{{ route('manager-user.addNew') }}"><i class="fa fa-plus"></i>&nbsp;@lang('label.add_new')</a>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('label.id')</th>
                            <th>@lang('label.name')</th>
                            <th>@lang('label.email')</th>
                            <th>@lang('label.phone')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            {{ Form::open(['route' => ['manage-user.show', 'id' => $user->id], 'method' => 'GET']) }}
                                                {{ Form::button('<i class="fa fa-pencil"></i>', ['class' => 'btn btn-primary btn-sm', 'type' => 'submit']) }}
                                            {{ Form::close() }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::open(['route' => ['manage-user.destroy', 'id' => $user->id], 'method' => 'DELETE']) }}
                                                {{ Form::button('<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) }}
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{ $users->links() }}
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END BASIC TABLE -->
    </div>
@endsection
@section('javascript')
@endsection
