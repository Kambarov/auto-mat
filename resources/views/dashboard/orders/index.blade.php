@extends('dashboard.layouts.app')

@section('title', trans('admin.orders.title').' - ')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('admin.orders.data_table')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" width="50">ID</th>
                                    <th scope="col" class="text-center">@lang('admin.billings.order_id')</th>
                                    <th scope="col" width="200" class="text-center">@lang('admin.orders.name')</th>
                                    <th scope="col" width="150" class="text-center">@lang('admin.phone')</th>
                                    <th scope="col" class="text-center">@lang('admin.address')</th>
                                    <th scope="col" class="text-center">@lang('admin.orders.amount')</th>
                                    <th scope="col" class="text-center">@lang('admin.orders.status.title')</th>
{{--                                    <th scope="col" class="text-right">@lang('admin.actions')</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td class="text-center">
                                            {{ $item->unique_id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->order_delivery->full_name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->order_delivery->phone }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->order_delivery->address }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->formatted_price }}
                                        </td>
                                        <td class="text-center">
                                            @if($item->isCreated())
                                                <button type="button" class="btn btn-info  mr-1 mb-1">@lang('admin.orders.status.new')</button>
                                            @elseif($item->isInProgress())
                                                <button type="button" class="btn btn-warning  mr-1 mb-1">@lang('admin.orders.status.pending')</button>
                                            @elseif($item->isCompleted())
                                                <button type="button" class="btn btn-success  mr-1 mb-1">@lang('admin.orders.status.paid')</button>
                                            @elseif($item->isCancelled())
                                                <button type="button" class="btn btn-secondary  mr-1 mb-1">@lang('admin.orders.status.cancelled')</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-primary">
                                        <i class="feather icon-alert-octagon"></i> @lang('admin.no_data')
                                    </div>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
