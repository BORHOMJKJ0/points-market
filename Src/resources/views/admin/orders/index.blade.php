@extends('admin.layouts.index')

@section('content')

    <div class="table-responsive">
        <table class="display table table-striped table-bordered dt">
            <thead>
            <tr>
                <th>@lang("validation.attributes.id") </th>
                <th>@lang("validation.attributes.total_price") </th>
                <th>@lang("validation.attributes.coupon") </th>
                <th>@lang("labels.coupon_discount") </th>
                <th>@lang("validation.attributes.created_at") </th>
                <th>@lang("labels.applicant_name") </th>
                <th>@lang("validation.attributes.state") </th>
                <th>@lang("labels.options")</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->total_price}} @lang("labels.ryal")</td>
                    <td>{{ $order->coupon->code ?? __("labels.not_exists") }}</td>
                    <td>{{ $order->coupon_discount ?? 0 }} @lang("labels.ryal")</td>
                    <td>{{$order->created_at->format("Y-m-d")}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{!! $order->state_label() !!}</td>
                    <td>
                        @can('view', $order)
                            <a href=" {{ route("admin.orders.show",["order" => $order->id]) }}" class="btn btn-dark btn-sm text-white tooltips" title="@lang('labels.show')">
                                <i class="i-Eye"></i>
                            </a>
                        @endcan

                        @if ($order->state == "review" && admin()->can("changeState", $order))
                            <a href="{{ route('admin.orders.accept',["order" => $order->id]) }}" class="confirm-link btn btn-success btn-sm text-white tooltips" title="@lang('labels.accept_order')">
                                <i class="i-Like"></i>
                            </a>

                            <a href="{{ route('admin.orders.cancel',["order" => $order->id]) }}" class="confirm-link btn btn-danger btn-sm text-white tooltips" title="@lang('labels.cancel_order')">
                                <i class="i-Unlike"></i>
                            </a>

                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
