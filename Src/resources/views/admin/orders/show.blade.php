@extends('admin.layouts.index')
@section('content')


@if ($order->state == "review" && admin()->can("changeState",$order))
<h4 class="card-title mb-3">
    <a href="{{ route('admin.orders.accept',["order" => $order->id]) }}" class="confirm-link">
        <button class="btn btn-success">
            {{__("labels.accept_order")}} <i class="i-Like"></i>

        </button>
    </a>

    <a href="{{ route('admin.orders.cancel',["order" => $order->id]) }}" class="confirm-link">
        <button class="btn btn-danger">
            {{__("labels.cancel_order")}} <i class="i-Unlike"></i>

        </button>
    </a>
</h4>

@endif



<div class="table-responsive">
    <table class="display table table-striped table-bordered dt">
        <thead>
            <tr>
                <th>@lang("validation.attributes.product") </th>
                <th>@lang("validation.attributes.quantity") </th>
                <th>@lang("validation.attributes.price") </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->pivot->quantity}}</td>
                <td>{{$product->pivot->price}} @lang("labels.ryal")</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection