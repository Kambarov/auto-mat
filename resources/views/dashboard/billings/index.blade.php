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
{{--                                @dd($billings)--}}
                                @forelse($billings as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td class="text-center">
                                            {{ $item->order->unique_id }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->order->order_delivery->phone }}
                                        </td>
                                        <td class="text-center">
                                            @if($item->payme_state === 2)
                                                <button type="button" class="btn btn-success mr-1 mb-1">@lang('admin.orders.status.paid')</button>
                                            @elseif($item->payme_state === -2)
                                                <button type="button" class="btn btn-secondary mr-1 mb-1">@lang('admin.orders.status.cancelled')</button>
                                            @elseif($item->payme_state === 1)
                                                <button type="button" class="btn btn-warning mr-1 mb-1">@lang('admin.orders.status.pending')</button>
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
