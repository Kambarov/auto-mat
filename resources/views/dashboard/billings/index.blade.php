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
                                    <th scope="col" class="text-center">@lang('admin.billings.order_id')</th>
                                    <th scope="col" class="text-center">@lang('admin.phone')</th>
                                    <th scope="col" class="text-center">@lang('admin.orders.status.title')</th>
                                    <th scope="col" class="text-center">@lang('admin.orders.amount')</th>
                                    {{--                                    <th scope="col" class="text-right">@lang('admin.actions')</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($billings as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td class="text-center">
                                            {{ $item->order->unique_id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->phone }}
                                        </td>
                                        <td class="text-center">
                                            @if($item->paid)
                                                <button type="button" class="btn btn-success btn-sm mr-1 mb-1">@lang('admin.billings.status.paid')</button>
                                            @elseif(!$item->paid)
                                                <button type="button" class="btn btn-warning btn-sm mr-1 mb-1">@lang('admin.billings.status.pending')</button>
                                            @elseif($item->cancelled)
                                                <button type="button" class="btn btn-secondary btn-sm mr-1 mb-1">@lang('admin.billings.status.cancelled')</button>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ $item->formatted_price }}
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
