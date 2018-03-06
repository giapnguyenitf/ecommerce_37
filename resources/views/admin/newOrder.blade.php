@extends('admin.master')
@section('css')
@endsection
@section('content')
    <h3 class="page-title">@lang('label.list_products')</h3>
    <div class="row">
    <div class="">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">@lang('label.order_id')</td>
                            <td class="user_name">@lang('label.user_name')</td>
                            <td class="name">@lang('label.order_date')</td>
                            <td class="total">@lang('label.total')</td>
                            <td class="status">@lang('label.status')</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newOrders as $newOrder)
                            <tr>
                                <td>{{ $newOrder->id }}</td>
                                <td>{{ $newOrder->user->name }}</td>
                                <td>{{ $newOrder->created_at->format('m/d/Y') }}</td>
                                <td>{{ $newOrder->total_money }}</td>
                                <td>{{ $newOrder->status_detail }}</td>
                                <td>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            {{ Form::open(['route' => ['manage-order.show', 'id' => $newOrder->id], 'method' => 'GET']) }}
                                                {{ Form::button('<i class="fa fa-pencil"></i>', ['class' => 'btn btn-primary btn-sm', 'type' => 'submit']) }}
                                            {{ Form::close() }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::open(['route' => ['manage-order.destroy', 'id' => $newOrder->id], 'method' => 'DELETE']) }}
                                                {{ Form::button('<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) }}
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <div class="paginate">
                        {{ $newOrders->links() }}
                    </div>
                </table>
            </div>
        </div>
        <!-- END BASIC TABLE -->
    </div>
@endsection
@section('javascript')
@endsection
