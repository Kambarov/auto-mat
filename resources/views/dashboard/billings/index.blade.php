@extends('dashboard.layouts.app')

@section('title', trans('admin.billings.title').' - ')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('admin.billings.data_table')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" width="50">ID</th>
                                    <th scope="col" width="200" class="text-center">@lang('admin.billings.order_id')</th>
                                    <th scope="col" width="150" class="text-center">@lang('admin.phone')</th>
                                    <th scope="col" class="text-center">@lang('admin.orders.status.title')</th>
                                    {{--                                    <th scope="col" class="text-right">@lang('admin.actions')</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($billings as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td class="text-center">
                                            {{ $item->order->id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->phone }}
                                        </td>
                                        <td class="text-center">
                                            @switch($item->status)
                                                @case(config('constants.order_status.new'))
                                                <button type="button" class="btn btn-info btn-sm mr-1 mb-1">@lang('admin.orders.status.waiting')</button>
                                                @break
                                                @case(config('constants.order_status.pending'))
                                                <button type="button" class="btn btn-warning btn-sm mr-1 mb-1">@lang('admin.billings.status.pending')</button>
                                                @break
                                                @case(config('constants.order_status.paid'))
                                                <button type="button" class="btn btn-success btn-sm mr-1 mb-1">@lang('admin.billings.status.paid')</button>
                                                @break
                                                @case(config('constants.order_status.cancelled'))
                                                <button type="button" class="btn btn-secondary btn-sm mr-1 mb-1">@lang('admin.billings.status.cancelled')</button>
                                                @break
                                            @endswitch
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-primary">
                                        <i class="feather icon-alert-octagon"></i> @lang('admin.no_data')
                                    </div>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $billings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
