@extends('admin.master')
@section('css')
@endsection
@section('content')
    <h3 class="page-title">@lang('label.list_products')</h3>
    <div class="row">
    <div class="">
        <div class="panel">
            <div class="panel-heading">
                <a href="{{ route('product.exportFile') }}" class="btn btn-success">@lang('label.export_products')</a>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('label.name')</th>
                            <th>@lang('label.number')</th>
                            <th>@lang('label.manufacturer')</th>
                            <th>@lang('label.sold')</th>
                            <th>@lang('label.options')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colorProducts as $colorProduct)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="form-inline">
                                        <div class="form-group">
                                <td>{{ $colorProduct->star_rating }}</td>
                                            {{ Form::open(['route' => ['manage-product.show', 'id' => $colorProduct->id], 'method' => 'GET']) }}
                                                {{ Form::button('<i class="fa fa-pencil"></i>', ['class' => 'btn btn-primary btn-sm', 'type' => 'submit']) }}
                                            {{ Form::close() }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::open(['route' => ['manage-product.destroy', 'id' => $colorProduct->id], 'method' => 'DELETE']) }}
                                                {{ Form::button('<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) }}
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{ $products->links() }}
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END BASIC TABLE -->
    </div>
@endsection
@section('javascript')
@endsection
